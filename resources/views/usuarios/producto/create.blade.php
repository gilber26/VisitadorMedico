@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Producto</h3>
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

			{!!Form::open(array('url'=>'usuarios/producto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            

<div class="row">
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
<label>Tipo_Producto</label>
<select name="Id_TipoProducto" class="form-control">
    
    @foreach($tipoproductos as $tpp)

<option value="{{$tpp->Id_TipoProducto}}"> {{$tpp->NomTipoProducto}}</option>
    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NomProducto">NomProducto</label>
        <input type="text" name="NomProducto" required value="{{old('NomProducto')}}" class="form-control" placeholder="Ej: Acetaminofen...">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" name="Descripcion" required value="{{old('Descripcion')}}" class="form-control" placeholder="Ej: Dosis minima...">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="number" name="Estado"  required value="{{old('Estado')}}" class="form-control" placeholder="Estado 0 / 1...">
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