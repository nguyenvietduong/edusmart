<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            // 👤 Liên kết với tài khoản người dùng
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // 🔢 Thông tin định danh
            $table->string('teacher_code', 20)->unique(); // Mã GV: GV001, GV2024A
            $table->string('gender', 10)->nullable(); // Nam/Nữ/Khác
            $table->date('birth_date')->nullable(); // Ngày sinh
            $table->string('citizen_id', 20)->nullable()->unique(); // CCCD hoặc CMND
            $table->string('photo')->nullable(); // Ảnh đại diện giáo viên

            // 🏫 Thông tin công tác
            $table->string('specialization')->nullable(); // Chuyên môn chính (Toán, Tin học,…)
            $table->string('qualification')->nullable(); // Trình độ (Cử nhân, Thạc sĩ,…)
            $table->string('position')->nullable(); // Chức vụ (Giáo viên chủ nhiệm, Tổ trưởng,…)

            // 📞 Liên hệ
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('address')->nullable();

            // 📆 Thông tin làm việc
            $table->date('hire_date')->nullable(); // Ngày vào làm
            $table->date('resign_date')->nullable(); // Ngày nghỉ việc (nếu có)
            $table->boolean('is_active')->default(true); // Đang công tác hay không

            // 📝 Ghi chú thêm
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('teachers');
    }
};