@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Lote: {{ $lote -> Id_Lote}}</h3>
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
	{!!Form::model($lote,['method'=>'PATCH','route'=>['lote.update',$lote->Id_Lote]])!!}
            {{Form::token()}}
            
<div class="row">
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
<label>Laboratorio</label>
<select name="Id_laboratorio" class="form-control">
    
    @foreach($laboratorios as $la)

    @if($la->Id_laboratorio==$lote->Id_laboratorio)

<option value="{{$la->Id_laboratorio}}" selected> {{$la->NomLaboratorio}}</option>
@else 
<option value="{{$la->Id_laboratorio}}"> {{$la->NomLaboratorio}}</option>
@endif

    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NumRemision">NumRemision</label>
        <input type="text" name="NumRemision" required value="{{$lote->NumRemision}}" class="form-control">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="FechaRemision">FechaRemision</label>
        <input type="date" name="FechaRemision" required value="{{$lote->FechaRemision}}" class="form-control">
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