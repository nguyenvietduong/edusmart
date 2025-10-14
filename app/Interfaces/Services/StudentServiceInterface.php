<?php

namespace App\Interfaces\Services;

interface StudentServiceInterface
{
    /**
     * Get a paginated list of students with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return mixed
     */
    public function getAllStudent(array $filters = [], int $perPage = 15, $role = 'user');

    /**
     * Get student details by ID.
     *
     * @param int $id
     * @return mixed
     */
    public function getStudentDetail(int $id);

    /**
     * Create a new student.
     *
     * @param array $data
     * @return mixed
     */
    public function createStudent(array $data);

    /**
     * Update an student by ID.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     */
    public function updateStudent(int $id, array $data);

    /**
     * Delete an student by ID.
     *
     * @param int $id
     * @return bool
     */
    public function deleteStudent(int $id);
}