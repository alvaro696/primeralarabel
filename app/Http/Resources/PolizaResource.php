<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PolizaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_cotizacion' => $this->id_cotizacion,
            'valor_asegurado' => round($this->valor_asegurado, 2),
            'prima' => round($this->prima, 2),
            'cod_poliza' => $this->poliza->id_poliza,
            'poliza' => $this->poliza,
            'items' => $this->poliza->items
                ->where('id_poliza', $this->poliza->id_poliza)
                ->where('id_estado', 1)
                ->map(function ($item) {
                    return [
                        'placa' => $item->placa,
                        'clase' => $item->clase,
                        'marca' => $item->marca,
                        'modelo' => $item->modelo,
                        'uso' => $item->uso,
                        'color' => $item->color,
                        'foto_frontal' => url($item->foto_frontal),
                        'estado' => $item->estado->estado,
                    ];
                }),
        ];
        //return parent::toArray($request);
    }
    public function with(Request $request)
    {
        return [
            'Proyecto' => 'Angular',
        ];
    }
}
