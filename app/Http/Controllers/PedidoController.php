<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Pedido;
use Vmedic\det_pedido_lote;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Vmedic\Http\Requests\PedidoFormRequest;
use DB;


use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class PedidoController extends Controller
{
 public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$pedidos=DB::table('pedido as p') 
  ->join('usuario as u', 'p.Id_Usuario','=','u.Id_Usuario')
  ->join('cliente as c', 'p.Id_Cliente','=','c.Id_Cliente')
  ->join('det_pedido_lote as dp', 'p.Id_Pedido','=','dp.Id_Pedido')
  ->select('p.Id_Pedido', 'u.Nombres','c.nombre','p.Fecha_Registro','p.Estado', DB::raw('sum(dp.Subtotal) as total'))
  -> where ('p.Fecha_Registro','LIKE', '%'.$query.'%')
	-> orderBy('p.Id_Pedido','asc')
  -> groupBy('p.Id_Pedido', 'u.Nombres','c.nombre','p.Fecha_Registro','p.Estado')
	->paginate(7);	
	return view('usuarios.pedido.index', ["pedidos"=>$pedidos,"searchText" =>$query]);//Revisar pedidos  o pedido AQUIIIIII
}


}

public function create()
{

$usuarios=DB::table('usuario')->get();
$clientes=DB::table('cliente')->get();
$lotes=DB::table('lote as l')
-> select (DB::raw('CONCAT(l.Id_Lote, " ",l.NumRemision) as lote' ), 'l.Id_Lote')
->get();
return view ("usuarios.pedido.create",["usuarios"=>$usuarios,"clientes"=>$clientes,"lotes"=>$lotes]);
/**return view ("usuarios.usuario.create");**/
}

public function store(PedidoFormRequest $request)
{

try {
	DB::beginTransaction();
$pedidos = new Pedido;
$pedidos-> Id_Usuario=$request->get('Id_Usuario');
$pedidos-> Id_Cliente=$request->get('Id_Cliente');
$pedidos-> NumRemision=$request->get('NumRemision');
$pedidos-> Fecha_Registro=$request->get('Fecha_');
$pedidos-> Estado='Sin Despachar';
$pedidos-> save();

$Id_Lote =$request->get('Id_Lote');
$Cantidad =$request->get('Cantidad');
$Subtotal =$request->get('Subtotal');

$cont=0;

while($cont < count($Id_Lote)){

	  $detalle = new det_pedido_lote();
	  $detalle-> Id_Pedido=$lote->Id_Pedido;
	  $detalle-> Id_Lote= $Id_Lote[$cont];
    $detalle-> Cantidad=$Cantidad[$cont];
    $detalle-> Subtotal=$Subtotal[$cont];
       $detalle-> save();
	$cont = $cont + 1;
}

	DB::commit();
	
} catch (Exception $e) {
	DB::rollback();
}


return Redirect::to('usuarios/pedido');

}

public function show($id)
{

  $pedido = DB::table('pedido as p') 
  ->join('usuario as u', 'p.Id_Usuario','=','u.Id_Usuario')
  ->join('cliente as c', 'p.Id_Cliente','=','u.Id_Cliente')
  ->join('det_pedido_lote as dp', 'p.Id_Pedido','=','dp.Id_Pedido')
  ->select('p.Id_Pedido', 'u.Nombres','c.nombre','p.Fecha_Registro','p.Estado', DB::raw('sum(dp.Subtotal) as total')) 
  ->where('p.Id_Pedido', '=', $id)
  ->first();

  $detalle =DB::table('det_pedido_lote as dp') 
   ->join('lote as l', 'dp.Id_Lote','=','l.Id_Lote')
  ->select('l.NumRemision as lote','dp.Cantidad','dp.Subtotal') 
  ->where('dp.Id_Pedido', '=', $id)
  ->get();

return view("usuarios.pedido.show",["pedido"=>$pedido, 'detalle'=>$detalle]);


}

/**public function edit($id)
{

$lote=Lote::findOrFail($id);
$laboratorios=DB::table('laboratorio')->get();
return view("usuarios.lote.edit",["lote"=>$lote,'laboratorios'=>$laboratorios]);

}

public function update(LoteFormRequest $request,$id)
{

$lote = Lote::findOrFail($id);
$lote-> Id_laboratorio=$request -> get('Id_laboratorio');
$lote-> NumRemision=$request -> get('NumRemision');
$lote-> FechaRemision=$request -> get('FechaRemision');
$lote->update();
return Redirect::to('usuarios/lote');
} **/

public function destroy($id)
{

$lote = Pedido::findOrFail($id);
$lote -> Estado='I';
$lote -> update();
return Redirect::to('usuarios/pedido');

}



}
