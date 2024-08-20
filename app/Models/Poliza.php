<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poliza extends Model
{
    use HasFactory;

    protected $table = "polizas";
    protected $primaryKey = "id_poliza";

    public function cotizacion()
    {
        return $this->belongsTo(Cotizacion::class, 'id_cotizacion', 'id_cotizacion');
    }
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_poliza', 'id_poliza');
    }

    public function siniestros()
    {
        return $this->hasMany(Siniestro::class, 'id_poliza', 'id_poliza');
    }

    public function items()
    {
        return $this->hasMany(Item::class, 'id_poliza', 'id_poliza');
    }

    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }
}
