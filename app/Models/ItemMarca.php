<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemMarca extends Model
{
    use HasFactory;
    
    protected $table = "polizas";
    protected $primaryKey = "id_poliza";
}
