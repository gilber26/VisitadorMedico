<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class det_pedido_lote extends Model
{
     protected $table='det_pedido_lote';
     protected $primaryKey='id_pedido_lote';
     public $timestamps=false;


     protected $fillable=[

     'Id_Pedido',
     'Id_Lote',
     'Cantidad',
     'Subtotal'
     ];

     protected $guarded =[
     ];
}
