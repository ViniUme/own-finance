<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\AdminLoginAuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginAuthController extends BaseController
{
    public function __invoke(AdminLoginAuthRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->remember_me)) {
            $request->session()->regenerate();

            return $this->sendSuccessResponse($request, 'Login feito com sucesso!');
        }

        return $this->sendFailureResponse($request, 'Login não autorizado!', ['email' => 'E-mail não autorizado!'], 401);
    }
}
