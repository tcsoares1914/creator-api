<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use App\Services\PingService;

class PingController extends Controller
{
    /**
     * Default property for service.
     *
     * @var PingService $service
     */
    protected PingService $service;

    /**
     * Set default instances on constructor.
     *
     * @param PingService $service
     */
    public function __construct(PingService $service)
    {
        $this->service = $service;
    }

    /**
     * Render API response.
     *
     * @return JsonResponse
     */
    public function pong() : JsonResponse
    {
        $response = $this->service->test();

        return response()->json($response);
    }
}
