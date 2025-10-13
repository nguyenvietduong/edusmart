<?php

namespace App\Interfaces\Services;

interface ActivityServiceInterface
{
    public function log(string $action, ?string $description = null): void;
}