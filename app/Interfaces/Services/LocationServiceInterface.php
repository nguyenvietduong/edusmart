<?php

namespace App\Interfaces\Services;

interface LocationServiceInterface
{
    /**
     * Import Korea locations from Overpass API.
     * @param callable|null $logger Optional logger callback for messages.
     * @return void
     */
    public function import(callable $logger = null): void;
}