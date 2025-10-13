<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Gọi từng seeder theo thứ tự mong muốn
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ClassSeeder::class,
            TeacherSeeder::class,
            StudentSeeder::class,
            SchoolSeeder::class,
            SchoolYearSeeder::class,
            SubjectSeeder::class,
            TeacherSubjectClassSeeder::class,
            ExamResultsSeeder::class,
            ScoresSeeder::class,
        ]);
    }
}
