<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Services\TeacherService;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Base path for the view files
    const PATH_VIEW = 'admin.account.teacher.';

    protected TeacherService $teacherService;

    /**
     * Constructor to inject the TeacherLogService dependency.
     */
    public function __construct(TeacherService $teacherService)
    {
        $this->teacherService = $teacherService;
    }

    /**
     * Display a list of teachers with optional filters.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'start_date', 'end_date', 'is_active']);
        $teachers = $this->teacherService->getAllTeacher($filters, 10);

        return view(self::PATH_VIEW . __FUNCTION__, compact('teachers'));
    }
}
