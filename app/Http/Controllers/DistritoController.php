<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistritoCollection;
use App\Models\Distrito;
use Illuminate\Http\Request;

class DistritoController extends Controller
{
    public function listar()
    {
        $respuesta = Distrito::get();
        return new DistritoCollection($respuesta);
    }
}
