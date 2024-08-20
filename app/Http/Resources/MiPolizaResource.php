<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class MiPolizaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_poliza' => $this->id_poliza,
            'cod_poliza' => $this->cod_poliza,
            'f_ini' => $this->f_ini,
            'f_fin' => $this->f_fin,
            'tipo_pago' => $this->tipo_pago,
            'valor_asegurado' => $this->cotizacion->valor_asegurado,
            'prima' => $this->cotizacion->prima,
            'nombre' => $this->cotizacion->cliente->nombres,
            'primer_apellido' => $this->cotizacion->cliente->primer_apellido,
            'segundo_apellido' => $this->cotizacion->cliente->segundo_apellido,
            'distrito' => $this->cotizacion->distrito->distrito,
            'estado' => $this->estado->estado,
            'items' => $this->items->where('id_poliza', $this->id_poliza)->where('id_estado', 1)->map(function ($item) {
                return [
                    'placa' => $item->placa,
                    'clase' => $item->clase,
                    'marca' => $item->marca,
                    'modelo' => $item->modelo,
                    'uso' => $item->uso,
                    'color' => $item->color,
                    'foto_frontal' => url(Storage::url($item->foto_frontal)),
                    'estado' => $item->estado->estado,
                ];
            }),
        ];
    }
    public function with(Request $request)
    {
        return [
            'Proyecto' => 'Angular',
        ];
    }
}
