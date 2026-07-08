<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    private \App\Services\DashboardService $dashboardService;

    public function __construct(\App\Services\DashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function getSummerize()
    {
        $summerize = $this->dashboardService->getSummerize();
        $currentSaldo = $this->dashboardService->getCurrentSaldo();

        return response()->json(
            ['summary'=> $summerize,
              'currentSaldo' => $currentSaldo
            ]);
    }

    public function getCurrentSaldo(){

        $result = $this->dashboardService->getCurrentSaldo();

        return response()->json(['Total cash' => $result]);

    }
}
