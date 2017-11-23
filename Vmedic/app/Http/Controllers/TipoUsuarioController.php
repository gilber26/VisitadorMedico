<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\tipo_usuario;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\TipoUsuarioFormRequest;
use DB;

class TipoUsuarioController extends Controller
{
    
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$tipousuarios=DB::table('tipo_usuario')-> where ('NomTipoUsuario','LIKE', '%'.$query.'%')
	-> orwhere ('id_tipousuario','LIKE', '%'.$query.'%')
	-> orderBy('id_tipousuario','asc')
	->paginate(7);
	return view('usuarios.tipousuario.index', ["tipousuarios"=>$tipousuarios,"searchText" =>$query]);
}

}

public function create()
{

return view ("usuarios.tipousuario.create");
}

public function store(TipoUsuarioFormRequest $request)
{

$tipousuario = new tipo_usuario;
$tipousuario-> NomTipoUsuario=$request->get('NomTipoUsuario');
$tipousuario-> save();
return Redirect::to('usuarios/tipousuario');

}

public function show($id)
{

return view("usuarios.tipousuario.show",["tipousuario"=>tipo_usuario::findOrFail($id)]);


}

public function edit($id)
{

return view("usuarios.tipousuario.edit",["tipousuario"=>tipo_usuario::findOrFail($id)]);

}

public function update(TipoUsuarioFormRequest $request,$id)
{

$tipousuario = tipo_usuario::findOrFail($id);
$tipousuario-> NomTipoUsuario=$request -> get('NomTipoUsuario');

$tipousuario->update();
return Redirect::to('usuarios/tipousuario');
}

public function destroy($id)
{

$tipousuario = tipo_usuario::findOrFail($id);

$tipousuario -> delete();
return Redirect::to('usuarios/tipousuario');

}



}
