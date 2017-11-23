<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class tipo_usuario extends Model
{
    
 protected $table='tipo_usuario';
     protected $primaryKey='id_tipousuario';
     public $timestamps=false;


     protected $fillable=[

     'NomTipoUsuario'
    
     ];

     protected $guarded =[
     ];



}
