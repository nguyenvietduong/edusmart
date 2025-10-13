<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\LocationService;

class LocationController extends Controller
{
    const PATH_VIEW = 'admin.config.location.';

    protected LocationService $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    public function runImportManually()
    {
        try {
            $this->locationService->import();

            return response()->json(['message' => 'Import dữ liệu thành công!']);
        } catch (\Exception $e) {
            
            return response()->json(['message' => 'Import thất bại: ' . $e->getMessage()], 500);
        }
    }
}
