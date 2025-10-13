<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('latest_attempt_id')->nullable()->constrained('exam_results')->nullOnDelete();
            $table->decimal('final_average', 5,2)->nullable();
            $table->enum('status', ['pass','fail'])->default('fail');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('scores');
    }
};

// | id | student_id | subject_id | latest_attempt_id | final_average | status |
// | -- | ---------- | ---------- | ----------------- | ------------- | ------ |
// | 1  | 10         | 2          | 2                 | 6.5           | pass   |