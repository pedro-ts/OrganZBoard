<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,

            'strCep' => $this->cep,

            'strRua' => $this->rua,

            'intNumero' => $this->numero,

            'strComplemento' => $this->complemento,

            'strBairro' => $this->bairro,

            'strCidade' => $this->cidade,

            'strEstado' => $this->estado,

        ];
    }
}
