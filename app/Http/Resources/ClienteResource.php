<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'nombres' => $this->nombres,
            'primer_apellido' => $this->primer_apellido,
            'segundo_apellido' => $this->segundo_apellido,
            'cotizaciones' => $this->cotizaciones ?? 'NO hay',
            'polizas' => $this->cotizaciones->first()?->poliza ?? 'no existe',
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
