<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('action', 100);
            $table->text('description')->nullable();
            $table->string('ip_address', 45)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('activity_logs');
    }
};

// | id | user_id | action            | description                               | ip_address    | created_at       |
// | -- | ------- | ----------------- | ----------------------------------------- | ------------- | ---------------- |
// | 1  | 1       | LOGIN             | Admin đăng nhập thành công                | 192.168.1.5   | 2025-10-13 08:00 |
// | 2  | null    | DEVICE_SYNC       | Thiết bị RFID-10A-001 đồng bộ dữ liệu     | 192.168.1.101 | 2025-10-13 09:00 |
// | 3  | 12      | CREATE_ATTENDANCE | Giáo viên tạo buổi điểm danh Toán lớp 10A | 192.168.1.20  | 2025-10-13 09:05 |