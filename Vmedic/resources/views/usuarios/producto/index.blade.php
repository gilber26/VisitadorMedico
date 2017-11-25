@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Productos <a href="producto/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_Producto</th>
		<th>TipoProducto</th>
		<th>NombreProducto</th>
		<th>Descripcion</th>
		<th>Estado</th>
		<th>Opciones</th>
	</thead>
@foreach ($productos as $pro)
	<tr>
		<td>{{ $pro->Id_Producto}}</td>
		<td>{{ $pro->tipoproducto}}</td>
		<td>{{ $pro->NomProducto}}</td>		
		<td>{{ $pro->Descripcion}}</td>
		<td>{{ $pro->Estado}}</td>
				
		<td>  
			<a href="{{URL::action('ProductoController@edit',$pro->Id_Producto)}}"><button class="btn btn-info">Editar</button></a>
		  <a href="" data-target="#modal-delete-{{$pro->Id_Producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.producto.modal')
	@endforeach
</table>

		 </div>
		 {{$productos->render()}}
	</div>
</div>
@endsection

