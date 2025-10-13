<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $students = [
            [
                'user_id'           => 2, // ID user trong bảng users
                'student_code'      => 'HS001',
                'date_of_birth'     => '2008-05-10',
                'gender'            => 'male',
                'ethnicity'         => 'Kinh',
                'religion'          => 'Không',
                'birth_place'       => 'Hà Nội',
                'address'           => '123 Đường Lê Lợi, Phường 1, Quận 1, TP.HCM',
                'ward'              => 'Phường 1',
                'district'          => 'Quận 1',
                'city'              => 'TP.HCM',
                'country'           => 'Việt Nam',
                'class_id'          => 1,
                'school_year'       => '2024-2025',
                'status'            => 'studying',
                'gpa'               => 8.5,
                'father_name'       => 'Nguyễn Văn A',
                'father_phone'      => '0912345678',
                'mother_name'       => 'Trần Thị B',
                'mother_phone'      => '0987654321',
                'guardian_name'     => null,
                'guardian_phone'    => null,
                'height'            => 160,
                'weight'            => 50,
                'blood_type'        => 'O',
                'medical_notes'     => 'Không dị ứng',
                'enrollment_date'   => '2024-09-01',
                'previous_school'   => 'Trường THCS XYZ',
                'is_active'         => true,
                'profile_photo'     => 'hs001.jpg',
                'student_card_photo'=> 'hs001_card.jpg',
                'notes'             => 'Học sinh xuất sắc',
                'created_at'        => now(),
                'updated_at'        => now(),
            ],
            [
                'user_id'           => 1,
                'student_code'      => 'HS002',
                'date_of_birth'     => '2008-08-15',
                'gender'            => 'female',
                'ethnicity'         => 'Kinh',
                'religion'          => 'Không',
                'birth_place'       => 'Hà Nội',
                'address'           => '456 Đường Trần Phú, Phường 2, Quận 3, TP.HCM',
                'ward'              => 'Phường 2',
                'district'          => 'Quận 3',
                'city'              => 'TP.HCM',
                'country'           => 'Việt Nam',
                'class_id'          => 1,
                'school_year'       => '2024-2025',
                'status'            => 'studying',
                'gpa'               => 9.0,
                'father_name'       => 'Nguyễn Văn C',
                'father_phone'      => '0911122233',
                'mother_name'       => 'Trần Thị D',
                'mother_phone'      => '0983344556',
                'guardian_name'     => null,
                'guardian_phone'    => null,
                'height'            => 155,
                'weight'            => 45,
                'blood_type'        => 'A',
                'medical_notes'     => 'Dị ứng sữa',
                'enrollment_date'   => '2024-09-01',
                'previous_school'   => 'Trường THCS XYZ',
                'is_active'         => true,
                'profile_photo'     => 'hs002.jpg',
                'student_card_photo'=> 'hs002_card.jpg',
                'notes'             => 'Học sinh giỏi',
                'created_at'        => now(),
                'updated_at'        => now(),
            ]
        ];

        foreach ($students as $student) {
            DB::table('students')->updateOrInsert(
                ['student_code' => $student['student_code']],
                $student
            );
        }
    }
}