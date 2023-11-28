<?php

namespace App\Contracts;

use Illuminate\Http\JsonResponse;

interface APIInterface
{
    public function edit(int $id): JsonResponse;
}
