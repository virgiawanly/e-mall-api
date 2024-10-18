<?php

namespace App\Http\Controllers\Backoffice\Auth;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backoffice\Auth\LoginRequest;
use App\Services\BackofficeAuthService;
use Exception;
use Illuminate\Validation\UnauthorizedException;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  \App\Services\BackofficeAuthService  $backofficeAuthService
     * @return void
     */
    public function __construct(protected BackofficeAuthService $backofficeAuthService) {}

    /**
     * Login web app by issuing token.
     *
     * @param  \App\Http\Requests\Backoffice\Auth\LoginRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        try {
            $result = $this->backofficeAuthService->login($request->validated());
            return ResponseHelper::data($result);
        } catch (UnauthorizedException $e) {
            return ResponseHelper::unauthorized($e->getMessage(), $e);
        } catch (Exception $e) {
            return ResponseHelper::internalServerError($e->getMessage(), $e);
        }
    }
}
