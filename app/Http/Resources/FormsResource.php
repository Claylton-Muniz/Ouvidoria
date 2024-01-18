<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormsResource extends JsonResource
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
            'servidor' => $this->servidor,
            'entrevistado' => $this->entrevistado,
            'tipo_form' => $this->tipo_form,
            'data_atual' => $this->data_atual,
            'data_nasc' => $this->data_nasc,
            'email' => $this->email,
            'telefone' => $this->telefone,
            'endereco' => $this->endereco,
            'sexo' => $this->sexo,
            'mensagem' => $this->mensagem
        ];
    }
}
