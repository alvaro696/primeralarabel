<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RamoTipo extends Model
{
    use HasFactory;

    protected $table = "ramo_tipos";
    protected $primaryKey = "id_ramo_tipo";

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_ramo_tipo', 'id_ramo_tipo');
    }
    public function ramo()
    {
        return $this->belongsTo(Ramo::class, 'id_ramo', 'id_ramo');
    }
}
