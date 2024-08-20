<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    protected $primaryKey = "id_cliente";

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, "id_cliente", "id_cliente");
    }
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }
}
