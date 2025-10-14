<?php

namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\Repositories\StudentRepositoryInterface;

class StudentRepositoryEloquent extends BaseRepository implements StudentRepositoryInterface
{
    /**
     * Specify the model class name.
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Apply criteria in the current Query Repository.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get a paginated list of students with optional search functionality.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllStudent(array $filters = [], $perPage = 5, $role = [])
    {
        $query = $this->model->query();
        if (is_array($role)) {
            $query->whereIn('role_id', $role);
        } else {
            $query->where('role_id', $role);
        }

        // Apply search filters
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('full_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('email', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('phone', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('address', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (!empty($filters['start_date'])) {
            $query->where(function ($query) use ($filters) {
                $query->whereDate('created_at', '>=', $filters['start_date'])
                    ->orWhereDate('birthday', '>=', $filters['start_date']);
            });
        }

        if (!empty($filters['end_date'])) {
            $query->where(function ($query) use ($filters) {
                $query->whereDate('created_at', '<=', $filters['end_date'])
                    ->orWhereDate('birthday', '<=', $filters['end_date']);
            });
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        // Order by created date (newest first)
        $query->orderBy('id', 'desc');

        // Paginate results
        return $query->paginate($perPage);
    }

    /**
     * Get student details by user ID.
     *
     * @param int $id
     * @return \App\Models\User|null
     */
    public function getStudentDetail(int $id)
    {
        return $this->find($id);
    }

    /**
     * Update an student by user ID.
     *
     * @param int $id
     * @param array $params
     * @return bool
     */
    public function updateStudent(int $id, array $params)
    {
        return $this->update($params, $id);
    }

    /**
     * Create a new student.
     *
     * @param array $params
     * @return \App\Models\User
     */
    public function createStudent(array $params)
    {
        return $this->create($params);
    }

    /**
     * Delete an student by user ID.
     *
     * @param int $id
     * @return bool|null
     * @throws \Exception
     */
    public function deleteStudent(int $id)
    {
        return $this->delete($id);
    }
}