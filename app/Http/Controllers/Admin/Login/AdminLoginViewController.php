<?php

namespace App\Http\Controllers\Admin\Login;

use App\Http\Controllers\BaseController;
use Illuminate\View\View;

class AdminLoginViewController extends BaseController
{
    public function __invoke(): View
    {
        return $this->sendViewResponse('admin.login');
    }
}
