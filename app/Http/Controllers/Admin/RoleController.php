<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\RoleService;

class RoleController extends Controller
{
    const PATH_VIEW = 'admin.role.';

    protected RoleService $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }

    public function index()
    {
        $datas  = $this->roleService->getAll();

        return view(self::PATH_VIEW . __FUNCTION__, compact('datas'));
    }
}
