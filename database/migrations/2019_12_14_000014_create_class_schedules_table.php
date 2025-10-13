<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('class_schedules', function (Blueprint $table) {
            $table->id();
            
            // Lớp học
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            
            // Môn học
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            
            // Giáo viên dạy môn này cho lớp
            $table->foreignId('teacher_id')->nullable()->constrained('teachers')->nullOnDelete();
            
            // Phòng học (có thể null nếu chưa có phòng)
            $table->string('room')->nullable();
            
            // Ngày trong tuần: 1 = Thứ 2, 2 = Thứ 3, ..., 7 = Chủ nhật
            $table->tinyInteger('weekday')->comment('1=Monday, 7=Sunday');
            
            // Tiết học trong ngày: 1, 2, 3, ...
            $table->tinyInteger('period')->comment('Tiết học trong ngày');
            
            // Thời gian bắt đầu / kết thúc (tùy chọn, có thể dùng để kiểm tra xung đột)
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            
            $table->timestamps();

            // Không cho phép trùng lớp + môn + tiết + ngày
            $table->unique(['class_id','subject_id','weekday','period'], 'class_schedule_unique');
        });
    }

    public function down(): void {
        Schema::dropIfExists('class_schedules');
    }
};

// | class_id | subject_id | teacher_id | room | weekday | period | start_time | end_time |
// | -------- | ---------- | ---------- | ---- | ------- | ------ | ---------- | -------- |
// | 1        | 3          | 2          | 101A | 1       | 1      | 07:00      | 07:45    |
// | 1        | 4          | 5          | 101A | 1       | 2      | 07:50      | 08:35    |
// | 2        | 3          | 6          | 102B | 1       | 1      | 07:00      | 07:45    |