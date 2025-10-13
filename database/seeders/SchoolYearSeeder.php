<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolYearSeeder extends Seeder
{
    /**
     * Chạy seeder để thêm các năm học mẫu
     */
    public function run(): void
    {
        $schoolYears = [
            [
                'name'       => '2023-2024',
                'start_year' => 2023,
                'end_year'   => 2024,
                'start_date' => '2023-09-01',
                'end_date'   => '2024-06-30',
                'status'     => 'archived',
                'description'=> 'Niên khóa 2023-2024',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => '2024-2025',
                'start_year' => 2024,
                'end_year'   => 2025,
                'start_date' => '2024-09-01',
                'end_date'   => '2025-06-30',
                'status'     => 'active',
                'description'=> 'Niên khóa 2024-2025',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => '2025-2026',
                'start_year' => 2025,
                'end_year'   => 2026,
                'start_date' => '2025-09-01',
                'end_date'   => '2026-06-30',
                'status'     => 'inactive',
                'description'=> 'Niên khóa 2025-2026',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($schoolYears as $year) {
            DB::table('school_years')->updateOrInsert(
                ['name' => $year['name']],
                $year
            );
        }
    }
}