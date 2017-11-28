<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class det_lote_producto extends Model
{
    
      protected $table='det_lote_producto';
     protected $primaryKey='id_lote_producto';
     public $timestamps=false;


     protected $fillable=[

     'Id_lote',
     'Id_Producto',
     'Cantidad',
     'Costo',
     'Precio',
     'Fecha_Vencimiento',
     'Stock_Lote'
     ];

     protected $guarded =[
     ];
}
