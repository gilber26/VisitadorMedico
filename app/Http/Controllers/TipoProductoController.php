<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\tipo_producto;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\TipoProductoFormRequest;
use DB;


class TipoProductoController extends Controller
{
    
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$tipoproductos=DB::table('tipo_producto')-> where ('NomTipoProducto','LIKE', '%'.$query.'%')
	-> orwhere ('Id_TipoProducto','LIKE', '%'.$query.'%')
	-> orderBy('Id_TipoProducto','asc')
	->paginate(7);
	return view('usuarios.tipoproducto.index', ["tipoproductos"=>$tipoproductos,"searchText" =>$query]);
}

}

public function create()
{

return view ("usuarios.tipoproducto.create");
}

public function store(TipoProductoFormRequest $request)
{

$tipoproducto = new tipo_producto;
$tipoproducto-> NomTipoProducto=$request->get('NomTipoProducto');
$tipoproducto-> save();
return Redirect::to('usuarios/tipoproducto');

}

public function show($id)
{

return view("usuarios.tipoproducto.show",["tipoproducto"=>tipo_producto::findOrFail($id)]);


}

public function edit($id)
{

return view("usuarios.tipoproducto.edit",["tipoproducto"=>tipo_producto::findOrFail($id)]);

}

public function update(TipoProductoFormRequest $request,$id)
{

$tipoproducto = tipo_producto::findOrFail($id);
$tipoproducto-> NomTipoProducto=$request -> get('NomTipoProducto');

$tipoproducto->update();
return Redirect::to('usuarios/tipoproducto');
}

public function destroy($id)
{

$tipoproducto = tipo_producto::findOrFail($id);
/*$usuario -> Estado='0';*/
$tipoproducto -> delete();
return Redirect::to('usuarios/tipoproducto');

}

}
