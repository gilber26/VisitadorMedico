@extends ('layouts.admin')
@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Nuevo Laboratorio</h3>
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

            {!!Form::open(array('url'=>'usuarios/laboratorio','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            

<div class="row">
    
  
    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NomLaboratorio">Nombre Laboratorio</label>
        <input type="text" name="NomLaboratorio" required value="{{old('NomLaboratorio')}}" class="form-control" placeholder="Ej: TQ...">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Nit">Nit</label>
        <input type="text" name="Nit" required value="{{old('Nit')}}" class="form-control" placeholder="Ej: 909876-8...">
    </div>
    </div>

     <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
    <div class="form-group">
        <label for="Correo">Correo</label>
        <input type="email" name="Correo" required value="{{old('Correo')}}" class="form-control" placeholder="TQ@gmail.com...">
    </div>
    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        <div class="form-group">
        <label for="Telefono">Telefono</label>
        <input type="number" name="Telefono"  required value="{{old('Telefono')}}" class="form-control" placeholder="123456...">
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
                <button class="btn btn-primary" type="submit">Crear</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  </div>

</div>

 
     
   
     
     
 


            {!!Form::close()!!}     
            
    
@endsection