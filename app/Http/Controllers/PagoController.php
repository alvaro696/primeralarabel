<?php

namespace App\Http\Controllers;

use App\Http\Resources\PagoCollection;
use App\Models\Cotizacion;
use Illuminate\Http\Request;

class PagoController extends Controller
{
    public function listar($id_cliente)
    {
        $pagos = Cotizacion::where('id_cliente', $id_cliente)->where('id_estado', 2)->get();

        return new PagoCollection($pagos);
    }
}
