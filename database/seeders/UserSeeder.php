<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name'       => 'Nguyễn Văn A',
                'first_name' => 'A',
                'last_name'  => 'Nguyễn Văn',
                'email'      => 'student1@example.com',
                'password'   => Hash::make('password123'),
                'role_id'    => 2, // ID role 'student' trong bảng roles
                'card_uid'   => 'RFID001',
                'face_id'    => 'FACE001',
                'user_type'  => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Trần Thị B',
                'first_name' => 'B',
                'last_name'  => 'Trần Thị',
                'email'      => 'student2@example.com',
                'password'   => Hash::make('password123'),
                'role_id'    => 2,
                'card_uid'   => 'RFID002',
                'face_id'    => 'FACE002',
                'user_type'  => 'student',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Lê Văn C',
                'first_name' => 'C',
                'last_name'  => 'Lê Văn',
                'email'      => 'teacher1@example.com',
                'password'   => Hash::make('password123'),
                'role_id'    => 3, // ID role 'teacher'
                'card_uid'   => 'RFID003',
                'face_id'    => 'FACE003',
                'user_type'  => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Lê Văn D',
                'first_name' => 'D',
                'last_name'  => 'Lê Văn',
                'email'      => 'teacher2@example.com',
                'password'   => Hash::make('password123'),
                'role_id'    => 3, // ID role 'teacher'
                'card_uid'   => 'RFID004',
                'face_id'    => 'FACE004',
                'user_type'  => 'teacher',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name'       => 'Admin',
                'first_name' => 'Admin',
                'last_name'  => '',
                'email'      => 'admin@example.com',
                'password'   => Hash::make('admin123'),
                'role_id'    => 1, // ID role 'admin'
                'card_uid'   => null,
                'face_id'    => null,
                'user_type'  => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        foreach ($users as $user) {
            DB::table('users')->updateOrInsert(
                ['email' => $user['email']],
                $user
            );
        }
    }
}