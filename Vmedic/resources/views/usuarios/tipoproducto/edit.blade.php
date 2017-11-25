@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar TipoProducto: {{ $tipoproducto -> NomTipoProducto}}</h3>
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
	{!!Form::model($tipoproducto,['method'=>'PATCH','route'=>['tipoproducto.update',$tipoproducto->Id_TipoProducto]])!!}
            {{Form::token()}}
            
<div class="row">
   


        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="Id_TipoProducto">Id_TipoProducto</label>
        <input type="text" name="Id_TipoProducto" disabled required value="{{$tipoproducto->Id_TipoProducto}}" class="form-control">
    </div>

   
     <div class="form-group">
        <label for="NomTipoProducto">NomTipoProducto</label>
        <input type="text" name="NomTipoProducto" required value="{{$tipoproducto->NomTipoProducto}}" class="form-control">
    </div>
    

 
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Editar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
</div>

</div>



 

			{!!Form::close()!!}		
            
		
@endsection