<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Chạy seeder để thêm trường mẫu
     */
    public function run(): void
    {
        $schools = [
            [
                'name'             => 'Trường Trung Học Phổ Thông Phụ Dực',
                'level'            => 'THPT',
                'type'             => 'Công lập',
                'email'            => 'contact@phuduc.edu.vn',
                'phone'            => '0227389123',
                'logo'             => 'phu_duc.png',
                'description'      => 'Trường THPT Phụ Dực nổi tiếng với chất lượng giáo dục hàng đầu, đào tạo học sinh giỏi và năng động.',
                'address'          => 'An Bài, Quỳnh Phụ, Thái Bình',
                'ward'             => 'An Bài',
                'district'         => 'Quỳnh Phụ',
                'city'             => 'Thái Bình',
                'country'          => 'Việt Nam',
                'founded_at'       => '2000-09-01',
                'total_students'   => 1200,
                'total_teachers'   => 80,
                'created_at'       => now(),
                'updated_at'       => now(),
            ],
            // Có thể thêm nhiều trường khác ở đây nếu cần
        ];

        foreach ($schools as $school) {
            DB::table('schools')->insert($school);
        }
    }
}