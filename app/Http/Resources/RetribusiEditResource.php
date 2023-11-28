<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RetribusiEditResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'data_pasar_id' => $this->data_pasar_id,
            'bagian_id' => $this->bagian_id,          
           
            'data_pasar' => [
                'id' => $this->data_pasar->id,
                'nama_pasar' => $this->data_pasar->nama_pasar
            ],
            'bagian' => [
                'id' => $this->bagian->id,
                'nama_bagian' => $this->bagian->nama_bagian
            ],
            'jumlah' => $this->jumlah,
        ];
    }
}
