<?php

namespace App\Interfaces\Services;

interface LocationServiceInterface
{
    public function getAll(array $filters, int $perPage);
    
    /**
     * Import Korea locations from Overpass API.
     * @param callable|null $logger Optional logger callback for messages.
     * @return void
     */
    public function import(callable $logger = null, ?int $userId = null): void;
}