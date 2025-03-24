<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginViewController extends Controller
{
    public function __invoke()
    {
        return view('admin.login');
    }
}
