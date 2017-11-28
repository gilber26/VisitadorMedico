@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Laboratorio <a href="laboratorio/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.laboratorio.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_laboratorio</th>
		<th>Nombre</th>
		<th>Nit</th>
		<th>Correo/th>
		<th>Telefono</th>
		<th>Direccion</th>
	    <th>Estado</th>
	</thead>
@foreach ($laboratorios as $la)
	<tr>
		<td>{{ $la->Id_laboratorio}}</td>
		<td>{{ $la->NomLaboratorio}}</td>
		<td>{{ $la->Nit}}</td>		
		<td>{{ $la->Correo}}</td>
		<td>{{ $la->Telefono}}</td>
		<td>{{ $la->Direccion}}</td>
		<td>{{ $la->Estado}}</td>
				
	<td> 
			<a href="{{URL::action('LaboratorioController@edit',$la->Id_laboratorio)}}"><button class="btn btn-info">Editar</button></a>
		  <a href="" data-target="#modal-delete-{{$la->Id_laboratorio}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.laboratorio.modal')
	@endforeach
</table>

		 </div>
		 {{$laboratorios->render()}}
	</div>
</div>
@endsection

