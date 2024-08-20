<?php

namespace App\Http\Controllers;

use App\Models\Ramo;
use Illuminate\Http\Request;
use App\Http\Resources\RamoCollection;

class RamoController extends Controller
{
    public function listar()
    {
        $respuesta = Ramo::get();
        return new RamoCollection($respuesta);
    }
}
