<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RamoTipoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_ramo_tipo' => $this->id_ramo_tipo,
            'ramo_tipo' => $this->ramo_tipo,
            //'id_ramo' => $this->id_ramo,
        ];
    }
    public function with(Request $request)
    {
        return [
            'Proyecto' => 'Angular',
        ];
    }
}
