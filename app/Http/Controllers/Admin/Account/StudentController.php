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
     * Display a list of studentLogs with optional filters.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // $studentLogs = $this->studentLogService->getAll([
        //     'start_time' => request('start_time'),
        //     'end_time' => request('end_time'),
        //     'search' => request('search'),  // Filter by search term
        // ], 5); // Paginate 15 items per page

        return view(self::PATH_VIEW . __FUNCTION__);
    }
}