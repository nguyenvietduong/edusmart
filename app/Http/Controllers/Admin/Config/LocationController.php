<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;
use App\Services\LocationService;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    const PATH_VIEW = 'admin.config.location.';

    protected LocationService $locationService;

    public function __construct(LocationService $locationService)
    {
        $this->locationService = $locationService;
    }

    public function index(Request $request)
    {
        $locations = $this->locationService->getAll([
            'type' => request('type'),
            'search' => request('search'),
        ], 15);

        return view(self::PATH_VIEW . __FUNCTION__, compact('locations'));
    }

    public function runImportManually()
    {
        try {
            dispatch(function () {
                Artisan::call('import:vietnam-locations');
            });

            return response()->json(['message' => 'Import đang được thực thi ngầm.']);
        } catch (\Throwable $e) {
            Log::error('Lỗi khi chạy command import location', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Không thể thực thi import: ' . $e->getMessage()], 500);
        }
    }
}
