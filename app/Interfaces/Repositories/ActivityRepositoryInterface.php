<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface ActivityRepositoryInterface extends RepositoryInterface
{
    public function log(string $action, ?string $description = null): bool;
}