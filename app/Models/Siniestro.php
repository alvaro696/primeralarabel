<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siniestro extends Model
{
    use HasFactory;

    protected $table = "siniestros";
    protected $primaryKey = "id_siniestro";

    public function poliza()
    {
        return $this->belongsTo(Poliza::class, 'id_poliza', 'id_poliza');
    }

    public function siniestrosDetalles()
    {
        return $this->hasMany(SiniestroDetalle::class, 'id_siniestro', 'id_siniestros');
    }
    public function estado()
    {
        return $this->hasMany(Estado::class, 'id_estado', 'id_estado');
    }
}
