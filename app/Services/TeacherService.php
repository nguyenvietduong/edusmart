<?php

namespace App\Services;

use App\Interfaces\Repositories\TeacherRepositoryInterface;
use App\Interfaces\Services\TeacherServiceInterface;
use App\Interfaces\Services\ImageServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Exception;

class TeacherService extends BaseService implements TeacherServiceInterface
{
    protected $teacherRepository; // Repository for teacher-related database operations
    protected $imageService; // Service for handling image storage and management

    /**
     * Create a new instance of TeacherService.
     *
     * @param TeacherRepositoryInterface $teacherRepository
     * @param ImageServiceInterface $imageService
     */
    public function __construct(
        TeacherRepositoryInterface $teacherRepository,
        ImageServiceInterface $imageService
    ) {
        $this->teacherRepository = $teacherRepository;
        $this->imageService = $imageService;
    }

    /**
     * Get a paginated list of teachers with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return mixed
     * @throws Exception
     */
    public function getAllTeacher(array $filters, int $perPage)
    {
        try {
            // Retrieve teachers from the repository using filters and pagination
            return $this->teacherRepository->getAllTeacher($filters, $perPage);
        } catch (Exception $e) {
            // Handle any exceptions that occur while retrieving teachers
            throw new Exception('Unable to retrieve teacher list: ' . $e->getMessage());
        }
    }

    // /**
    //  * Get teacher details by ID.
    //  *
    //  * @param int $id
    //  * @return mixed
    //  * @throws ModelNotFoundException
    //  */
    // public function getTeacherDetail(int $id)
    // {
    //     try {
    //         // Retrieve teacher details from the repository by ID
    //         return $this->teacherRepository->getTeacherDetail($id);
    //     } catch (ModelNotFoundException $e) {
    //         // Handle case where the teacher is not found
    //         throw new ModelNotFoundException('Teacher not found with ID: ' . $id);
    //     } catch (Exception $e) {
    //         // Handle any other exceptions that occur while retrieving teacher details
    //         throw new Exception('Unable to retrieve teacher details: ' . $e->getMessage());
    //     }
    // }

    // /**
    //  * Create a new teacher.
    //  *
    //  * @param array $data
    //  * @return mixed
    //  * @throws Exception
    //  */
    // public function createTeacher(array $data)
    // {
    //     try {
    //         // Hash the password before storing it
    //         $data['password'] = Hash::make($data['password']);
    //         $image = null;

    //         // Handle image upload from the request if present
    //         if (isset($data['image'])) {
    //             $data['image'] = $this->imageService->storeImage('teacher_files', $data['image']);
    //         } elseif (session('image_temp')) {
    //             // Handle temporary image if session data exists
    //             $tempImageName = session('image_temp');
    //             $tempImagePath = $tempImageName;

    //             // Check if the temporary image exists in storage
    //             if (Storage::exists($tempImagePath)) {
    //                 $fullTempImagePath = Storage::path($tempImagePath);
    //                 $image = new UploadedFile(
    //                     $fullTempImagePath,
    //                     $tempImageName,
    //                     null,
    //                     null,
    //                     true
    //                 );

    //                 // Store the image in S3 and delete the temporary image
    //                 $data['image'] = $this->imageService->storeImage('teacher_files', $image);
    //                 $this->imageService->deleteImage($tempImagePath);
    //             } else {
    //                 dd('Temp file does not exist in local storage.'); // Debugging statement for missing temp file
    //             }
    //         }

    //         // Create a new teacher using the repository
    //         $teacher = $this->teacherRepository->createTeacher($data); // Store the created teacher in $teacher

    //     } catch (Exception $e) {
    //         // If an error occurs, delete the newly created teacher if it exists
    //         if (isset($teacher)) {
    //             $teacher->delete(); // Delete the teacher
    //         }

    //         // Handle image storage exceptions
    //         $this->imageService->handleImageException($e, $data);
    //         throw new Exception('Unable to create teacher: ' . $e->getMessage());
    //     }
    // }

    // /**
    //  * Update an teacher by ID.
    //  *
    //  * @param int $id
    //  * @param array $data
    //  * @return mixed
    //  * @throws ModelNotFoundException
    //  */
    // public function updateTeacher(int $id, array $data)
    // {
    //     // Store old data to restore in case of an error
    //     $oldTeacher = $this->teacherRepository->getTeacherDetail($id);
    //     $oldImagePath = $oldTeacher->image; // Store the old image path
    //     $image = null;

    //     // Start transaction to ensure all changes are atomic
    //     DB::beginTransaction();

    //     try {
    //         // Handle image upload if present
    //         if (isset($data['image'])) {
    //             // Update image in S3
    //             $data['image'] = $this->imageService->updateImage('teacher_files', $data['image'], $oldImagePath);
    //         } elseif (session('image_temp')) {
    //             // Handle temporary image if present in session
    //             $tempImageName = session('image_temp');
    //             $tempImagePath = $tempImageName;

    //             // Check if the temporary image exists in storage
    //             if (Storage::exists($tempImagePath)) {
    //                 $fullTempImagePath = Storage::path($tempImagePath);
    //                 $image = new UploadedFile(
    //                     $fullTempImagePath,
    //                     $tempImageName,
    //                     null,
    //                     null,
    //                     true
    //                 );

    //                 // Update image in S3 and delete temporary image
    //                 $data['image'] = $this->imageService->updateImage('teacher_files', $image, $oldImagePath);
    //                 $this->imageService->deleteImage($tempImagePath); // Delete temporary image
    //             } else {
    //                 dd('Temp file does not exist in local storage.'); // Error message if temporary image does not exist
    //             }
    //         }

    //         // Update teacher with new data
    //         $this->teacherRepository->updateTeacher($id, $data);

    //         // Commit transaction after successful update
    //         DB::commit();

    //     } catch (Exception $e) {
    //         // Rollback transaction in case of failure
    //         DB::rollBack();

    //         // Restore old data in case of an error
    //         $this->teacherRepository->updateTeacher($id, $oldTeacher->toArray());

    //         // Handle image restoration if it was changed
    //         if (isset($data['image']) && $data['image'] !== $oldImagePath) {
    //             $this->imageService->updateImageS3('teacher_files', $oldImagePath, $data['image']);
    //         }

    //         // Handle exceptions when an error occurs
    //         $this->imageService->handleImageException($e, $data);
    //         throw new Exception('Unable to update teacher: ' . $e->getMessage());
    //     }
    // }

    // /**
    //  * Delete an teacher by ID.
    //  *
    //  * @param int $id
    //  * @return bool
    //  * @throws ModelNotFoundException
    //  */
    // public function deleteTeacher(int $id)
    // {
    //     try {
    //         // Attempt to delete the teacher using the repository
    //         return $this->teacherRepository->deleteTeacher($id);
    //     } catch (ModelNotFoundException $e) {
    //         // Handle case where the teacher is not found
    //         throw new ModelNotFoundException('Teacher not found with ID: ' . $id);
    //     } catch (Exception $e) {
    //         // Handle any other exceptions that occur during deletion
    //         throw new Exception('Unable to delete teacher: ' . $e->getMessage());
    //     }
    // }
}
