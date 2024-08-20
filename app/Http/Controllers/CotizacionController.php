<?php

namespace App\Http\Controllers;

use App\Models\Cotizacion;
use Illuminate\Http\Request;
use App\Http\Resources\CotizarResource;
use App\Http\Resources\CotizacionResource;
use App\Http\Resources\MiCotizacionResource;

class CotizacionController extends Controller
{
    public function cotizar(Request $request)
    {
        $ramo_tipo = $request->ramo_tipo;
        $distrito = $request->distrito;
        $valor_asegurado = $request->valor_asegurado;

        if ($distrito == 1) { //LA PAZ
            $prima = ($valor_asegurado * 1.26) / 100;
        } elseif ($distrito == 2) { //COCHABAMBA
            $prima = ($valor_asegurado * 1.28) / 100;
        } elseif ($distrito == 3) { //SANTA CRUZ
            $prima = ($valor_asegurado * 1.2) / 100;
        } else { //RESTO DEL PAIS
            $prima = ($valor_asegurado * 1.3) / 100;
        }
        $responder = [
            'prima' => $prima,
        ];
        return new CotizarResource($responder);
    }
    public function crear(Request $request)
    {

        $cotizacion = new Cotizacion();

        $cotizacion->id_ramo_tipo = $request->id_ramo_tipo;
        $cotizacion->id_estado = 1;
        $cotizacion->id_distrito = $request->id_distrito;
        $cotizacion->valor_asegurado = $request->valor_asegurado;
        $cotizacion->prima = $request->prima;

        $cotizacion->tasa = round((($request->prima * 100) / $request->valor_asegurado), 2);
        $cotizacion->f_cotizacion = now();
        /*  $cotizacion->nombre_ompleto = $request->nombreCompleto;
        $cotizacion->celular = $request->celular; */

        $cotizacion->save();
        return new CotizacionResource($cotizacion);
    }

    public function listar($id_cliente)
    {
        $cotizacion = Cotizacion::where('id_cliente', '=', $id_cliente)->where('id_estado', '=', 1)->get();
        return new CotizacionResource($cotizacion);
    }
    public function seleccionar($id_cotizacion)
    {
        $cotizacion = Cotizacion::find($id_cotizacion);
        return new MiCotizacionResource($cotizacion);
    }
}
