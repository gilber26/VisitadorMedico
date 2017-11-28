@extends ('layouts.admin')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Lote</h3>
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

			{!!Form::open(array('url'=>'usuarios/lote','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
            

<div class="row">
    
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
    <label for="Laboratorio">Laboratorio</label>
<select name="Id_laboratorio" id="Id_laboratorio" class="form-control selectpicker" data-live-search="true">
    
    @foreach($laboratorios as $la)

<option value="{{$la->Id_laboratorio}}"> {{$la->NomLaboratorio}}</option>
    @endforeach
</select>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NumRemision">NumRemision</label>
        <input type="text" name="NumRemision" required value="{{old('NumRemision')}}" class="form-control" placeholder="Ej:1234678...">
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="FechaRemision">FechaRemision</label>
        <input type="date" name="FechaRemision" required value="{{old('FechaRemision')}}" class="form-control" placeholder="Ej: 12/09/31...">
    </div>


    </div>
  </div>

  <div class="row">

    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="col-lg-3 col-sm-3 col-md-3   col-xs-12">
<div class="form-group">
    
    <label>Producto</label>
<select name="pId_Producto" class="form-control selectpicker" id="pId_Producto" data-live-search="true">

    @foreach($productos as $producto)

    <option value="{{$producto->Id_Producto}}">{{$producto->producto}}</option>
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
                     <label for="Costo">Costo</label>
        <input type="number" name="pCosto" id="pCosto" class="form-control" placeholder="Costo..."> 
                </div>
            </div>
             <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="Precio">Precio</label>
        <input type="number" name="pPrecio" id="pPrecio" class="form-control" placeholder="precio..."> 
                </div>
            </div>
           
            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="Fecha_Vencimiento">Fecha_Vencimiento</label>
        <input type="date" name="pFecha_Vencimiento" id="pFecha_Vencimiento" class="form-control" placeholder="Fecha Vencimiento..."> 
                </div>
            </div>

              <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                <div class="form-group">
                    <label for="Stock_Lote">Stock_Lote</label>
        <input type="number" name="pStock_Lote" id="pStock_Lote" class="form-control" placeholder="Stock Lote..."> 
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
                       <th>Producto</th>
                       <th>Cantidad</th>
                       <th>Costo</th>
                       <th>Precio</th>
                       <th>Fecha_Vencimiento</th>
                       <th>Stock_Lote</th>
                       <th>SubTotal</th>
                   </thead>
                   <tfoot>
                    <th>TOTAL</th>
                    <th></th>
                    <th></th>
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

    Id_Producto=$("#pId_Producto").val();
    producto=$("#pId_Producto option:selected").text();
    Cantidad=$("#pCantidad").val();
    Costo=$("#pCosto").val();
    Precio=$("#pPrecio").val();
    Fecha_Vencimiento=$("#pFecha_Vencimiento").val();
    Stock_Lote=$("#pStock_Lote").val();

    if (Id_Producto!="" && Cantidad!=""  && Costo!=""  && Precio!=""  && Fecha_Vencimiento!="" && Stock_Lote!="") {

        subtotal[cont]=(Cantidad*Costo);
        total= total+subtotal[cont];

        var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button> </td><td><input type="hidden" name="Id_Producto[]" value="'+Id_Producto+'">'+producto+' </td><td> <input type="number" name="Cantidad[]" value="'+Cantidad+'"></td><td> <input type="number" name="Costo[]" value="'+Costo+'"></td><td> <input type="number" name="Precio[]" value="'+Precio+'"></td><td> <input type="date" name="Fecha_Vencimiento[]" value="'+Fecha_Vencimiento+'"></td> <td> <input type="number" name="Stock_Lote[]" value="'+Stock_Lote+'"></td> <td>'+subtotal[cont]+' </td> </tr>';
        cont= cont+1;
        limpiar();
        $("#total").html("S/." + total);
        evaluar();
        $('#detalles').append(fila);
    }
    else {

        alert("Error al ingresar el detalle del lote, revise los datos del producto");
    }



    }
    function limpiar(){

$("#pCantidad").val("");
$("#pCosto").val("");
$("#pPrecio").val("");
$("#pFecha_Vencimiento").val("");
$("#pStock_Lote").val("");

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