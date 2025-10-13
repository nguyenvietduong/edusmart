<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            [
                'subject_code'   => 'TOAN10',
                'name'           => 'Toán 10',
                'slug'           => 'toan-10',
                'short_name'     => 'MATH',
                'category'       => 'Tự nhiên',
                'credit'         => 2,
                'lesson_hours'   => 70,
                'weekly_hours'   => 5,
                'semester'       => '1',
                'teacher_id'     => null,
                'default_room'   => 'P101',
                'description'    => 'Toán lớp 10 – chương trình cơ bản',
                'is_elective'    => false,
                'is_active'      => true,
                'cover_image'    => null,
                'syllabus_file'  => null,
            ],
            [
                'subject_code'   => 'VAN10',
                'name'           => 'Ngữ Văn 10',
                'slug'           => 'ngu-van-10',
                'short_name'     => 'LIT',
                'category'       => 'Xã hội',
                'credit'         => 2,
                'lesson_hours'   => 68,
                'weekly_hours'   => 5,
                'semester'       => '1',
                'teacher_id'     => null,
                'default_room'   => 'P102',
                'description'    => 'Ngữ Văn lớp 10 – chương trình cơ bản',
                'is_elective'    => false,
                'is_active'      => true,
                'cover_image'    => null,
                'syllabus_file'  => null,
            ],
            [
                'subject_code'   => 'LY10',
                'name'           => 'Vật Lý 10',
                'slug'           => 'vat-ly-10',
                'short_name'     => 'PHY',
                'category'       => 'Tự nhiên',
                'credit'         => 2,
                'lesson_hours'   => 70,
                'weekly_hours'   => 4,
                'semester'       => '1',
                'teacher_id'     => null,
                'default_room'   => 'P103',
                'description'    => 'Vật lý lớp 10 – chương trình cơ bản',
                'is_elective'    => false,
                'is_active'      => true,
                'cover_image'    => null,
                'syllabus_file'  => null,
            ],
        ];

        foreach ($subjects as $s) {
            DB::table('subjects')->updateOrInsert(
                ['subject_code' => $s['subject_code']],
                array_merge($s, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}
