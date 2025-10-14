<?php

namespace App\Services;

use App\Repositories\ActivityRepositoryEloquent;
use App\Interfaces\Services\ActivityServiceInterface;
use Illuminate\Support\Facades\Auth;

class ActivityService implements ActivityServiceInterface
{
    protected ActivityRepositoryEloquent $activityRepositoryEloquent;

    public function __construct(ActivityRepositoryEloquent $activityRepositoryEloquent)
    {
        $this->activityRepositoryEloquent = $activityRepositoryEloquent;
    }

    public function getAll(array $filters, int $perPage)
    {
        return $this->activityRepositoryEloquent->getAll($filters, $perPage);
    }

    public function log(
        int $user_id,
        string $action,
        string $module,
        $old_data = null,
        $new_data = null,
        ?string $description = null
    ): bool {
        if (!$user_id && Auth::check()) {
            $user_id = Auth::id();
        }

        $user_id = 5;

        return $this->activityRepositoryEloquent->log($user_id, $action, $module, $old_data, $new_data, $description);
    }
}
