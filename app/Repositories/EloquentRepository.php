<?php

namespace App\Repositories;

use App\Link;
use Illuminate\Database\Eloquent\Model;

/**
 * Class LinkRepository
 * @package App\Repositories
 */
class EloquentRepository
{
    /**
     * @var Model
     */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        // TODO: Implement all() method (admin?).
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return
     */
    public function update($id, array $data)
    {
        $model = $this->findById($id);
        return $model->update($data);
    }

    /**
     * @param Model $model
     * @return bool
     */
    public function save(Model $model)
    {
        return $model->save();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function where(array $data)
    {
        return $this->model->where($data);
    }
}
