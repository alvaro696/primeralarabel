<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PagoResource extends JsonResource
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
            'poliza' => $this->poliza->cod_poliza,
            'pagos' => $this->poliza->pagos
                ->where('id_poliza', $this->poliza->id_poliza)
                ->map(function ($pagos) {
                    return [
                        'f_pago' => $pagos->f_pago,
                        'cuota' => $pagos->cuota,
                        'monto' => $pagos->monto,
                        'estado' => $pagos->estado->estado,
                    ];
                }),
        ];
    }
}
