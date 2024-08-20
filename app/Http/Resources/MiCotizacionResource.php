<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MiCotizacionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombres' => $this->cliente->nombres,
            'primer_apellido' => $this->cliente->primer_apellido,
            'segundo_apellido' => $this->cliente->segundo_apellido,
            'distrito' => $this->distrito->distrito,
            'prima' => round($this->prima, 2),
            'valor_asegurado' => round($this->valor_asegurado, 2),
            'ramo_tipo' => $this->ramoTipo->ramo_tipo,
            'ramo' => $this->ramoTipo->ramo->ramo
        ];
    }
    public function with(Request $request)
    {
        return [
            'Proyecto' => 'Angular',
        ];
    }
}
