<?php

namespace App\Http\Controllers;

use App\Http\Resources\SiniestroResource;
use App\Models\Siniestro;
use App\Models\SiniestroDetalle;
use Illuminate\Http\Request;

class SiniestroController extends Controller
{
    public function crear(Request $request, $id_poliza)
    {
        $siniestro = new Siniestro();
        $siniestro->id_poliza = $id_poliza;
        $siniestro->id_estado = 1;
        $siniestro->f_siniestro = $request->f_siniestro;
        $siniestro->f_denuncia = $request->f_denuncia;
        $siniestro->descripcion = $request->descripcion;
        $siniestro->f_registro = now();
        $siniestro->save();

        $detalles = new SiniestroDetalle();
        $detalles->id_siniestro = $siniestro->id_siniestro;
        $detalles->ruta = "ruta";
        $detalles->tipo_archivo = "extension";
        $detalles->save();

        return new SiniestroResource($siniestro);
    }
}
