<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Chạy seeder để thêm vai trò mặc định
     */
    public function run(): void
    {
        $roles = [
            ['name' => 'Quản trị viên', 'slug' => 'admin'],
            ['name' => 'Giáo viên', 'slug' => 'teacher'],
            ['name' => 'Học sinh', 'slug' => 'student'],
            ['name' => 'Nhân viên', 'slug' => 'staff'],
            ['name' => 'Phụ huynh', 'slug' => 'parent'],
        ];

        foreach ($roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['slug' => $role['slug']], // tránh trùng khi chạy nhiều lần
                ['name' => $role['name'], 'created_at' => now(), 'updated_at' => now()]
            );
        }
    }
}