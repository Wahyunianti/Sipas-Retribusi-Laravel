<?php

namespace App\Http\Controllers\API\v1;

use App\Contracts\APIInterface;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\PenggunaEditResource;
use Symfony\Component\HttpFoundation\Response;

class PenggunaController extends Controller implements APIInterface
{
    public function edit(int $id): JsonResponse
    {
        $user = new PenggunaEditResource(User::findOrFail($id));

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $user
        ]);
    }
}
