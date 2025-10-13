<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        // Giả sử các user giáo viên đã có trong bảng users
        // Lấy user_id bằng email
        $teachers = [
            [
                'user_id'           => 3, // ID user trong bảng users
                'teacher_code'    => 'GV001',
                'gender'          => 'male',
                'birth_date'      => '1985-03-15',
                'citizen_id'      => '123456789',
                'photo'           => null,
                'specialization'  => 'Toán học',
                'qualification'   => 'Thạc sĩ',
                'position'        => 'Giáo viên chủ nhiệm',
                'phone'           => '0912345678',
                'email'           => 'teacher1@example.com',
                'address'         => 'Hà Nội',
                'hire_date'       => '2010-08-01',
                'resign_date'     => null,
                'is_active'       => true,
                'notes'           => 'Giáo viên ưu tú',
            ],
            [
                'user_id'           => 4, // ID user trong bảng users
                'teacher_code'    => 'GV002',
                'gender'          => 'female',
                'birth_date'      => '1990-06-20',
                'citizen_id'      => '987654321',
                'photo'           => null,
                'specialization'  => 'Vật lý',
                'qualification'   => 'Cử nhân',
                'position'        => 'Tổ trưởng',
                'phone'           => '0987654321',
                'email'           => 'teacher2@example.com',
                'address'         => 'Hà Nội',
                'hire_date'       => '2015-08-01',
                'resign_date'     => null,
                'is_active'       => true,
                'notes'           => 'Giáo viên giỏi',
            ],
        ];

        foreach ($teachers as $t) {
            $user = DB::table('users')->where('role_id', 3)->first();
            if ($user) {
                DB::table('teachers')->updateOrInsert(
                    ['teacher_code' => $t['teacher_code']],
                    array_merge($t, ['user_id' => $user->id, 'created_at' => now(), 'updated_at' => now()])
                );
            }
        }
    }
}
