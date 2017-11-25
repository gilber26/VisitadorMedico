@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de TipoProductos <a href="tipoproducto/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.tipoproducto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_TipoProducto</th>
		<th>NomTipoProducto</th>
		
	</thead>
@foreach ($tipoproductos as $pro)
	<tr>
		<td>{{ $pro->Id_TipoProducto}}</td>
		<td>{{ $pro->NomTipoProducto}}</td>
				
		<td>  
			<a href="{{URL::action('TipoProductoController@edit',$pro->Id_TipoProducto)}}"><button class="btn btn-info">Editar</button></a>
		  <a href="" data-target="#modal-delete-{{$pro->Id_TipoProducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.tipoproducto.modal')
	@endforeach
</table>

		 </div>
		 {{$tipoproductos->render()}}
	</div>
</div>
@endsection

