<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamResultsSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'student_id' => 1,
                'subject_id' => 2,
                'attempt'    => 1,
                'exam_date'  => '2025-06-10',
                'score_1'    => 4.5,
                'score_2'    => null,
                'average'    => 4.5,
                'status'     => 'fail',
                'note'       => 'Lần thi đầu tiên',
            ],
            [
                'student_id' => 1,
                'subject_id' => 2,
                'attempt'    => 2,
                'exam_date'  => '2025-07-05',
                'score_1'    => 6.5,
                'score_2'    => null,
                'average'    => 6.5,
                'status'     => 'pass',
                'note'       => 'Thi lại lần 2',
            ],
            // Bạn có thể thêm dữ liệu khác tương tự
        ];

        foreach ($data as $d) {
            DB::table('exam_results')->updateOrInsert(
                [
                    'student_id' => $d['student_id'],
                    'subject_id' => $d['subject_id'],
                    'attempt'    => $d['attempt'],
                ],
                array_merge($d, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}