<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Producto;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\ProductoFormRequest;
use DB;


class ProductoController extends Controller
{
    
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$productos=DB::table('productos as p') 
  ->join('tipo_producto as tp', 'p.Id_TipoProducto','=','tp.Id_TipoProducto')
  ->select('p.Id_Producto', 'tp.NomTipoProducto as tipoproducto','p.NomProducto','p.Descripcion', 'p.Estado')
  -> where ('p.NomProducto','LIKE', '%'.$query.'%')
  -> orwhere ('p.Id_Producto','LIKE', '%'.$query.'%')	
	-> orderBy('p.Id_Producto','asc')
	->paginate(7);	
	return view('usuarios.producto.index', ["productos"=>$productos,"searchText" =>$query]);
}


}

public function create()
{

$tipoproductos=DB::table('tipo_producto')->get();
return view ("usuarios.producto.create",["tipoproductos"=>$tipoproductos]);
/**return view ("usuarios.usuario.create");**/
}

public function store(ProductoFormRequest $request)
{

$producto = new Producto;
$producto-> Id_TipoProducto=$request->get('Id_TipoProducto');
$producto-> NomProducto=$request->get('NomProducto');
$producto-> Descripcion=$request->get('Descripcion');
$producto-> Estado=$request->get('Estado');
$producto-> save();
return Redirect::to('usuarios/producto');

}

public function show($id)
{

return view("usuarios.producto.show",["producto"=>Producto::findOrFail($id)]);


}

public function edit($id)
{

$producto=Producto::findOrFail($id);
$tipo_producto=DB::table('tipo_producto')->get();
return view("usuarios.producto.edit",["producto"=>$producto,'tipo_producto'=>$tipo_producto]);

}

public function update(ProductoFormRequest $request,$id)
{

$producto = Producto::findOrFail($id);
$producto-> Id_TipoProducto=$request -> get('Id_TipoProducto');
$producto-> NomProducto=$request -> get('NomProducto');
$producto-> Descripcion=$request -> get('Descripcion');
$producto-> Estado=$request -> get('Estado');
$producto->update();
return Redirect::to('usuarios/producto');
}

public function destroy($id)
{

$producto = Producto::findOrFail($id);
/*$usuario -> Estado='0';*/
$producto -> delete();
return Redirect::to('usuarios/producto');

}



}
