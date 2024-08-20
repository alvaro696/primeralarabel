<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    use HasFactory;

    protected $table = "distritos";
    protected $primaryKey = "id_distrito";

    public function cotizaciones()
    {
        return $this->hasMany(Cotizacion::class, 'id_distrito', 'id_distrito');
    }
}
