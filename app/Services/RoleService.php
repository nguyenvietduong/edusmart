<?php

namespace App\Services;

use App\Repositories\RoleRepositoryEloquent;
use App\Interfaces\Services\RoleServiceInterface;

class RoleService implements RoleServiceInterface
{
    protected RoleRepositoryEloquent $roleRepositoryEloquent;

    public function __construct(RoleRepositoryEloquent $roleRepositoryEloquent)
    {
        $this->roleRepositoryEloquent = $roleRepositoryEloquent;
    }

    public function getAll()
    {

        return $this->roleRepositoryEloquent->getAll();
    }
}
