<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();

            // Thông tin định danh lớp
            $table->string('class_code', 50)->unique();  // Mã lớp: 10A1, 12A2, CNTT-K45
            $table->string('name');                      // Tên lớp đầy đủ
            $table->string('slug')->nullable()->unique(); // URL thân thiện
            $table->string('photo')->nullable(); // ảnh đại diện lớp (URL hoặc đường dẫn lưu trữ)

            // Liên kết năm học
            $table->foreignId('school_year_id')
                ->nullable()
                ->constrained('school_years')
                ->nullOnDelete();

            // Học tập
            $table->string('grade_level', 20)->nullable(); // Khối lớp (10, 11, 12)
            $table->year('start_year')->nullable();
            $table->year('end_year')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('total_students')->default(0);

            // Ca học
            $table->enum('study_shift', ['morning', 'afternoon', 'full_day'])
                ->default('full_day');

            $table->string('room_name')->nullable(); // Phòng học
            $table->foreignId('homeroom_teacher_id')
                ->nullable()
                ->constrained('teachers')
                ->nullOnDelete(); // Giáo viên chủ nhiệm

            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
