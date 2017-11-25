@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{ $producto -> NomProducto}}</h3>
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
	{!!Form::model($producto,['method'=>'PATCH','route'=>['producto.update',$producto->Id_Producto]])!!}
            {{Form::token()}}
            
<div class="row">
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
<label>Tipo_Producto</label>
<select name="Id_TipoProducto" class="form-control">
    
    @foreach($tipo_producto as $tpp)

    @if($tpp->Id_TipoProducto==$producto->Id_TipoProducto)

<option value="{{$tpp->Id_TipoProducto}}" selected> {{$tpp->NomTipoProducto}}</option>
@else 
<option value="{{$tpp->Id_TipoProducto}}"> {{$tpp->NomTipoProducto}}</option>
@endif

    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NomProducto">NomProducto</label>
        <input type="text" name="NomProducto" required value="{{$producto->Nomproducto}}" class="form-control">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Descripcion">Descripcion</label>
        <input type="text" name="Descripcion" required value="{{$producto->Descripcion}}" class="form-control">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="number" name="Estado"  required value="{{$producto->Estado}}" class="form-control">
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