@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar TipoUsuario: {{ $tipousuario -> NomTipoUsuario}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

</div>
</div>
	{!!Form::model($tipousuario,['method'=>'PATCH','route'=>['tipousuario.update',$tipousuario->id_tipousuario]])!!}
            {{Form::token()}}
            
<div class="row">
   


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="id_tipousuario">Id_TipoUsuario</label>
        <input type="text" name="id_tipousuario" disabled required value="{{$tipousuario->id_tipousuario}}" class="form-control">
    </div>

   
     <div class="form-group">
        <label for="NomTipoUsuario">NomTipoUsuario</label>
        <input type="text" name="NomTipoUsuario" required value="{{$tipousuario->NomTipoUsuario}}" class="form-control">
    </div>
    

 
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Editar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
</div>

</div>



 

			{!!Form::close()!!}		
            
		
@endsection