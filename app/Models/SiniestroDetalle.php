<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiniestroDetalle extends Model
{
    use HasFactory;

    protected $table = "siniestros_detalles";
    protected $primaryKey = "id_siniestro_detalle";

    public function siniestro()
    {
        return $this->belongsTo(Siniestro::class, 'id_siniestro', 'id_siniestro');
    }
}
