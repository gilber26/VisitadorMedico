<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Despacho;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\DespachoFormRequest;
use DB;
class DespachoController extends Controller
{
    
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$despachos=DB::table('despacho as d') 
  ->join('pedido as p', 'd.Id_Pedido','=','p.Id_Pedido')
  ->select('d.Id_Despacho', 'p.Id_Pedido as pedido','d.Fecha_Despacho')
  -> where ('d.Id_Despacho','LIKE', '%'.$query.'%')
  -> orderBy('p.Id_Despacho','asc')
	->paginate(7);	
	return view('usuarios.despacho.index', ["despachos"=>$despachos,"searchText" =>$query]);

	
}

}

public function create()
{

$pedidos=DB::table('pedido')->get();
return view ("usuarios.despacho.create",["pedidos"=>$pedidos]);
}

public function store(DespachoFormRequest $request)
{

$despacho = new Despacho;
$despacho-> Id_Pedido=$request->get('Id_Pedido');
$despacho-> Fecha_Despacho=$request->get('Fecha_Despacho');
$despacho-> save();
return Redirect::to('usuarios/despacho');

}

public function show($id)
{

return view("usuarios.despacho.show",["despacho"=>Despacho::findOrFail($id)]);


}

public function edit($id)
{
	$despacho=Despacho::findOrFail($id);
$pedido=DB::table('pedido')->get();

return view("usuarios.despacho.edit",["despacho"=>$despacho,'pedido'=>$pedido]);

}

public function update(DespachoFormRequest $request,$id)
{

$despacho = Despacho::findOrFail($id);
$despacho-> Id_Pedido=$request -> get('Id_Pedido');
$despacho-> Fecha_Despacho=$request -> get('Fecha_Despacho');
$despacho->update();


return Redirect::to('usuarios/despacho');
}

public function destroy($id)
{

$despacho = Despacho::findOrFail($id);
/*$usuario -> Estado='0';*/
$despacho -> delete();
return Redirect::to('usuarios/despacho');

}



}
