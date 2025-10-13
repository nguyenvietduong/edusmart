<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use App\Interfaces\Repositories\ActivityRepositoryInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ActivityRepositoryEloquent extends BaseRepository implements ActivityRepositoryInterface
{
    public function model()
    {
        return ActivityLog::class;
    }

    /**
     * Ghi log hoạt động
     *
     * @param string $action
     * @param string|null $description
     * @return bool
     */
    public function log(string $action, ?string $description = null): bool
    {
        try {
            $this->create([
                'user_id' => Auth::id(),
                'action' => $action,
                'description' => $description,
                'ip_address' => request()->ip(),
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Activity log error: ' . $e->getMessage());
            return false;
        }
    }
}