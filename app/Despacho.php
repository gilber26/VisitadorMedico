<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class Despacho extends Model
{
    
   protected $table='despacho';
     protected $primaryKey='Id_Despacho';
     public $timestamps=false;


     protected $fillable=[

     'Id_Pedido',
     'Fecha_Despacho'
    
     ];

     protected $guarded =[
     ];

}
