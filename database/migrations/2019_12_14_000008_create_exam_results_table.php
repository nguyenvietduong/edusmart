<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('exam_results', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained('students')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->integer('attempt')->default(1);
            $table->date('exam_date')->nullable();
            $table->decimal('score_1', 5,2)->nullable();
            $table->decimal('score_2', 5,2)->nullable();
            $table->decimal('average', 5,2)->nullable();
            $table->enum('status', ['pass','fail'])->default('fail');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('exam_results');
    }
};

// | id | student_id | subject_id | attempt | exam_date  | average | status |
// | -- | ---------- | ---------- | ------- | ---------- | ------- | ------ |
// | 1  | 10         | 2          | 1       | 2025-06-10 | 4.5     | fail   |
// | 2  | 10         | 2          | 2       | 2025-07-05 | 6.5     | pass   |