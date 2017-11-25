<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    

     protected $table='Productos';
     protected $primaryKey='Id_Producto';
     public $timestamps=false;


     protected $fillable=[

     'Id_TipoProducto',
     'NomProducto',
     'Descripcion',
     'Estado'
     
     ];
}
