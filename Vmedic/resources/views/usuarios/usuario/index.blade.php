@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de usuarios <a href="usuario/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.usuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id</th>
		<th>Tipousuario</th>
		<th>Nombres</th>
		<th>Apellidos</th>
		<th>Identificacion</th>
		<th>Correo</th>
		<th>Clave</th>
		<th>Direccion</th>
		<th>Estado</th>
		<th>Opciones</th>
	</thead>
@foreach ($usuarios as $usu)
	<tr>
		<td>{{ $usu->Id_Usuario}}</td>
		<td>{{ $usu->tipousuario}}</td>
		<td>{{ $usu->Nombres}}</td>		
		<td>{{ $usu->Apellidos}}</td>
		<td>{{ $usu->Identificacion}}</td>
		<td>{{ $usu->Correo}}</td>
		<td>{{ $usu->Clave}}</td>
		<td>{{ $usu->Direccion}}</td>
		<td>{{ $usu->Estado}}</td>
		
		<td>  
			<a href="{{URL::action('UsuarioController@edit',$usu->Id_Usuario)}}"><button class="btn btn-info">Editar</button></a>
		  <a href="" data-target="#modal-delete-{{$usu->Id_Usuario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.usuario.modal')
	@endforeach
</table>

		 </div>
		 {{$usuarios->render()}}
	</div>
</div>
@endsection

