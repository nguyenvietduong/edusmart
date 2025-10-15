<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface SchoolRepositoryInterface extends RepositoryInterface
{
    public function getData();
}