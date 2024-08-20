<?php

namespace App\Http\Controllers;

use App\Http\Resources\MiPolizaCreadaResource;
use App\Http\Resources\MiPolizaResource;
use App\Http\Resources\PolizaCollection;
use App\Http\Resources\PolizaResource;
use App\Models\Cliente;
use App\Models\Cotizacion;
use App\Models\Item;
use App\Models\Pago;
use App\Models\Poliza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Carbon\Carbon;

class PolizaController extends Controller
{
    public function listar($id_cliente)
    {
        $poliza = Cotizacion::where('id_cliente', $id_cliente)->where('id_estado', 2)->get();
        return new PolizaCollection($poliza);
    }

    public function seleccionar($id_poliza)
    {
        $poliza = Poliza::find($id_poliza);
        return new MiPolizaResource($poliza);
    }
    public function crear(Request $request, $id_cotizacion)
    {

        /*  $validatedData = $request->validate([
            'marca' => 'required|string|max:255',
            'modelo' => 'required|string|max:255',
            'anio' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'imagen1' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            'imagen2' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
            'imagen3' => 'file|mimes:jpeg,png,jpg,gif|max:2048',
        ]); */
        /* $marca = $validatedData['marca'];
        $modelo = $validatedData['modelo'];
        $year = $validatedData['year']; */


        $item = new Item();
        $poliza = new Poliza();
        $cotizacion = Cotizacion::find($id_cotizacion);

        $poliza->id_estado = 1;
        $poliza->id_cotizacion = $id_cotizacion;
        $poliza->tipo_pago = $request->tipo_pago;
        $poliza->f_ini = Carbon::today();
        $poliza->f_fin = Carbon::today()->addYear();
        $poliza->f_registro = now();

        $cadena = 'AU0000';
        $longitud_cadena = 7 - strlen($id_cotizacion);
        $cod_poliza = substr($cadena, 0, $longitud_cadena) . $id_cotizacion;

        $poliza->cod_poliza = $cod_poliza;
        $poliza->save();

        $imagenes  = [];
        if ($request->hasFile('foto_frontal')) {
            $imagenes['foto_frontal'] = $this->guardarFoto($request->file('foto_frontal'), $cod_poliza);
        }

        if ($request->hasFile('foto_lateral')) {
            $imagenes['foto_lateral'] = $this->guardarFoto($request->file('foto_lateral'), $cod_poliza);
        }

        if ($request->hasFile('foto_trasera')) {
            $imagenes['foto_trasera'] = $this->guardarFoto($request->file('foto_trasera'), $cod_poliza);
        }


        $item->id_poliza = $poliza->id_poliza;
        $item->id_estado = 1;
        $item->placa = $request->placa;
        $item->clase = $request->clase;
        $item->marca = $request->marca;
        $item->modelo = $request->modelo;
        $item->uso = $request->uso;
        $item->color = $request->color;
        $item->foto_frontal = $imagenes['foto_frontal'] ?? null;
        $item->foto_lateral = $imagenes['foto_lateral'] ?? null;
        $item->foto_trasera = $imagenes['foto_trasera'] ?? null;
        $item->save();

        if ($poliza->tipo_pago == 'CONTADO') {
            $pago = new Pago();
            $pago->id_estado = 3;
            $pago->id_poliza = $poliza->id_poliza;
            $pago->cuota = 0;
            $pago->monto = $cotizacion->prima;
            $pago->f_pago = Carbon::today()->addMonth();
            $pago->save();
        } else {
            $hoy = Carbon::today();
            for ($i = 1; $i <= 3; $i++) {
                $pago = new Pago();
                $pago->id_estado = 3;
                $pago->id_poliza = $poliza->id_poliza;
                $pago->cuota = $i;
                $pago->monto = ($cotizacion->prima) / 3;
                $pago->f_pago = $hoy->addMonth();
                $hoy = $pago->f_pago;
                $pago->save();
            }
        }
        $cotizacion->id_estado = 2;
        $cotizacion->id_cliente = $request->id_cliente;
        $cotizacion->save();

        return new MiPolizaCreadaResource($poliza);
    }

    private function guardarFoto($file, $cod_poliza)
    {
        $filename = $cod_poliza . '_' . Str::uuid() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs('vehiculos', $filename, 'public');

        return Storage::url($path);
    }
}
