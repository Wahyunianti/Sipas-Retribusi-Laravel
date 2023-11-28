<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PenggunaEditResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->email,
            'role_id' => $this->role_id,
            'roles' => [
                'id' => $this->roles->id,
                'role_name' => $this->roles->role_name
            ],
        ];
    }
}
