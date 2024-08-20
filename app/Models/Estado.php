<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = "estados";
    protected $primaryKey = "id_estado";

    public function polizas()
    {
        return $this->hasMany(Poliza::class, 'id_estado', 'id_estado');
    }
    public function pagos()
    {
        return $this->hasMany(Pago::class, 'id_estado', 'id_estado');
    }

    public function siniestros()
    {
        return $this->hasMany(Siniestro::class, 'id_estado', 'id_estado');
    }
    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_estado', 'id_estado');
    }
    public function items()
    {
        return $this->hasMany(Item::class, 'id_estado', 'id_estado');
    }
}
