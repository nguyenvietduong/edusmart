<?php

namespace App\Http\Controllers\Admin\Account;

use App\Http\Controllers\Controller;
use App\Services\ActivityService;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    // Base path for the view files
    const PATH_VIEW = 'admin.account.activityLog.';

    protected ActivityService $activityLogService;

    /**
     * Constructor to inject the ActivityLogService dependency.
     */
    public function __construct(ActivityService $activityLogService)
    {
        $this->activityLogService = $activityLogService;
    }

    /**
     * Display a list of activityLogs with optional filters.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $activityLogs = $this->activityLogService->getAll([
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'search' => request('search'),  // Filter by search term
        ], 10); // Paginate 15 items per page

        return view(self::PATH_VIEW . __FUNCTION__, compact('activityLogs'));
    }
}