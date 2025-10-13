<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('attendance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendance_session_id')->constrained('attendance_sessions')->cascadeOnDelete();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->enum('status', ['present','absent','late','excused'])->default('present');
            $table->enum('source', ['manual','rfid','face','qr','api_sync'])->default('manual');
            $table->string('device_id', 100)->nullable();
            $table->timestamp('check_in_time')->useCurrent();
            $table->foreignId('updated_by')->nullable()->constrained('teachers')->nullOnDelete();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('attendance_records');
    }
};

// | attendance_session_id | student_id | status  | source |
// | --------------------- | ---------- | ------- | ------ |
// | 1                     | 101        | present | rfid   |
// | 1                     | 102        | late    | face   |
// | 1                     | 103        | absent  | manual |