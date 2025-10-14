<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait LogsActivity
{
    public static function bootLogsActivity()
    {
        static::created(function ($model) {
            $userId = Auth::id() ?? $model->user_id ?? 1; // fallback 1
            activityLog()->log($userId, 'create', class_basename($model), null, $model->toArray());
        });

        static::updated(function ($model) {
            $userId = Auth::id() ?? $model->user_id ?? 1; // fallback 1
            activityLog()->log($userId, 'update', class_basename($model), $model->getOriginal(), $model->getChanges());
        });

        static::deleted(function ($model) {
            $userId = Auth::id() ?? $model->user_id ?? 1; // fallback 1
            activityLog()->log($userId, 'delete', class_basename($model), $model->toArray(), null);
        });
    }
}