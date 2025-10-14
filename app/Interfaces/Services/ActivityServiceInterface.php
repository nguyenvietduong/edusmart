<?php

namespace App\Interfaces\Services;

interface ActivityServiceInterface
{
    public function getAll(array $filters, int $perPage);
    
    public function log(
        int $user_id,
        string $action,
        string $module,
        $old_data = null,
        $new_data = null,
        ?string $description = null
    ): bool;
}