<?php

namespace App\Http\Controllers\Backoffice\Tenant;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\Backoffice\Tenant\CreateTenantRequest;
use App\Http\Requests\Backoffice\Tenant\UpdateTenantRequest;
use App\Services\TenantService;
use Exception;

class TenantController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\TenantService  $tenantService
     * @return void
     */
    public function __construct(protected TenantService $tenantService)
    {
        parent::__construct($this->tenantService->repository());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\CreateTenantRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateTenantRequest $request)
    {
        try {
            $result = $this->tenantService->saveTenant($request);
            return ResponseHelper::success(trans('messages.successfully_created'), $result, 201);
        } catch (Exception $e) {
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\UpdateTenantRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateTenantRequest $request, int $id)
    {
        try {
            $result = $this->tenantService->patchTenant($id, $request);
            return ResponseHelper::success(trans('messages.successfully_updated'), $result, 200);
        } catch (Exception $e) {
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }
}
