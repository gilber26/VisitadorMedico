@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Despacho: {{ $despacho -> Id_Despacho}}</h3>
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
	{!!Form::model($despacho,['method'=>'PATCH','route'=>['despacho.update',$despacho->Id_Despacho]])!!}
            {{Form::token()}}
            
<div class="row">
    
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
<label>Pedidos</label>
<select name="Id_Pedido" class="form-control">
    
    @foreach($pedido as $p)

    @if($p->Id_Pedido==$pedido->Id_Pedido)

<option value="{{$p->Id_Pedido}}" selected> {{$p->Id_Pedido}}</option>
@else 
<option value="{{$p->Id_Pedido}}"> {{$p->Id_Pedido}}</option>
@endif

    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="Fecha_Despacho">Fecha_Despacho</label>
        <input type="date" name="Fecha_Despacho" required value="{{$despacho->Fecha_Despacho}}" class="form-control">
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