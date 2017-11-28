<?php

namespace Vmedic\Http\Controllers;

use Illuminate\Http\Request;
use Vmedic\Laboratorio;
use Illuminate\Support\Facades\Redirect;
use Vmedic\Http\Requests\LaboratorioRequest;
use DB;

class LaboratorioController extends Controller
{

public function __construct()
{

}
    public function index(Request $request)
    {
    	if($request)
    	{
    		$query=trim($request->get('searchText'));
    		$laboratorios=DB::table('laboratorio')->where('NomLaboratorio','LIKE','%'.$query.'%')
    		->paginate(7);
    		return view('usuarios.laboratorio.index', ["laboratorios"=>$laboratorios,"searchText"=>$query]);
    	}

    }
    public function create()
    {
    	return view("usuarios.laboratorio.create");
    }
    public function store(LaboratorioRequest $request)
    {
    	$Laboratorio=new Laboratorio;
        $Laboratorio->NomLaboratorio=$request->get('NomLaboratorio');
        $Laboratorio->Nit=$request->get('Nit');
        $Laboratorio->Correo=$request->get('Correo');
        $Laboratorio->Telefono=$request->get('Telefono');
        $Laboratorio->Direccion=$request->get('Direccion');
        $Laboratorio->Estado='A';
        $Laboratorio->save();
        return redirect:: to ('usuarios/laboratorio');


    }
    public function show($id)
    {
    	 return view("usuarios.laboratorio.show",["laboratorio"=>Laboratorio::findOrFail($id)]);
    }
    
    public function edit($id)
    {
    	return view("usuarios.laboratorio.edit",["laboratorio"=>Laboratorio::findOrFail($id)]);
    }
    public function update(LaboratorioRequest $request, $id)
    {
    	$laboratorio= Laboratorio::findOrFail($id);
        $laboratorio->NomLaboratorio=$request->get('NomLaboratorio');
        $laboratorio->Nit=$request->get('Nit');
        $laboratorio->Correo=$request->get('Correo');
        $laboratorio->Telefono=$request->get('Telefono');
        $laboratorio->Direccion=$request->get('Direccion');
        $laboratorio->Estado=$request -> get('Estado');
        $laboratorio->update();
        return Redirect::to('usuarios/laboratorio');
    }
    public function destroy($id)
    {
    	$laboratorio=Laboratorio::findOrFail($id);
        $laboratorio->estado='I';
        $laboratorio->update();
        return Redirect::to('usuarios/laboratorio');

}

}