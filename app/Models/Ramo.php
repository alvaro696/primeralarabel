<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ramo extends Model
{
    use HasFactory;

    protected $table = "ramos";
    protected $primaryKey = "id_ramo";

    public function tipos()
    {
        return $this->hasMany(RamoTipo::class, 'id_ramo', 'id_ramo');
    }
}
