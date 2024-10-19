<?php

namespace App\Http\Controllers\Backoffice\Mall;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\Backoffice\Mall\CreateMallRequest;
use App\Http\Requests\Backoffice\Mall\UpdateMallRequest;
use App\Services\MallService;
use Exception;
use Illuminate\Http\Request;

class MallController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\MallService  $mallService
     * @return void
     */
    public function __construct(protected MallService $mallService)
    {
        parent::__construct($this->mallService->repository());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Mall\CreateMallRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateMallRequest $request)
    {
        try {
            $result = $this->service->save($request->validated());
            return ResponseHelper::success(trans('messages.successfully_created'), $result, 201);
        } catch (Exception $e) {
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Backoffice\Mall\UpdateMallRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateMallRequest $request, int $id)
    {
        try {
            $result = $this->service->patch($id, $request->validated());
            return ResponseHelper::success(trans('messages.successfully_updated'), $result, 200);
        } catch (Exception $e) {
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }

    /**
     * List all tenants in a mall.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $mallId
     * @return \Illuminate\Http\JsonResponse
     */
    public function listTenants(Request $request, int $mallId)
    {
        try {
            return ResponseHelper::data($this->mallService->listMallTenants($mallId, $request->all()));
        } catch (Exception $e) {
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }
}
