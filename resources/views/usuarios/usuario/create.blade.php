@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Usuario</h3>
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

			{!!Form::open(array('url'=>'usuarios/usuario','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            

<div class="row">
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
<label>Tipo_Usuario</label>
<select name="id_tipousuario" class="form-control">
    
    @foreach($tipousuarios as $tpu)

<option value="{{$tpu->id_tipousuario}}"> Seleccionar {{$tpu->NomTipoUsuario}}</option>
    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="Nombres">Nombres</label>
        <input type="text" name="Nombres" required value="{{old('Nombres')}}" class="form-control" placeholder="Ej: Diego Andres...">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Apellidos">Apellidos</label>
        <input type="text" name="Apellidos" required value="{{old('Apellidos')}}" class="form-control" placeholder="Ej: Gutierrez Diaz...">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Identificacion">Identificacion</label>
        <input type="number" name="Identificacion"  required value="{{old('Identificacion')}}" class="form-control" placeholder="123456...">
    </div>
    </div>
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="email" name="Correo" required value="{{old('Correo')}}" class="form-control" placeholder="Diego@gmail.com...">
    </div>
    </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
        <label for="Clave">Clave</label>
        <input type="text" name="Clave" required value="{{old('Clave')}}" class="form-control" placeholder="die*****...">
    </div>
        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" required value="{{old('Direccion')}}" class="form-control" placeholder="Cra 25 H 30...">
    </div>

        </div>
         <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
<div class="form-group">
        <label for="Estado">Estado</label>
        <input type="number" name="Estado" required value="{{old('Estado')}}"  class="form-control" placeholder="Estado 0 o 1...">
    </div>
            
        </div>
  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Crear</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  </div>

</div>

 
     
   
     
     
 


			{!!Form::close()!!}		
            
	
@endsection