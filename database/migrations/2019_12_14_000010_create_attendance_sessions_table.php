<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attendance_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('classes')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('teacher_id')->constrained('teachers')->cascadeOnDelete();
            $table->date('date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();

            $table->unique(['class_id','subject_id','date']);
        });
    }

    public function down(): void {
        Schema::dropIfExists('attendance_sessions');
    }
};

// | Lớp | Môn  | Ngày       | Buổi học ID |
// | --- | ---- | ---------- | ----------- |
// | 10A | Toán | 2025-10-13 | 1           |