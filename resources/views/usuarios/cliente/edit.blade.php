@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $cliente -> Nombre}}</h3>
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
	{!!Form::model($cliente,['method'=>'PATCH','route'=>['cliente.update',$cliente->Id_Cliente]])!!}
            {{Form::token()}}
            
<div class="row">
    
  

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
        <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" required value="{{$cliente->nombre}}" class="form-control" placeholder="Nombre...">
        </div>


    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="Tipo_documento">Tipo_documento</label>
        <input type="text" name="Tipo_documento" required value="{{$cliente->Tipo_documento}}" class="form-control" placeholder="Tipo_documento C.C./ C.E. / Nit ...">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Numero_documento">Numero_documento</label>
        <input type="number" name="Numero_documento" required value="{{$cliente->Numero_documento}}" class="form-control" placeholder="Numero_documento...">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion"  required value="{{$cliente->Direccion}}" class="form-control" placeholder="Direccion ...">
    </div>
  </div>
   
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="number" name="Telefono"  required value="{{$cliente->Telefono}}" class="form-control" placeholder="Telefono ...">
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