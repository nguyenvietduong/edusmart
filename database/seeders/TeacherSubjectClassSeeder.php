<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherSubjectClassSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'teacher_id' => 1,
                'subject_id' => 1, // TOAN10
                'class_id'   => 1, // Lớp 10A1
                'semester'   => '1',
            ],
            [
                'teacher_id' => 2,
                'subject_id' => 2, // VAN10
                'class_id'   => 1, // Lớp 10A1
                'semester'   => '1',
            ]
            // Bạn có thể thêm nhiều dòng khác cho các lớp/giáo viên
        ];

        foreach ($data as $d) {
            DB::table('teacher_subject_class')->updateOrInsert(
                [
                    'teacher_id' => $d['teacher_id'],
                    'subject_id' => $d['subject_id'],
                    'class_id'   => $d['class_id']
                ],
                array_merge($d, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}