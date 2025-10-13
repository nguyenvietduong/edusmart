<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ScoresSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'student_id'        => 1,
                'subject_id'        => 2,
                'latest_attempt_id' => 2,
                'final_average'     => 6.5,
                'status'            => 'pass',
            ],
            // Bạn có thể thêm nhiều dữ liệu khác tương tự
        ];

        foreach ($data as $d) {
            DB::table('scores')->updateOrInsert(
                [
                    'student_id' => $d['student_id'],
                    'subject_id' => $d['subject_id'],
                ],
                array_merge($d, ['created_at' => now(), 'updated_at' => now()])
            );
        }
    }
}