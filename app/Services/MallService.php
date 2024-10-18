<?php

namespace App\Services;

use App\Repositories\Interfaces\MallRepositoryInterface;

class MallService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param \App\Repositories\Interfaces\MallRepositoryInterface $repository
     * @return void
     */
    public function __construct(MallRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository instance.
     *
     * @return \App\Repositories\Interfaces\MallRepositoryInterface
     */
    public function repository(): MallRepositoryInterface
    {
        return $this->repository;
    }
}
