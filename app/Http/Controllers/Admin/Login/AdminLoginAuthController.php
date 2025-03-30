<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Login\AdminLoginAuthRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginAuthController extends Controller
{
    public function __invoke(AdminLoginAuthRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            return redirect()->route('admin.dashboard');
        }

        return response()->json([
            'success' => false,
            'data' => $request->validated()
        ], 401);
    }
}
