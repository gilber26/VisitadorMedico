<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
     protected $table='usuario';
     protected $primaryKey='Id_Usuario';
     public $timestamps=false;


     protected $fillable=[

     'Id_TipoUsuario',
     'Nombres',
     'Apellidos',
     'Identificacion',
     'Correo',
     'Clave',
     'Direccion',
     'Estado'
     ];

     protected $guarded =[
     ];
}
