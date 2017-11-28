@extends ('layouts.admin')
@section ('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Laboratorio: {{ $laboratorio -> NomLaboratorio}}</h3>
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
    {!!Form::model($laboratorio,['method'=>'PATCH','route'=>['laboratorio.update',$laboratorio->Id_laboratorio]])!!}
            {{Form::token()}}
            
<div class="row">
    
   
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NomLaboratorio">Nombre</label>
        <input type="text" name="NomLaboratorio" required value="{{$laboratorio->NomLaboratorio}}" class="form-control">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Nit">Nit</label>
        <input type="text" name="Nit" required value="{{$laboratorio->Nit}}" class="form-control">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="email" name="Correo"  required value="{{$laboratorio->Correo}}" class="form-control">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="number" name="Telefono" required value="{{$laboratorio->Telefono}}" class="form-control" >
    </div>
    </div>


    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Direccion">Direccion</label>
        <input type="text" name="Direccion" required value="{{$laboratorio->Direccion}}" class="form-control">
    </div>

        </div>

        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Estado">Estado</label>
        <input type="text" name="Estado" required value="{{$laboratorio->Estado}}" class="form-control">
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