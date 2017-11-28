@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Pedido</h3>
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

			{!!Form::open(array('url'=>'usuarios/pedido','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            

<div class="row">
    
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
    <label for="Usuario">Usuarios</label>
<select name="Id_Usuario" id="Id_Usuario" class="form-control selectpicker" data-live-search="true">
    
    @foreach($usuarios as $u)

<option value="{{$u->Id_Usuario}}"> {{$u->Nombres}}</option>
    @endforeach
</select>
        </div>

    </div>



    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
    <label for="Cliente">Clientes</label>
<select name="Id_Cliente" id="Id_Cliente" class="form-control selectpicker" data-live-search="true">
    
    @foreach($clientes as $c)

<option value="{{$c->Id_Cliente}}"> {{$c->nombre}}</option>
    @endforeach
</select>
        </div>

    </div>


    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Fecha_Registro">Fecha Registro</label>
        <input type="date" name="Fecha_Registro" required value="{{old('Fecha_Registro')}}" class="form-control" placeholder="Ej: 12/09/31...">
    </div>


    </div>
  </div>

  <div class="row">

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-3 col-sm-3 col-md-3   col-xs-12">
<div class="form-group">
    
    <label>Lote</label>
<select name="pId_Lote" class="form-control selectpicker" id="pId_Lote" data-live-search="true">

    @foreach($lotes as $lote)

    <option value="{{$lote->Id_Lote}}">{{$lote->lote}}</option>
    @endforeach
    
</select>


</div>

            </div>

            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                   
        <label for="Cantidad">Cantidad</label>
        <input type="number" name="pCantidad" id="pCantidad" class="form-control" placeholder="Cantidad..."> 
                </div>
            </div>

            <div class="col-lg-3 col-sm-3 col-md-3   col-xs-12">
                <div class="form-group">
                     <label for="pSubtotal">Subtotal</label>
        <input type="number" name="pSubtotal" id="pSubtotal" class="form-control" placeholder="..."> 
                </div>
            </div>
             



             <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                  <button type="button" id="bt_add" class="btn btn-primary">Agregar</button>
                </div>

            </div>
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
               
               <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                   <thead style="background-color:#FF0000">
                       <th>Opciones</th>
                       <th>Lote</th>
                       <th>Cantidad</th>
                       <th>SubTotal</th>
                   </thead>
                   <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    
                    <th></th>
                    <th> <h4 id="total">S/. 0.00</h4> </th>
                   </tfoot>
                   <tbody>
                       
                   </tbody>

               </table> 
                
            </div>

 </div>
        </div>
        
    </div>

            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">

            <div class="form-group">
                <input  name="_token" value="{{csrf_token()}}" type="hidden"></input>
                <button class="btn btn-primary" type="submit">Crear</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
  </div>

</div>

   
        
     
 


			{!!Form::close()!!}		
            

@push('scripts')

<script>

    $(document).ready(function(){
        $('#bt_add').click(function(){
            agregar();

        });
    });

    var cont=0;
    total = 0;
    subtotal=[];
    $("#guardar").hide();

    function agregar()
    {

    Id_Lote=$("#pId_Lote").val();
    lote=$("#pId_Lote option:selected").text();
    Cantidad=$("#pCantidad").val();
   SubTotal=$("#pSubtotal").val();
   

    if (Id_Lote!="" && Cantidad!=""  && SubTotal!="" ) {

        subtotal[cont]=(Subtotal);
        total= total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td>  <td><input type="hidden" name="Id_Lote[]" value="'+Id_Lote+'">'+Lote+' </td>   <td><input type="number" name="Cantidad[]" value="'+Cantidad+'"></td>   <td><input type="number" name="SubTotal[]" value="'+SubTotal+'"></td><td>'+subtotal[cont]+' </td> </tr>';
        cont= cont+1;
        limpiar();
        $("#total").html("S/." + total);
        evaluar();
        $('#detalles').append(fila);
    }
    else {

        alert("Error al ingresar el detalle del pedido, revise los datos del lote");
    }



    }
    function limpiar(){

$("#pCantidad").val("");
$("#pSubtotal").val("");
    }

    function evaluar(){

        if (total>0) {

            $("#guardar").show();
        }
else{
    $("#guardar").hide();
}

    }

    function eliminar(index){

        total=total-subtotal[index];
        $("#total").html("S/. " + total);
        $("#fila" + index).remove();
        evaluar();
    }

</script>

@endpush
	
@endsection