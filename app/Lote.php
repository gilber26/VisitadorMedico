<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    

    protected $table='lote';
     protected $primaryKey='Id_Lote';
     public $timestamps=false;


     protected $fillable=[

     'Id_laboratorio',
     'NumRemision',
     'FechaRemision'
     ];

     protected $guarded =[
     ];

}
