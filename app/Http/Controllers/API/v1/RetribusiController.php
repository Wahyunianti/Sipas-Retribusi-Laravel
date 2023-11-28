<?php

namespace App\Http\Controllers\API\v1;

use App\Contracts\APIInterface;
use App\Models\Retribusi;
use App\Http\Controllers\Controller;
use App\Http\Resources\RetribusiEditResource;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class RetribusiController extends Controller implements APIInterface
{
    public function edit(int $id): JsonResponse
    {
        $retribusi = new RetribusiEditResource(Retribusi::with('data_pasar:id,nama_pasar', 'bagian:id,nama_bagian')->findOrFail($id));

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $retribusi
        ]);
    }
}
