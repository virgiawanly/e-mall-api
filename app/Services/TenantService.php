<?php

namespace App\Services;

use App\Http\Requests\Backoffice\Tenant\CreateTenantRequest;
use App\Http\Requests\Backoffice\Tenant\UpdateTenantRequest;
use App\Models\Tenant;
use App\Repositories\Interfaces\TenantRepositoryInterface;

class TenantService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param \App\Repositories\Interfaces\TenantRepositoryInterface $repository
     * @return void
     */
    public function __construct(TenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository instance.
     *
     * @return \App\Repositories\Interfaces\TenantRepositoryInterface
     */
    public function repository(): TenantRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * Create a new resource.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\CreateTenantRequest  $request
     * @return \App\Models\Tenant
     */
    public function saveTenant(CreateTenantRequest $request): Tenant
    {
        $payload = $request->except(['image', 'logo']);

        // Save tenant image
        if ($request->hasFile('image')) {
            $payload['image'] = $request->file('image')->store('tenants');
        }

        // Save tenant logo
        if ($request->hasFile('logo')) {
            $payload['logo'] = $request->file('logo')->store('tenants');
        }

        return $this->repository->save($payload);
    }

    /**
     * Update the specified resource.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\UpdateTenantRequest  $request
     * @return \App\Models\Tenant
     */
    public function patchTenant(int $id, UpdateTenantRequest $request): Tenant
    {
        // Find tenant (find or fail)
        $tenant = $this->repository->find($id);

        // Populate payload
        $payload = $request->except(['image', 'logo']);

        // Save tenant image
        if ($request->hasFile('image')) {
            $payload['image'] = $request->file('image')->store('tenants');
        }

        // Save tenant logo
        if ($request->hasFile('logo')) {
            $payload['logo'] = $request->file('logo')->store('tenants');
        }

        $tenant->update($payload);

        return $tenant;
    }
}
