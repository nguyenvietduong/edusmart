<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('device_code', 50)->unique();
            $table->foreignId('class_id')->nullable()->constrained('classes')->nullOnDelete();
            $table->enum('type', ['rfid','camera','qr_scanner']);
            $table->string('location')->nullable();
            $table->enum('status', ['active','inactive'])->default('active');
            $table->timestamp('last_sync')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('devices');
    }
};

// | id | device_code  | class_id | type       | location   | status | last_sync        |
// | -- | ------------ | -------- | ---------- | ---------- | ------ | ---------------- |
// | 1  | RFID-10A-001 | 3        | rfid       | Phòng 10A  | active | 2025-10-13 09:00 |
// | 2  | CAM-10A-002  | 3        | camera     | Phòng 10A  | active | 2025-10-13 09:01 |
// | 3  | QR-ENTRY     | null     | qr_scanner | Cổng chính | active | 2025-10-13 08:55 |