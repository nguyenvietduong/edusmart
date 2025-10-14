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

    public function getAll($filters = [], $perPage = 20)
    {
        $query = $this->model->query();

        if (!empty($filters['start_time']) && !empty($filters['end_time'])) {
            $query->whereBetween('created_at', [
                str_replace('T', ' ', $filters['start_time']) . ':00',
                str_replace('T', ' ', $filters['end_time']) . ':00'
            ]);
        } else {
            if (!empty($filters['start_time'])) {
                $query->where('created_at', '>=', str_replace('T', ' ', $filters['start_time']) . ':00');
            }
            if (!empty($filters['end_time'])) {
                $query->where('created_at', '<=', str_replace('T', ' ', $filters['end_time']) . ':00');
            }
        }

        // Lọc theo từ khóa tìm kiếm
        if (!empty($filters['search'])) {
            $query->where('action', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%')
                ->orWhere('ip_address', 'like', '%' . $filters['search'] . '%');
        }

        return $query
            ->orderBy('id', 'asc')
            ->paginate($perPage);
    }

    /**
     * Ghi log hoạt động
     *
     * @param string $action
     * @param string|null $description
     * @return bool
     */
    public function log(
        int $user_id,
        string $action,
        string $module,
        $old_data = null,
        $new_data = null,
        ?string $description = null
    ): bool {
        try {
            $this->create([
                'user_id' => $user_id,
                'action' => $action,
                'module' => $module,
                'old_data' => $old_data ? json_encode($old_data) : null,
                'new_data' => $new_data ? json_encode($new_data) : null,
                'description' => $description,
                'ip_address' => request()->ip(),
            ]);

            return true;
        } catch (\Exception $e) {
            Log::error('Activity log error: ' . $e->getMessage(), ['trace' => $e->getTraceAsString()]);
            return false;
        }
    }
}
