@extends ('layouts.admin')
@section ('contenido')
	


<div class="row">
    
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="form-group">
    <label for="Laboratorio">Laboratorio</label>

<p>{{$lote->NomLaboratorio}}</p>
        </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
        
    <div class="form-group">
        <label for="NumRemision">NumRemision</label>
        <p>{{$lote->NumRemision}}</p>
    </div>

    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="FechaRemision">FechaRemision</label>
         <p>{{$lote->FechaRemision}}</p>
    </div>


    </div>

    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
         <div class="form-group">
        <label for="Estado">Estado</label>
         <p>{{$lote->Estado}}</p>
    </div>


    </div>
  </div>

  <div class="row">

    <div class="panel panel-primary">
        <div class="panel-body">
            
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
               
               <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                   <thead style="background-color:#FF0000">
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
                    <th> <h4 id="total">{{$lote->total}} </h4> </th>
                   </tfoot>
                   <tbody>
                       @foreach($detalle as $det)
                        <tr>
                            <td>{{$det -> producto}}</td>
                            <td>{{$det -> Cantidad}}</td>
                            <td>{{$det -> Costo}}</td>
                            <td>{{$det -> Precio}}</td>
                            <td>{{$det -> Fecha_Vencimiento}}</td>
                            <td>{{$det -> Stock_Lote}}</td>
                            <td>{{$det -> Cantidad * $det -> Costo}}</td>
                           
                        </tr>

                       @endforeach

                   </tbody>

               </table> 
                
            </div>

 </div>
        </div>
        
    

</div>

   
        
     
 


			
@endsection