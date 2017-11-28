@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Clientes <a href="cliente/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.cliente.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_cliente</th>
		<th>Nombre</th>
		<th>Tipo_documento</th>
		<th>Numero_documento</th>
		<th>Direccion</th>
		<th>Telefono</th>
		<th>Opciones</th>
	</thead>
@foreach ($cliente as $clie)
	<tr>
		<td>{{ $clie->Id_Cliente}}</td>
		<td>{{ $clie->nombre}}</td>
		<td>{{ $clie->Tipo_documento}}</td>		
		<td>{{ $clie->Numero_documento}}</td>
		<td>{{ $clie->Direccion}}</td>
		<td>{{ $clie->Telefono}}</td>

		<td>  
			<a href="{{URL::action('ClienteController@edit',$clie->Id_Cliente)}}"><button class="btn btn-info">Editar</button></a>
		  <a href="" data-target="#modal-delete-{{$clie->Id_Cliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.cliente.modal')
	@endforeach
</table>

		 </div>
		 {{$cliente->render()}}
	</div>
</div>
@endsection

