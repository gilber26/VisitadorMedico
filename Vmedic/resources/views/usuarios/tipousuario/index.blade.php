@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		
		<h3>Listado de TipoUsuarios <a href="tipousuario/create"> <button class="btn btn-success">Nuevo</button></a></h3>
			@include('usuarios.tipousuario.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
<table class="table table.striped table-bordered table-condensed table-hover">

	<thead>
		<th>Id_tipousuario</th>
		<th>NomTipoUsuario</th>
		
	</thead>
@foreach ($tipousuarios as $usu)
	<tr>
		<td>{{ $usu->id_tipousuario}}</td>
		<td>{{ $usu->NomTipoUsuario}}</td>
				
		<td>  
			<a href="{{URL::action('TipoUsuarioController@edit',$usu->id_tipousuario)}}"><button class="btn btn-info">Editar</button></a>
		  <a href="" data-target="#modal-delete-{{$usu->id_tipousuario}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>

		</td>
	</tr>
	@include('usuarios.tipousuario.modal')
	@endforeach
</table>

		 </div>
		 {{$tipousuarios->render()}}
	</div>
</div>
@endsection

