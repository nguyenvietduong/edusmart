<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();

            // 🔗 Liên kết với người dùng (bảng users)
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();

            // 🔢 Thông tin định danh
            $table->string('student_code', 20)->unique();     // Mã HS: HS001

            // 👤 Thông tin cơ bản (một phần trùng user nhưng có thể chuyên biệt hơn)
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('ethnicity')->nullable();          // Dân tộc
            $table->string('religion')->nullable();           // Tôn giáo

            // 📍 Thông tin địa chỉ chi tiết
            $table->string('birth_place')->nullable();      // Nơi sinh
            $table->string('address')->nullable();          // Địa chỉ chi tiết
            $table->string('ward')->nullable();             // Phường/Xã
            $table->string('district')->nullable();         // Quận/Huyện
            $table->string('city')->nullable();             // Thành phố/Tỉnh
            $table->string('country')->default('Việt Nam'); // Quốc gia

            // 🏫 Thông tin học tập
            $table->foreignId('class_id')->nullable()->constrained('classes')->nullOnDelete();
            $table->string('school_year', 20)->nullable();    // Niên khóa: 2024-2025
            $table->string('status')->default('studying');    // studying | graduated | suspended | expelled
            $table->decimal('gpa', 3, 2)->nullable(); // 0.00 – 9.99 // Điểm trung bình học kỳ/năm

            // 👨‍👩‍👧‍👦 Thông tin phụ huynh
            $table->string('father_name')->nullable();
            $table->string('father_phone', 20)->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_phone', 20)->nullable();
            $table->string('guardian_name')->nullable();      // Người giám hộ (nếu có)
            $table->string('guardian_phone', 20)->nullable();

            // 🩺 Thông tin sức khỏe
            $table->float('height')->nullable(); // cm
            $table->float('weight')->nullable(); // kg
            $table->string('blood_type', 5)->nullable(); // A, B, O, AB
            $table->text('medical_notes')->nullable(); // Bệnh lý, dị ứng, lưu ý y tế

            // 📝 Thông tin nhập học
            $table->date('enrollment_date')->nullable(); // Ngày nhập học
            $table->string('previous_school')->nullable(); // Trường cũ
            $table->boolean('is_active')->default(true); // Còn học hay đã nghỉ

            // 🖼️ Hình ảnh / hồ sơ
            $table->string('profile_photo')->nullable();   // Ảnh học sinh
            $table->string('student_card_photo')->nullable(); // Ảnh thẻ học sinh
            $table->text('notes')->nullable(); // Ghi chú thêm

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
