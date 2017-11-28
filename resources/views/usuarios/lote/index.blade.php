@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de Lote <a href="lote/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_Lote</th>
		<th>Laboratorio</th>
		<th>NumRemision</th>
		<th>Fecha Remision</th>
		<th>Total</th>
		<th>Estado</th>
	    <th>Opciones</th>
	</thead>
@foreach ($lotes as $lo)
	<tr>
		<td>{{ $lo->Id_Lote}}</td>
		<td>{{ $lo->NomLaboratorio}}</td>
		<td>{{ $lo->NumRemision}}</td>		
		<td>{{ $lo->FechaRemision}}</td>
		<td>{{ $lo->total}}</td>
		<td>{{ $lo->Estado}}</td>
				
	<td>  
			<a href="{{URL::action('LoteController@show',$lo->Id_Lote)}}"><button class="btn btn-primary">Detalles</button></a>
		  <a href="" data-target="#modal-delete-{{$lo->Id_Lote}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.lote.modal')
	@endforeach
</table>

		 </div>
		 {{$lotes->render()}}
	</div>
</div>
@endsection

