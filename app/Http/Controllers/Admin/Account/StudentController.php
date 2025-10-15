<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Base path for the view files
    const PATH_VIEW = 'admin.account.student.';

    protected StudentService $studentService;

    /**
     * Constructor to inject the StudentLogService dependency.
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a list of students with optional filters.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $students = $this->studentService->getAllStudent([
            'start_date' => $request->input('start_time'),
            'end_date'   => $request->input('end_time'),
            'search'     => $request->input('search'),
        ], 10);

        return view(self::PATH_VIEW . __FUNCTION__, compact('students'));
    }
}
