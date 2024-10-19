<?php

namespace App\Services;

use App\Http\Requests\Backoffice\Tenant\CreateMallTenantRequest;
use App\Http\Requests\Backoffice\Tenant\UpdateMallTenantRequest;
use App\Models\MallTenant;
use App\Repositories\Interfaces\MallTenantRepositoryInterface;

class MallTenantService extends BaseResourceService
{
    /**
     * Create a new service instance.
     *
     * @param \App\Repositories\Interfaces\MallTenantRepositoryInterface $repository
     * @return void
     */
    public function __construct(MallTenantRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get repository instance.
     *
     * @return \App\Repositories\Interfaces\MallTenantRepositoryInterface
     */
    public function repository(): MallTenantRepositoryInterface
    {
        return $this->repository;
    }

    /**
     * Create a new resource.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\CreateMallTenantRequest  $request
     * @return \App\Models\MallTenant
     */
    public function saveMallTenant(CreateMallTenantRequest $request): MallTenant
    {
        $payload = $request->except(['image', 'images']);

        // Store mall tenant main image
        if ($request->hasFile('image')) {
            $payload['image'] = $request->file('image')->store('mall_tenants');
        }

        // Save mall tenant
        $mallTenant = $this->repository->save($payload);

        // Store mall tenant images
        if ($request->has('images') && is_array($request->images)) {
            $this->_saveMallTenantImages($mallTenant, $request->images);
        }

        return $mallTenant;
    }

    /**
     * Create a new resource.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\UpdateMallTenantRequest  $request
     * @return \App\Models\MallTenant
     */
    public function patchMallTenant(int $id, UpdateMallTenantRequest $request): MallTenant
    {
        // Find mall tenant (find or fail)
        $mallTenant = $this->repository->find($id);

        // Populate payload
        $payload = $request->except(['image', 'images']);

        // Store mall tenant main image
        if ($request->hasFile('image')) {
            $payload['image'] = $request->file('image')->store('mall_tenants');
        }

        // Update mall tenant
        $mallTenant->update($payload);

        // Store mall tenant images
        if ($request->has('images') && is_array($request->images)) {
            $this->_saveMallTenantImages($mallTenant, $request->images);
        }

        // Remove the image that should be removed
        if ($request->has('remove_image_ids') && is_array($request->remove_image_ids)) {
            $this->_removeMallTenantImages($mallTenant, $request->remove_image_ids);
        }

        return $mallTenant;
    }

    /**
     * Store mall tenant images.
     *
     * @param  \App\Models\MallTenant  $mallTenant
     * @param  array  $images
     * @return void
     */
    private function _saveMallTenantImages(MallTenant $mallTenant, array $images): void
    {
        foreach ($images as $image) {
            $imagePath = $image['file']->store('mall_tenants');
            $mallTenant->images()->create([
                'image' => $imagePath,
                'is_primary' => $image['is_primary'] ?? false,
            ]);
        }
    }

    /**
     * Remove mall tenant images.
     *
     * @param  \App\Models\MallTenant  $mallTenant
     * @param  array  $removeImageIds
     * @return void
     */
    private function _removeMallTenantImages(MallTenant $mallTenant, array $removeImageIds): void
    {
        $mallTenant->images()->whereIn('id', $removeImageIds)->delete();
    }
}
