<?php

namespace App\Services;

use App\Repositories\Eloquent\NetworkRepository;
use App\Exceptions\CustomErrorException;
use App\Exceptions\CustomNotFoundException;

class NetworkService extends Service
{
    /**
     * Default property repository factory.
     * @var NetworkRepository $repository
     */
    protected NetworkRepository $repository;

    /**
     * Set default instance for repository.
     *
     * @param NetworkRepository $repository
     */
    public function __construct(NetworkRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all items from collection.
     *
     * @return object|null
     */
    public function getAllNetworks() : ?object
    {
        return $this->repository->all();
    }

    /**
     * Create a new item into collection.
     *
     * @param array $data
     * @return object|null
     * @throws CustomErrorException
     */
    public function storeNewNetwork(array $data) : ?object
    {
        return $this->repository->store($data);
    }

    /**
     * Find specific item from collection.
     *
     * @param int $id
     * @return object|null
     * @throws CustomNotFoundException
     */
    public function findNetworkById(int $id) : ?object
    {
        return $this->repository->find($id);
    }

    /**
     * Update specific item from collection.
     *
     * @param int $id
     * @param array $data
     * @return bool|null
     * @throws CustomErrorException
     */
    public function updateNetworkById(int $id, array $data) : ?bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete specific item from collection.
     *
     * @param int $id
     * @return bool
     */
    public function deleteNetworkById(int $id) : bool
    {
        return $this->repository->delete($id);
    }
}