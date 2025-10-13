<?php

namespace App\Services;

use App\Repositories\ActivityRepositoryEloquent;
use App\Interfaces\Services\ActivityServiceInterface;

class ActivityService implements ActivityServiceInterface
{
    protected ActivityRepositoryEloquent $activityRepositoryEloquent;

    public function __construct(ActivityRepositoryEloquent $activityRepositoryEloquent)
    {
        $this->activityRepositoryEloquent = $activityRepositoryEloquent;
    }

    public function log(string $action, ?string $description = null): void
    {
        $this->activityRepositoryEloquent->log($action, $description);
    }
}