<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ActivityRepositoryInterface extends RepositoryInterface
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
