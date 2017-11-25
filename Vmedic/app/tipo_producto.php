<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class tipo_producto extends Model
{
    
 protected $table='tipo_producto';
     protected $primaryKey='Id_TipoProducto';
     public $timestamps=false;


     protected $fillable=[

     'NomTipoProducto'
    
     ];

     protected $guarded =[
     ];



}
