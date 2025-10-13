<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface RoleRepositoryInterface extends RepositoryInterface
{
    public function getAll();
}