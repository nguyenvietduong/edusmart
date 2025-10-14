<?php

namespace App\Services;

use App\Interfaces\Repositories\StudentRepositoryInterface;
use App\Interfaces\Services\StudentServiceInterface;
use App\Interfaces\Services\ImageServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Exception;

class StudentService extends BaseService implements StudentServiceInterface
{
    protected $studentRepository; // Repository for student-related database operations
    protected $imageService; // Service for handling image storage and management

    /**
     * Create a new instance of StudentService.
     *
     * @param StudentRepositoryInterface $studentRepository
     * @param ImageServiceInterface $imageService
     */
    public function __construct(
        StudentServiceInterface $studentRepository,
        ImageServiceInterface $imageService
    ) {
        $this->studentRepository = $studentRepository; // Initialize the student repository
        $this->imageService = $imageService; // Initialize the image service
    }

    /**
     * Get a paginated list of students with optional filters.
     *
     * @param array $filters
     * @param int $perPage
     * @return mixed
     * @throws Exception
     */
    public function getAllStudent(array $filters = [], int $perPage = 5, $role = [])
    {
        try {
            // Retrieve students from the repository using filters and pagination
            return $this->studentRepository->getAllStudent($filters, $perPage, $role);
        } catch (Exception $e) {
            // Handle any exceptions that occur while retrieving students
            throw new Exception('Unable to retrieve student list: ' . $e->getMessage());
        }
    }

    /**
     * Get student details by ID.
     *
     * @param int $id
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function getStudentDetail(int $id)
    {
        try {
            // Retrieve student details from the repository by ID
            return $this->studentRepository->getStudentDetail($id);
        } catch (ModelNotFoundException $e) {
            // Handle case where the student is not found
            throw new ModelNotFoundException('Student not found with ID: ' . $id);
        } catch (Exception $e) {
            // Handle any other exceptions that occur while retrieving student details
            throw new Exception('Unable to retrieve student details: ' . $e->getMessage());
        }
    }

    /**
     * Create a new student.
     *
     * @param array $data
     * @return mixed
     * @throws Exception
     */
    public function createStudent(array $data)
    {
        try {
            // Hash the password before storing it
            $data['password'] = Hash::make($data['password']);
            $image = null;

            // Handle image upload from the request if present
            if (isset($data['image'])) {
                $data['image'] = $this->imageService->storeImage('student_files', $data['image']);
            } elseif (session('image_temp')) {
                // Handle temporary image if session data exists
                $tempImageName = session('image_temp');
                $tempImagePath = $tempImageName;

                // Check if the temporary image exists in storage
                if (Storage::exists($tempImagePath)) {
                    $fullTempImagePath = Storage::path($tempImagePath);
                    $image = new UploadedFile(
                        $fullTempImagePath,
                        $tempImageName,
                        null,
                        null,
                        true
                    );

                    // Store the image in S3 and delete the temporary image
                    $data['image'] = $this->imageService->storeImage('student_files', $image);
                    $this->imageService->deleteImage($tempImagePath);
                } else {
                    dd('Temp file does not exist in local storage.'); // Debugging statement for missing temp file
                }
            }

            // Create a new student using the repository
            $student = $this->studentRepository->createStudent($data); // Store the created student in $student

        } catch (Exception $e) {
            // If an error occurs, delete the newly created student if it exists
            if (isset($student)) {
                $student->delete(); // Delete the student
            }

            // Handle image storage exceptions
            $this->imageService->handleImageException($e, $data);
            throw new Exception('Unable to create student: ' . $e->getMessage());
        }
    }

    /**
     * Update an student by ID.
     *
     * @param int $id
     * @param array $data
     * @return mixed
     * @throws ModelNotFoundException
     */
    public function updateStudent(int $id, array $data)
    {
        // Store old data to restore in case of an error
        $oldStudent = $this->studentRepository->getStudentDetail($id);
        $oldImagePath = $oldStudent->image; // Store the old image path
        $image = null;

        // Start transaction to ensure all changes are atomic
        DB::beginTransaction();

        try {
            // Handle image upload if present
            if (isset($data['image'])) {
                // Update image in S3
                $data['image'] = $this->imageService->updateImage('student_files', $data['image'], $oldImagePath);
            } elseif (session('image_temp')) {
                // Handle temporary image if present in session
                $tempImageName = session('image_temp');
                $tempImagePath = $tempImageName;

                // Check if the temporary image exists in storage
                if (Storage::exists($tempImagePath)) {
                    $fullTempImagePath = Storage::path($tempImagePath);
                    $image = new UploadedFile(
                        $fullTempImagePath,
                        $tempImageName,
                        null,
                        null,
                        true
                    );

                    // Update image in S3 and delete temporary image
                    $data['image'] = $this->imageService->updateImage('student_files', $image, $oldImagePath);
                    $this->imageService->deleteImage($tempImagePath); // Delete temporary image
                } else {
                    dd('Temp file does not exist in local storage.'); // Error message if temporary image does not exist
                }
            }

            // Update student with new data
            $this->studentRepository->updateStudent($id, $data);

            // Commit transaction after successful update
            DB::commit();

        } catch (Exception $e) {
            // Rollback transaction in case of failure
            DB::rollBack();

            // Restore old data in case of an error
            $this->studentRepository->updateStudent($id, $oldStudent->toArray());

            // Handle image restoration if it was changed
            if (isset($data['image']) && $data['image'] !== $oldImagePath) {
                $this->imageService->updateImageS3('student_files', $oldImagePath, $data['image']);
            }

            // Handle exceptions when an error occurs
            $this->imageService->handleImageException($e, $data);
            throw new Exception('Unable to update student: ' . $e->getMessage());
        }
    }

    /**
     * Delete an student by ID.
     *
     * @param int $id
     * @return bool
     * @throws ModelNotFoundException
     */
    public function deleteStudent(int $id)
    {
        try {
            // Attempt to delete the student using the repository
            return $this->studentRepository->deleteStudent($id);
        } catch (ModelNotFoundException $e) {
            // Handle case where the student is not found
            throw new ModelNotFoundException('Student not found with ID: ' . $id);
        } catch (Exception $e) {
            // Handle any other exceptions that occur during deletion
            throw new Exception('Unable to delete student: ' . $e->getMessage());
        }
    }
}