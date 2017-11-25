<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Usuario;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\UsuarioFormRequest;
use DB;

class UsuarioController extends Controller
{
   
public function __construct()
{

}

public function index(Request $request)
{

if ($request)
{

	$query = trim($request->get('searchText'));
	$usuarios=DB::table('usuario as u') 
  ->join('tipo_usuario as tu', 'u.id_tipousuario','=','tu.id_tipousuario')
  ->select('u.Id_Usuario', 'tu.NomTipoUsuario as tipousuario','u.Nombres','u.Apellidos','u.Identificacion','u.Correo','u.Clave','u.Direccion','u.Estado')
  -> where ('u.Nombres','LIKE', '%'.$query.'%')
  -> orwhere ('u.Identificacion','LIKE', '%'.$query.'%')	
	-> orderBy('u.Id_Usuario','asc')
	->paginate(7);	
	return view('usuarios.usuario.index', ["usuarios"=>$usuarios,"searchText" =>$query]);
}


}

public function create()
{

$tipousuarios=DB::table('tipo_usuario')->get();
return view ("usuarios.usuario.create",["tipousuarios"=>$tipousuarios]);
/**return view ("usuarios.usuario.create");**/
}

public function store(UsuarioFormRequest $request)
{

$usuario = new Usuario;
$usuario-> id_tipousuario=$request->get('id_tipousuario');
$usuario-> Nombres=$request->get('Nombres');
$usuario-> Apellidos=$request->get('Apellidos');
$usuario-> Identificacion=$request->get('Identificacion');
$usuario-> Correo=$request->get('Correo');
$usuario-> Clave=$request->get('Clave');
$usuario-> Direccion=$request->get('Direccion');
$usuario-> Estado=$request->get('Estado');
$usuario-> save();
return Redirect::to('usuarios/usuario');

}

public function show($id)
{

return view("usuarios.usuario.show",["usuario"=>Usuario::findOrFail($id)]);


}

public function edit($id)
{

$usuario=Usuario::findOrFail($id);
$tipo_usuarios=DB::table('tipo_usuario')->get();
return view("usuarios.usuario.edit",["usuario"=>$usuario,'tipo_usuarios'=>$tipo_usuarios]);

}

public function update(UsuarioFormRequest $request,$id)
{

$usuario = Usuario::findOrFail($id);
$usuario-> id_tipousuario=$request -> get('id_tipousuario');
$usuario-> Nombres=$request -> get('Nombres');
$usuario-> Apellidos=$request -> get('Apellidos');
$usuario-> Identificacion=$request -> get('Identificacion');
$usuario-> Correo=$request -> get('Correo');
$usuario-> Clave=$request -> get('Clave');
$usuario-> Direccion=$request -> get('Direccion');
$usuario-> Estado=$request -> get('Estado');
$usuario->update();
return Redirect::to('usuarios/usuario');
}

public function destroy($id)
{

$usuario = Usuario::findOrFail($id);
/*$usuario -> Estado='0';*/
$usuario -> delete();
return Redirect::to('usuarios/usuario');

}


}
