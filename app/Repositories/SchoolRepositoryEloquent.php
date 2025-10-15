<?php

namespace App\Repositories;

use App\Models\School;
use App\Interfaces\Repositories\SchoolRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Eloquent\BaseRepository;

class SchoolRepositoryEloquent extends BaseRepository implements SchoolRepositoryInterface
{
    public function model()
    {
        return School::class;
    }

    public function getData()
    {
        try {
            
            return $this->model->first();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
