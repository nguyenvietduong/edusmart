<?php

namespace App\Interfaces\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

interface TeacherRepositoryInterface extends RepositoryInterface
{

    /**
     * Get all teachers with filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return \Illuminate\Pagination\LengthAwarePaginator
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
    //  * Update an teacher by ID with new data.
    //  *
    //  * @param int $id
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function updateTeacher(int $id, array $params);

    // /**
    //  * Create a new teacher with the provided data.
    //  *
    //  * @param array $params
    //  * @return mixed
    //  */
    // public function createTeacher(array $params);

    // /**
    //  * Delete an teacher by ID.
    //  *
    //  * @param int $id
    //  * @return bool
    //  */
    // public function deleteTeacher(int $id);
}