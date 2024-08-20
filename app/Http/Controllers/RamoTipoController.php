<?php

namespace App\Http\Controllers;

use App\Http\Resources\RamoTipoCollection;
use App\Models\RamoTipo;
use Illuminate\Http\Request;

class RamoTipoController extends Controller
{
    public function listar($id_ramo)
    {
        $respuesta = RamoTipo::where("id_ramo", "=", "$id_ramo")->get();
        return new RamoTipoCollection($respuesta);
    }
}
