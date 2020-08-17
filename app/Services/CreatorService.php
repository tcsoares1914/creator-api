<?php

namespace App\Services;

use App\Repositories\Eloquent\CreatorRepository;
use App\Exceptions\CustomErrorException;
use App\Exceptions\CustomNotFoundException;

class CreatorService extends Service
{
    /**
     * Default property repository factory.
     * @var CreatorRepository $repository
     */
    protected CreatorRepository $repository;

    /**
     * Set default instance for repository.
     *
     * @param CreatorRepository $repository
     */
    public function __construct(CreatorRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all items from collection.
     *
     * @return object|null
     */
    public function getAllCreators() : ?object
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
    public function storeNewCreator(array $data) : ?object
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
    public function findCreatorById(int $id) : ?object
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
    public function updateCreatorById(int $id, array $data) : ?bool
    {
        return $this->repository->update($id, $data);
    }

    /**
     * Delete specific item from collection.
     *
     * @param int $id
     * @return bool
     */
    public function deleteCreatorById(int $id) : bool
    {
        return $this->repository->delete($id);
    }
}