<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('school_years', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();           // VD: "2024-2025"
            $table->year('start_year');                 // 2024
            $table->year('end_year');                   // 2025
            $table->date('start_date')->nullable();     // Ngày bắt đầu học
            $table->date('end_date')->nullable();       // Ngày kết thúc học
            $table->enum('status', ['active', 'inactive', 'archived'])
                ->default('active')
                ->comment('Trạng thái năm học');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
