<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface StudentRepositoryInterface extends RepositoryInterface
{

    /**
     * Get a paginated list of students with optional search functionality.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getAllStudent(array $filters = [], $perPage = 5, $role = 'user');

    /**
     * Get student details by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getStudentDetail(int $id);

    /**
     * Update an student by ID with new data.
     *
     * @param int $id
     * @param array $params
     * @return mixed
     */
    public function updateStudent(int $id, array $params);

    /**
     * Create a new student with the provided data.
     *
     * @param array $params
     * @return mixed
     */
    public function createStudent(array $params);

    /**
     * Delete an student by ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteStudent(int $id);
}