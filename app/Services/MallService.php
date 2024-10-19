<?php

namespace App\Services;

use App\Repositories\Interfaces\MallRepositoryInterface;
use App\Repositories\Interfaces\MallTenantRepositoryInterface;

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

    /**
     * Get all tenants in a mall.
     *
     * @param  int  $mallId
     * @param  array  $queryParams
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function listMallTenants(int $mallId, array $queryParams)
    {
        $size = $queryParams['size'] ?? $this->defaultPageSize;

        return app()->make(MallTenantRepositoryInterface::class)->paginatedMallTenantList($mallId, $size, $queryParams);
    }
}
