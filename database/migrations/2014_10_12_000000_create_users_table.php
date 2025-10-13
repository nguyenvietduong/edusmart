<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            // 🔑 Thông tin đăng nhập cơ bản
            $table->string('name');
            $table->string('first_name')->nullable(); // Tên
            $table->string('last_name')->nullable(); // Họ và tên đệm
            $table->string('email')->nullable()->unique();
            $table->string('password');

            // 🔐 Phân quyền hệ thống (dựa trên bảng roles)
            // Mục đích: xác định quyền truy cập trong hệ thống web/app
            $table->foreignId('role_id')
                ->constrained('roles') // Liên kết tới bảng roles
                ->cascadeOnDelete();   // Nếu role bị xóa -> xóa luôn user (tuỳ logic, có thể dùng nullOnDelete())

            // 🔢 Thông tin định danh
            $table->string('card_uid', 50)->nullable()->unique(); // RFID / Thẻ 
            $table->string('face_id', 100)->nullable();       // ID nhận diện khuôn mặt

            // Loại người dùng trong trường học
            $table->enum('user_type', [
                'student',  // Học sinh
                'teacher',  // Giáo viên
                'staff',    // Nhân viên / Cán bộ
                'parent',   // Phụ huynh
                'admin'     // Quản trị viên
            ])->default('student');
            // Mục đích: phân biệt các loại người dùng để quản lý và cấp quyền phù hợp

            // ⚙️ Hệ thống
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
