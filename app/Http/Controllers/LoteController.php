<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Lote;
use Vmedic\det_lote_producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Vmedic\Http\Requests\LoteFormRequest;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;
class LoteController extends Controller
{
    
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$lotes=DB::table('lote as l') 
  ->join('laboratorio as la', 'l.Id_laboratorio','=','la.Id_laboratorio')
  ->join('det_lote_producto as dl', 'l.Id_Lote','=','dl.Id_Lote')
  ->select('l.Id_Lote', 'la.NomLaboratorio','l.NumRemision','l.FechaRemision','l.Estado', DB::raw('sum(dl.Costo*Cantidad) as total'))
  -> where ('l.NumRemision','LIKE', '%'.$query.'%')
	-> orderBy('l.Id_Lote','asc')
  -> groupBy('l.Id_Lote', 'la.NomLaboratorio','l.NumRemision','l.FechaRemision','l.Estado')
	->paginate(7);	
	return view('usuarios.lote.index', ["lotes"=>$lotes,"searchText" =>$query]);
}


}

public function create()
{

$laboratorios=DB::table('laboratorio')->get();
$productos=DB::table('productos as pro')
-> select (DB::raw('CONCAT(pro.Id_Producto, " ",pro.Nomproducto) as producto' ), 'pro.Id_Producto')
->get();
return view ("usuarios.lote.create",["laboratorios"=>$laboratorios,"productos"=>$productos]);
/**return view ("usuarios.usuario.create");**/
}

public function store(LoteFormRequest $request)
{

try {
	DB::beginTransaction();
$lote = new Lote;
$lote-> Id_laboratorio=$request->get('Id_laboratorio');
$lote-> NumRemision=$request->get('NumRemision');
$lote-> FechaRemision=$request->get('FechaRemision');
$lote-> Estado='A';
$lote-> save();

$Id_Producto =$request->get('Id_Producto');
$Cantidad =$request->get('Cantidad');
$Costo =$request->get('Costo');
$Precio =$request->get('Precio');
$Fecha_Vencimiento =$request->get('Fecha_Vencimiento');
$Stock_Lote =$request->get('Stock_Lote');

$cont=0;

while($cont < count($Id_Producto)){

	  $detalle = new det_lote_producto();
	  $detalle-> Id_Lote=$lote->Id_Lote;
	  $detalle-> Id_Producto= $Id_Producto[$cont];
    $detalle-> Cantidad=$Cantidad[$cont];
    $detalle-> Costo=$Costo[$cont];
    $detalle-> Precio=$Precio[$cont];
    $detalle-> Fecha_Vencimiento=$Fecha_Vencimiento[$cont];
    $detalle-> Stock_Lote=$Stock_Lote[$cont];
    $detalle-> save();
	$cont = $cont + 1;
}

	DB::commit();
	
} catch (Exception $e) {
	DB::rollback();
}


return Redirect::to('usuarios/lote');

}

public function show($id)
{

  $lote = DB::table('lote as l') 
  ->join('laboratorio as la', 'l.Id_laboratorio','=','la.Id_laboratorio')
  ->join('det_lote_producto as dl', 'l.Id_Lote','=','dl.Id_Lote')
  ->select('l.Id_Lote', 'la.NomLaboratorio','l.NumRemision','l.FechaRemision','l.Estado', DB::raw('sum(dl.Costo*Cantidad) as total')) 
  ->where('l.Id_Lote', '=', $id)
  ->first();

  $detalle =DB::table('det_lote_producto as dl') 
   ->join('productos as p', 'dl.Id_Producto','=','p.Id_Producto')
  ->select('p.Nomproducto as producto','dl.Cantidad','dl.Costo','dl.Precio', 'Fecha_Vencimiento','Stock_Lote') 
  ->where('dl.Id_Lote', '=', $id)
  ->get();

return view("usuarios.lote.show",["lote"=>$Lote, 'detalle'=>$detalle]);


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

$lote = Lote::findOrFail($id);
$lote -> Estado='I';
$lote -> update();
return Redirect::to('usuarios/lote');

}



}
