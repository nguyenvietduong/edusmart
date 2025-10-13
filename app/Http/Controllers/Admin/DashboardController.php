<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    const PATH_VIEW = 'admin.dashboard.';

    public function index()
    {
        
        return view(self::PATH_VIEW . __FUNCTION__);
    }
}
