<?php

namespace App\Repositories;

use App\Models\Student;
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
        return Student::class;
    }

    /**
     * Apply criteria in the current Query Repository.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllStudent(array $filters = [], int $perPage = 5)
    {
        $query = $this->model->query()
            ->with(['class']); // lấy kèm lớp

        // Search by multiple fields
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $search = '%' . $filters['search'] . '%';
                $q->where('student_code', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('address', 'like', $search)
                    ->orWhere('father_name', 'like', $search)
                    ->orWhere('mother_name', 'like', $search);
            });
        }

        // Filter by date range
        if (!empty($filters['start_date'])) {
            $query->whereDate('created_at', '>=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $query->whereDate('created_at', '<=', $filters['end_date']);
        }

        // Filter by status
        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        // Order by newest
        $query->orderByDesc('id');

        return $query->paginate($perPage);
    }

    // /**
    //  * Get student details by user ID.
    //  *
    //  * @param int $id
    //  * @return \App\Models\User|null
    //  */
    // public function getStudentDetail(int $id)
    // {
    //     return $this->find($id);
    // }

    // /**
    //  * Update an student by user ID.
    //  *
    //  * @param int $id
    //  * @param array $params
    //  * @return bool
    //  */
    // public function updateStudent(int $id, array $params)
    // {
    //     return $this->update($params, $id);
    // }

    // /**
    //  * Create a new student.
    //  *
    //  * @param array $params
    //  * @return \App\Models\User
    //  */
    // public function createStudent(array $params)
    // {
    //     return $this->create($params);
    // }

    // /**
    //  * Delete an student by user ID.
    //  *
    //  * @param int $id
    //  * @return bool|null
    //  * @throws \Exception
    //  */
    // public function deleteStudent(int $id)
    // {
    //     return $this->delete($id);
    // }
}
