<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Services\CreatorService;
use App\Exceptions\CustomErrorException;
use App\Exceptions\CustomNotFoundException;

class CreatorController extends Controller
{
    /**
     * Default property for service factory.
     * @var CreatorService $service
     */
    protected CreatorService $service;

    /**
     * Set default instance of service.
     *
     * @param CreatorService $service
     */
    public function __construct(CreatorService $service)
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
        $response = $this->service->getAllCreators();

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
        $response = $this->service->storeNewCreator($data);

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
        $response = $this->service->findCreatorById($id);

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
        $response = $this->service->updateCreatorById($id, $data);

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
        $response = $this->service->deleteCreatorById($id);

        return response()->json($response);
    }
}