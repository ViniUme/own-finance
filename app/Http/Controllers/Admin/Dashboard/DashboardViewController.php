<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;

class DashboardViewController extends BaseController
{
    public function __invoke()
    {
        return $this->sendViewResponse('admin.dashboard.index');
    }
}
