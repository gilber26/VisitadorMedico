<?php

namespace vMedic;

use Illuminate\Database\Eloquent\Model;

class Laboratorio extends Model
{
    protected $table='laboratorio';

    protected $primaryKey="Id_laboratorio";

    public $timestamps=false;

    protected $fillable = [
    	'NomLaboratorio', 
    	'Nit',
    	'Correo',
    	'Telefono',
    	'Direccion'
    ];
}
