<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface LocationRepositoryInterface extends RepositoryInterface
{
    public function getAll(array $filters, int $perPage);
    
    public function truncateAll();

    public function create(array $data);

    public function findByOsmId($osmId);
}