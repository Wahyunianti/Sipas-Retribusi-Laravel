<?php

namespace App\Http\Controllers\API\v1;

use App\Contracts\APIInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\PasarEditResource;
use App\Models\DataPasar;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PasarController extends Controller implements APIInterface
{
    public function edit(int $id): JsonResponse
    {
        $pasar = new PasarEditResource(DataPasar::findOrFail($id));

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $pasar
        ]);
    }
}
