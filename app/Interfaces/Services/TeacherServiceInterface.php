<?php

namespace App\Interfaces\Services;

interface TeacherServiceInterface
{
    /**
     * Get a paginated list of teachers with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return mixed
     */
    public function getAllTeacher(array $filters, int $perPage);

    // /**
    //  * Get teacher details by ID.
    //  *
    //  * @param int $id
    //  * @return mixed
    //  */
    // public function getTeacherDetail(int $id);

    // /**
    //  * Create a new teacher.
    //  *
    //  * @param array $data
    //  * @return mixed
    //  */
    // public function createTeacher(array $data);

    // /**
    //  * Update an teacher by ID.
    //  *
    //  * @param int $id
    //  * @param array $data
    //  * @return mixed
    //  */
    // public function updateTeacher(int $id, array $data);

    // /**
    //  * Delete an teacher by ID.
    //  *
    //  * @param int $id
    //  * @return bool
    //  */
    // public function deleteTeacher(int $id);
}