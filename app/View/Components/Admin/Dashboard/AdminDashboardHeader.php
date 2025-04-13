<?php

namespace App\View\Components\Admin\Dashboard;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AdminDashboardHeader extends Component
{
    public User $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    public function render(): View|Closure|string
    {
        return view('components.admin.dashboard.admin-dashboard-header');
    }
}
