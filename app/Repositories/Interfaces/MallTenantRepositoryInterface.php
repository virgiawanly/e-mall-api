<?php

namespace App\Repositories\Interfaces;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface MallTenantRepositoryInterface extends BaseResourceRepositoryInterface
{
    /**
     * Get tenants from a mall with pagination.
     *
     * @param int $mallId
     * @param int $perPage
     * @param array $queryParams
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginatedMallTenantList(int $mallId, int $perPage, array $queryParams = []): LengthAwarePaginator;
}
