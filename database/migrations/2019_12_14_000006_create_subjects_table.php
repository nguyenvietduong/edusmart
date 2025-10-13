<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();

            // 🔢 Thông tin định danh
            $table->string('subject_code', 20)->unique(); // Mã môn học (VD: TOAN10, LIT12)
            $table->string('name'); // Tên môn học (Toán, Văn, Lý,…)
            $table->string('slug')->nullable()->unique(); // Dạng URL thân thiện (toan, van-hoc,...)

            // 📚 Thông tin học phần
            $table->string('short_name', 50)->nullable(); // Viết tắt (VD: MATH, ENG)
            $table->string('category')->nullable(); // Loại môn (Tự nhiên, Xã hội, Cơ bản, Tự chọn,…)
            $table->integer('credit')->default(1); // Số tín chỉ / hệ số môn
            $table->integer('lesson_hours')->nullable(); // Tổng số tiết học
            $table->integer('weekly_hours')->nullable(); // Số tiết/tuần
            $table->string('semester')->nullable(); // Học kỳ áp dụng (1, 2, hoặc Cả năm)

            // 👩‍🏫 Giáo viên phụ trách chính
            $table->foreignId('teacher_id')->nullable()->constrained('users')->nullOnDelete();

            // 🏫 Phòng học mặc định (nếu có)
            $table->string('default_room')->nullable(); // Phòng học mặc định (VD: P202, Lab Tin)

            // 💬 Mô tả chi tiết
            $table->text('description')->nullable(); // Ghi chú / mô tả nội dung môn học

            // ⚙️ Trạng thái
            $table->boolean('is_elective')->default(false); // Môn tự chọn?
            $table->boolean('is_active')->default(true); // Còn dạy hay ngừng áp dụng

            // 🖼️ Hình ảnh, tài liệu
            $table->string('cover_image')->nullable(); // Ảnh đại diện môn học (VD: logo, biểu tượng)
            $table->string('syllabus_file')->nullable(); // File đề cương môn học (PDF,…)

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('subjects');
    }
};