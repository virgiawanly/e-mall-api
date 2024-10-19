<?php

namespace App\Repositories;

use App\Models\MallTenant;
use App\Repositories\Interfaces\MallTenantRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class MallTenantRepository extends BaseResourceRepository implements MallTenantRepositoryInterface
{
    /**
     * Create a new repository instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = new MallTenant();
    }

    /**
     * Get tenants from a mall with pagination.
     *
     * @param int $mallId
     * @param int $perPage
     * @param array $queryParams
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginatedMallTenantList(int $mallId, int $perPage, array $queryParams = []): LengthAwarePaginator
    {
        // Prepare the query
        $search = $queryParams['search'] ?? '';
        $sortBy = $queryParams['sort'] ?? '';
        $order = $queryParams['order'] ?? 'asc';
        $sortOrder = (str_contains($order, 'asc') ? 'asc' : 'desc') ?? '';
        $searchableColumns = $queryParams['searchable_columns'] ?? [];

        return $this->model
            ->where('mall_id', $mallId)
            ->search($search, $searchableColumns)
            ->searchColumns($queryParams)
            ->ofOrder($sortBy, $sortOrder)
            ->paginate($perPage);
    }
}
