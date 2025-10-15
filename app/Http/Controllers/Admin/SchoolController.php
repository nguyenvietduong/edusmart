<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\SchoolService;

class SchoolController extends Controller
{
    const PATH_VIEW = 'admin.school.';

    protected SchoolService $schoolService;

    public function __construct(SchoolService $schoolService)
    {
        $this->schoolService = $schoolService;
    }

    public function index()
    {
        $school = $this->schoolService->getData();

        return view(self::PATH_VIEW . __FUNCTION__, compact('school'));
    }
}