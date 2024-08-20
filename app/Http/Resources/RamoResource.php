<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RamoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_ramo' => $this->id_ramo,
            'ramo' => $this->ramo,
        ];
    }

    public function with(Request $request)
    {
        return [
            'Proyecto' => 'Angular',
        ];
    }
}
