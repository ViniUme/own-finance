<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\BaseController;
use App\Http\Requests\Admin\Login\AdminLoginAuthRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AdminLoginAuthController extends BaseController
{
    public function __invoke(AdminLoginAuthRequest $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'), $request->remember_me)) {
            $request->session()->regenerate();

            return $this->sendSuccessResponse($request, 'Login feito com sucesso!');
        }

        return $this->sendFailureResponse($request, 'Login não autorizado!', ['email' => 'E-mail não autorizado!'], 401);
    }
}
