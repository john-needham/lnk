<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface ModelRepositoryInterface
 * @package App\Repositories
 */
interface ModelRepositoryInterface
{
    /**
     * @param array $data
     * @return Model
     */
    public function create(array $data = []);
}
