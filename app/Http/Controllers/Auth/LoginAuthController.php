<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAuthRequest;
use Illuminate\Support\Facades\Auth;

class LoginAuthController extends Controller
{
    public function __invoke(LoginAuthRequest $request)
    {
        $loginData = $request->only('email', 'password');
        $loginIsAccept = Auth::attempt($loginData);

        if ($loginIsAccept) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Success login',
                'access_token' => $token,
                'token_type' => 'Bearer'
            ]);
        }

        return response('', 401);
    }
}
