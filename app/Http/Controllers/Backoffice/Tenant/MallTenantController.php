<?php

namespace App\Http\Controllers\Backoffice\Tenant;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\Backoffice\Tenant\CreateMallTenantRequest;
use App\Http\Requests\Backoffice\Tenant\UpdateMallTenantRequest;
use App\Services\MallTenantService;
use Exception;
use Illuminate\Support\Facades\DB;

class MallTenantController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\MallTenantService  $mallTenantService
     * @return void
     */
    public function __construct(protected MallTenantService $mallTenantService)
    {
        parent::__construct($this->mallTenantService->repository());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\CreateMallTenantRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateMallTenantRequest $request)
    {
        try {
            DB::beginTransaction();

            $result = $this->mallTenantService->saveMallTenant($request);

            DB::commit();
            return ResponseHelper::success(trans('messages.successfully_created'), $result, 201);
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Tenant\UpdateMallTenantRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMallTenantRequest $request, int $id)
    {
        try {
            DB::beginTransaction();

            $result = $this->mallTenantService->patchMallTenant($id, $request);

            DB::commit();
            return ResponseHelper::success(trans('messages.successfully_updated'), $result, 200);
        } catch (Exception $e) {
            DB::rollBack();
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }
}
