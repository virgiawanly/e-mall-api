<?php

namespace App\Http\Controllers\Backoffice\Mall;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\BaseResourceController;
use App\Http\Requests\Backoffice\Mall\CreateMallRequest;
use App\Http\Requests\Backoffice\Mall\UpdateMallRequest;
use App\Repositories\MallRepository;
use Exception;

class MallController extends BaseResourceController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected MallRepository $repository)
    {
        parent::__construct($repository);
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
}
