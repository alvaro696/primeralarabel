<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model
{
    use HasFactory;

    protected $table = "cotizaciones";
    protected $primaryKey = "id_cotizacion";

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente', 'id_cliente');
    }

    public function poliza()
    {
        return $this->hasOne(Poliza::class, 'id_cotizacion', 'id_cotizacion');
    }

    public function distrito()
    {
        return $this->belongsTo(Distrito::class, 'id_distrito', 'id_distrito');
    }
    public function ramoTipo()
    {
        return $this->belongsTo(RamoTipo::class, 'id_ramo_tipo', 'id_ramo_tipo');
    }
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'id_estado', 'id_estado');
    }
}
