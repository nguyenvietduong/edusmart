<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void
    {
        // Giả sử đã có năm học và giáo viên trong DB
        $schoolYear = DB::table('school_years')->where('name', '2024-2025')->first();
        $teacher1 = DB::table('teachers')->where('teacher_code', 'GV001')->first();
        $teacher2 = DB::table('teachers')->where('teacher_code', 'GV002')->first();

        $classes = [
            [
                'class_code'           => '10A1',
                'name'                 => 'Lớp 10A1',
                'slug'                 => 'lop-10a1',
                'photo'                => null,
                'school_year_id'       => $schoolYear ? $schoolYear->id : null,
                'grade_level'          => '10',
                'start_year'           => 2024,
                'end_year'             => 2025,
                'start_date'           => '2024-09-01',
                'end_date'             => '2025-06-30',
                'total_students'       => 35,
                'study_shift'          => 'full_day',
                'room_name'            => 'P101',
                'homeroom_teacher_id'  => $teacher1 ? $teacher1->id : null,
                'description'          => 'Lớp 10A1 chuyên Toán',
                'is_active'            => true,
            ],
            [
                'class_code'           => '10A2',
                'name'                 => 'Lớp 10A2',
                'slug'                 => 'lop-10a2',
                'photo'                => null,
                'school_year_id'       => $schoolYear ? $schoolYear->id : null,
                'grade_level'          => '10',
                'start_year'           => 2024,
                'end_year'             => 2025,
                'start_date'           => '2024-09-01',
                'end_date'             => '2025-06-30',
                'total_students'       => 33,
                'study_shift'          => 'full_day',
                'room_name'            => 'P102',
                'homeroom_teacher_id'  => $teacher2 ? $teacher2->id : null,
                'description'          => 'Lớp 10A2 chuyên Văn',
                'is_active'            => true,
            ],
        ];

        foreach ($classes as $c) {
            DB::table('classes')->updateOrInsert(
                ['class_code' => $c['class_code']],
                array_merge($c, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}