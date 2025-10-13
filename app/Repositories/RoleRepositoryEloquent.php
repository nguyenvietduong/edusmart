<?php

namespace App\Repositories;

use App\Models\Role;
use App\Interfaces\Repositories\RoleRepositoryInterface;
use Illuminate\Support\Facades\Log;
use Prettus\Repository\Eloquent\BaseRepository;

class RoleRepositoryEloquent extends BaseRepository implements RoleRepositoryInterface
{
    public function model()
    {
        return Role::class;
    }

    public function getAll()
    {
        try {
            
            return $this->model->get();
        } catch (\Exception $e) {
            Log::error('Error: ' . $e->getMessage());
            throw $e;
        }
    }
}
