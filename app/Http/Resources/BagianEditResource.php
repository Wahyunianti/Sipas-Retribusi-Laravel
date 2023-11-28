<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BagianEditResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'nama_bagian' => $this->nama_bagian
        ];
    }
}
