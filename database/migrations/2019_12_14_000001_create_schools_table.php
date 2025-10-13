<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();

            // 🏫 Thông tin cơ bản
            $table->string('name');                        // Tên trường
            $table->string('level')->nullable();            // Cấp học (mầm non, tiểu học, THCS, THPT, đại học,...)
            $table->string('type')->nullable();             // Loại hình (công lập, tư thục,...)
            $table->string('email')->nullable();            // Email liên hệ chính
            $table->string('phone', 20)->nullable();        // SĐT liên hệ chính
            $table->string('logo')->nullable();             // Logo trường
            $table->text('description')->nullable();        // Giới thiệu mô tả ngắn

            // 📍 Thông tin địa chỉ chi tiết
            $table->string('address')->nullable();          // Địa chỉ chi tiết
            $table->string('ward')->nullable();             // Phường/Xã
            $table->string('district')->nullable();         // Quận/Huyện
            $table->string('city')->nullable();             // Thành phố/Tỉnh
            $table->string('country')->default('Việt Nam'); // Quốc gia

            // 📅 Thông tin hoạt động
            $table->date('founded_at')->nullable();         // Ngày thành lập
            $table->integer('total_students')->default(0);  // Tổng số học sinh
            $table->integer('total_teachers')->default(0);  // Tổng số giáo viên

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};