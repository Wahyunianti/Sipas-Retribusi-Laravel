<?php

namespace App\Http\Controllers\API\v1;

use App\Contracts\APIInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\BagianEditResource;
use App\Models\Bagian;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class BagianController extends Controller implements APIInterface
{
    public function edit(int $id): JsonResponse
    {
        $bagian = new BagianEditResource(Bagian::findOrFail($id));

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $bagian
        ]);
    }
}
