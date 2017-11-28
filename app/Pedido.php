<?php

namespace Vmedic;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
     protected $table='pedido';
     protected $primaryKey='Id_Pedido';
     public $timestamps=false;


     protected $fillable=[

     'Id_Usuario',
     'Id_Cliente',
     'Fecha_Registro',
     'Estado'
     ];

     protected $guarded =[
     ];
