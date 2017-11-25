@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Usuario: {{ $usuario -> Nombres}}</h3>
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
	{!!Form::model($usuario,['method'=>'PATCH','route'=>['usuario.update',$usuario->Id_Usuario]])!!}
            {{Form::token()}}
            
<div class="row">
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
<label>Tipo_Usuario</label>
<select name="id_tipousuario" class="form-control">
    
    @foreach($tipo_usuarios as $tpu)

    @if($tpu->id_tipousuario==$usuario->id_tipousuario)

<option value="{{$tpu->id_tipousuario}}" selected> {{$tpu->NomTipoUsuario}}</option>
@else 
<option value="{{$tpu->id_tipousuario}}"> {{$tpu->NomTipoUsuario}}</option>
@endif

    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="Nombres">Nombres</label>
        <input type="text" name="Nombres" required value="{{$usuario->Nombres}}" class="form-control">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Apellidos">Apellidos</label>
        <input type="text" name="Apellidos" required value="{{$usuario->Apellidos}}" class="form-control">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Identificacion">Identificacion</label>
        <input type="number" name="Identificacion"  required value="{{$usuario->Identificacion}}" class="form-control">
    </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="text" name="Correo" required value="{{$usuario->Correo}}" class="form-control" >
    </div>
    </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
        <label for="Clave">Clave</label>
        <input type="text" name="Clave" required value="{{$usuario->Clave}}" class="form-control">
    </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" required value="{{$usuario->Direccion}}" class="form-control">
    </div>

        </div>
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" required value="{{$usuario->Estado}}"  class="form-control">
    </div>
            
        </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Editar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  </div>

</div>



 

			{!!Form::close()!!}		
            
		
@endsection