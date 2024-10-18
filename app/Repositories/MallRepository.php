<?php

namespace App\Repositories;

use App\Models\Mall;
use App\Repositories\Interfaces\MallRepositoryInterface;

class MallRepository extends BaseResourceRepository implements MallRepositoryInterface
{
    /**
     * Create a new repository instance.
     * 
     * @return void
     */
    public function __construct()
    {
        $this->model = new Mall();
    }
}