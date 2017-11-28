@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Pedidos <a href="pedido/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.pedido.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_Pedido</th>
		<th>Usuario</th>
		<th>Cliente</th>
		<th>Fecha Remisison</th>
		<th>Subtotal</th>
		<th>Estado</th>
	    <th>Opciones</th>
	</thead>
@foreach ($pedidos as $p)
	<tr>
		<td>{{ $p->Id_Pedido}}</td>
		<td>{{ $p->Nombres}}</td>
		<td>{{ $p->nombre}}</td>		
		<td>{{ $p->Fecha_Registro}}</td>
		<td>{{ $p->total}}</td>
		<td>{{ $p->Estado}}</td>
				
	<td>  
			<a href="{{URL::action('PedidoController@show',$p->Id_Pedido)}}"><button class="btn btn-primary">Detalles</button></a>
		  <a href="" data-target="#modal-delete-{{$p->Id_Pedido}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.pedido.modal')
	@endforeach
</table>

		 </div>
		 {{$pedidos->render()}}
	</div>
</div>
@endsection

