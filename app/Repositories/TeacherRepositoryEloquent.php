<?php

namespace App\Repositories;

use App\Models\Teacher;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Interfaces\Repositories\TeacherRepositoryInterface;

class TeacherRepositoryEloquent extends BaseRepository implements TeacherRepositoryInterface
{
    /**
     * Specify the model class name.
     *
     * @return string
     */
    public function model()
    {
        return Teacher::class;
    }

    /**
     * Apply criteria in the current Query Repository.
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function getAllTeacher(array $filters = [], int $perPage = 10)
    {
        $query = $this->model->query()
            ->with(['subjects', 'classes']); // lấy kèm môn & lớp

        // 🔍 Tìm kiếm theo nhiều trường
        if (!empty($filters['search'])) {
            $search = '%' . $filters['search'] . '%';
            $query->where(function ($q) use ($search) {
                $q->where('teacher_code', 'like', $search)
                    ->orWhere('phone', 'like', $search)
                    ->orWhere('email', 'like', $search)
                    ->orWhere('address', 'like', $search)
                    ->orWhere('specialization', 'like', $search)
                    ->orWhere('qualification', 'like', $search)
                    ->orWhere('position', 'like', $search);
            });
        }

        // 📅 Lọc theo ngày vào làm
        if (!empty($filters['start_date'])) {
            $query->whereDate('hire_date', '>=', $filters['start_date']);
        }
        if (!empty($filters['end_date'])) {
            $query->whereDate('hire_date', '<=', $filters['end_date']);
        }

        // ⚙️ Lọc theo trạng thái công tác (1 = đang làm, 0 = nghỉ)
        if (isset($filters['is_active']) && $filters['is_active'] !== '') {
            $query->where('is_active', (bool) $filters['is_active']);
        }

        // 🎓 Lọc theo chuyên môn (VD: Toán, Văn, Tin,...)
        if (!empty($filters['specialization'])) {
            $query->where('specialization', 'like', '%' . $filters['specialization'] . '%');
        }

        // 🏫 Lọc theo chức vụ (VD: Tổ trưởng, Chủ nhiệm,...)
        if (!empty($filters['position'])) {
            $query->where('position', 'like', '%' . $filters['position'] . '%');
        }

        // 👩‍🏫 Lọc giáo viên là trưởng bộ môn
        if (!empty($filters['is_head_subject'])) {
            $query->whereHas('subjects', function ($q) {
                $q->whereColumn('subjects.teacher_id', 'teachers.id');
            });
        }

        // 🧑‍🏫 Lọc giáo viên là chủ nhiệm lớp
        if (!empty($filters['is_homeroom_teacher'])) {
            $query->whereHas('classes', function ($q) {
                $q->whereColumn('classes.homeroom_teacher_id', 'teachers.id');
            });
        }

        // 🔽 Sắp xếp mới nhất
        $query->orderByDesc('id');

        return $query->paginate($perPage);
    }

    // /**
    //  * Get teacher details by user ID.
    //  *
    //  * @param int $id
    //  * @return \App\Models\User|null
    //  */
    // public function getTeacherDetail(int $id)
    // {
    //     return $this->find($id);
    // }

    // /**
    //  * Update an teacher by user ID.
    //  *
    //  * @param int $id
    //  * @param array $params
    //  * @return bool
    //  */
    // public function updateTeacher(int $id, array $params)
    // {
    //     return $this->update($params, $id);
    // }

    // /**
    //  * Create a new teacher.
    //  *
    //  * @param array $params
    //  * @return \App\Models\User
    //  */
    // public function createTeacher(array $params)
    // {
    //     return $this->create($params);
    // }

    // /**
    //  * Delete an teacher by user ID.
    //  *
    //  * @param int $id
    //  * @return bool|null
    //  * @throws \Exception
    //  */
    // public function deleteTeacher(int $id)
    // {
    //     return $this->delete($id);
    // }
}
