<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use App\Jobs\ImportVietnamLocationsJob;
use App\Services\LocationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    // Base path for the view files
    const PATH_VIEW = 'admin.config.location.';

    protected LocationService $locationService;

    /**
     * Constructor to inject the LocationService dependency.
     */
    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * Display a list of locations with optional filters.
     *
     * @param Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $locations = $this->locationService->getAll([
            'type' => request('type'),      // Filter by location type
            'search' => request('search'),  // Filter by search term
        ], 10); // Paginate 15 items per page

        return view(self::PATH_VIEW . __FUNCTION__, compact('locations'));
    }

    /**
     * Trigger the manual import of Vietnam locations asynchronously.
     * This dispatches a job to the queue with the currently authenticated user ID.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function runImportManually()
    {
        // Get the ID of the currently authenticated user
        $userId = Auth::id();

        // Dispatch the import job to the queue
        dispatch(new ImportVietnamLocationsJob($userId));

        // Return a JSON response indicating the import has started
        return response()->json(['message' => 'Import is being processed in the background.']);
    }
}