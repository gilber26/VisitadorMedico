<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Cliente;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\ClienteFormRequest;
use DB;

class ClienteController extends Controller
{
  
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$cliente=DB::table('cliente as c')  
  ->select('c.Id_Cliente', 'c.Tipo_documento','c.Numero_documento','c.Direccion', 'c.Telefono', 'c.nombre')
  -> where ('c.nombre','LIKE', '%'.$query.'%')
  -> orwhere ('c.Id_Cliente','LIKE', '%'.$query.'%')	
	-> orderBy('c.Id_Cliente','asc')
	->paginate(7);	
	return view('usuarios.cliente.index', ["cliente"=>$cliente,"searchText" =>$query]);
}


}

public function create()
{

return view ("usuarios.cliente.create");

}



public function store(ClienteFormRequest $request)
{

$cliente = new Cliente;
$cliente-> Tipo_documento=$request->get('Tipo_documento');
$cliente-> Numero_documento=$request->get('Numero_documento');
$cliente-> Direccion=$request->get('Direccion');
$cliente-> Telefono=$request->get('Telefono');
$cliente-> nombre=$request->get('nombre');
$cliente-> save();
return Redirect::to('usuarios/cliente');

}

public function show($id)
{

return view("usuarios.cliente.show",["cliente"=>Cliente::findOrFail($id)]);


}

public function edit($id)
{

$cliente=Cliente::findOrFail($id);

return view("usuarios.cliente.edit",["cliente"=>$cliente]); 	

}

public function update(ClienteFormRequest $request,$id)
{

$cliente = Cliente::findOrFail($id);
$cliente-> Tipo_documento=$request -> get('Tipo_documento');
$cliente-> Numero_documento=$request -> get('Numero_documento');
$cliente-> Direccion=$request -> get('Direccion');
$cliente-> Telefono=$request -> get('Telefono');
$cliente-> nombre=$request->get('nombre');
$cliente->update();
return Redirect::to('usuarios/cliente');
}

public function destroy($id)
{

$cliente = Cliente::findOrFail($id);
/*$usuario -> Estado='0';*/
$cliente -> delete();
return Redirect::to('usuarios/cliente');

}



}
