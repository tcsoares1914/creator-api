<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\NetworkService;
use App\Exceptions\CustomErrorException;
use App\Exceptions\CustomNotFoundException;

class NetworkController extends Controller
{
    /**
     * Default property for service factory.
     * @var NetworkService $service
     */
    protected NetworkService $service;

    /**
     * Set default instance of service.
     *
     * @param NetworkService $service
     */
    public function __construct(NetworkService $service)
    {
        $this->service = $service;
    }

    /**
     * List all networks.
     *
     * @return JsonResponse
     */
    public function default() : JsonResponse
    {
        $response = $this->service->getAllNetworks();

        return response()->json($response);
    }

    /**
     * Create new network.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws CustomErrorException
     */
    public function create(Request $request) : JsonResponse
    {
        $data = $request->all();
        $response = $this->service->storeNewNetwork($data);

        return response()->json($response);
    }

    /**
     * Read specific network.
     *
     * @param int $id
     * @return JsonResponse
     * @throws CustomNotFoundException
     */
    public function read(int $id) : JsonResponse
    {
        $response = $this->service->findNetworkById($id);

        return response()->json($response);
    }

    /**
     * Update specific network.
     *
     * @param int $id
     * @param Request $request
     * @return JsonResponse
     * @throws CustomErrorException
     */
    public function update(int $id, Request $request) : JsonResponse
    {
        $data = $request->all();
        $response = $this->service->updateNetworkById($id, $data);

        return response()->json($response);
    }

    /**
     * Delete specific network.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id) : JsonResponse
    {
        $response = $this->service->deleteNetworkById($id);

        return response()->json($response);
    }
}