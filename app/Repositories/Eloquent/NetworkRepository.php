<?php

namespace App\Repositories\Eloquent;

use App\Models\Network;
use App\Repositories\Repository;
use Illuminate\Support\Facades\Validator;
use Dotenv\Exception\ValidationException;
use App\Exceptions\CustomErrorException;
use App\Exceptions\CustomNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class NetworkRepository extends Repository
{
    /**
     * Default property for model factory.
     *
     * @var Network $model
     */
    protected Network $model;

    /**
     * Set default instance for model.
     *
     * @param Network $model
     */
    public function __construct(Network $model)
    {
        $this->model = $model;
    }

    /**
     * Get all items from collection.
     *
     * @param array $columns
     * @return object|null
     */
    public function all($columns = ['*']) : ?object
    {
        return $this->model->get($columns);
    }

    /**
     * Create a new item on database.
     *
     * @param array $data
     * @return object|null
     * @throws CustomErrorException
     */
    public function store(array $data) : ?object
    {
        try {
            $validator = Validator::make($data, [
                'name' => 'required'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                throw new ValidationException($errors);
            }

            return $this->model->create($data);
        } catch (QueryException | ValidationException $exception) {
            throw new CustomErrorException($exception->getMessage());
        }
    }

    /**
     * Get a specific item from database.
     *
     * @param int $id
     * @return object|null
     * @throws CustomNotFoundException
     */
    public function find(int $id) : ?object
    {
        try {
            return $this->model->findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            throw new CustomNotFoundException($exception->getMessage());
        }
    }

    /**
     * Update specific item from database.
     *
     * @param int $id
     * @param array $data
     * @return bool
     * @throws CustomErrorException
     */
    public function update(int $id, array $data) : bool
    {
        try {
            $validator = Validator::make($data, [
                'name' => 'sometimes'
            ]);

            if ($validator->fails()) {
                $errors = $validator->errors();
                throw new ValidationException($errors);
            }

            return $this->model->where('id', '=', $id)
                ->update($data);
        } catch (QueryException | ValidationException $exception) {
            throw new CustomErrorException($exception->getMessage());
        }
    }

    /**
     * Delete a specific item from database.
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id) : bool
    {
        if ($this->model->destroy($id)) {
            return true;
        };

        return false;
    }
}