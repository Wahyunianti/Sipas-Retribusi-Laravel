<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Repositories\ChartRepository;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class DashboardChartController extends Controller
{
    public function __construct(
        private ChartRepository $dashboardChartRepository,
    ) {
    }

    public function __invoke(): JsonResponse
    {
        $data = $this->dashboardChartRepository->sumRetribusiPerBulan();

        return response()->json([
            'code' => Response::HTTP_OK,
            'data' => $data
        ]);
    }
}
