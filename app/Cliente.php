<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='Cliente';
     protected $primaryKey='Id_Cliente';
     public $timestamps=false;


     protected $fillable=[

     'Id_Cliente',
     'Tipo_documento',
     'Numero_documento',
     'Direccion',
     'Telefono',
     'nombre'
     ];
}
