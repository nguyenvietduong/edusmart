<?php

namespace App\Services;

use App\Repositories\SchoolRepositoryEloquent;
use App\Interfaces\Services\SchoolServiceInterface;

class SchoolService implements SchoolServiceInterface
{
    protected SchoolRepositoryEloquent $schoolRepositoryEloquent;

    public function __construct(SchoolRepositoryEloquent $schoolRepositoryEloquent)
    {
        $this->schoolRepositoryEloquent = $schoolRepositoryEloquent;
    }

    public function getData()
    {

        return $this->schoolRepositoryEloquent->getData();
    }
}