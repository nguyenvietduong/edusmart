<style>
    .user-info li {
        display: flex;
        justify-content: space-between;
        gap: 1rem;
        white-space: nowrap;
    }

    .user-info li strong {
        flex-shrink: 0;
    }

    .user-info li span {
        text-align: left;
    }
</style>

<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <h4 class="card-title mb-0">Danh sách học sinh</h4>
                </div>

                <div class="col-auto">
                    <form method="GET" action="" class="d-flex align-items-center">
                        <!-- Ô tìm kiếm -->
                        <input type="search" name="search" class="form-control form-control-sm me-2"
                            placeholder="🔍 Tìm theo tên, email, SĐT..." value="{{ request('search') }}"
                            style="width: 220px;">

                        {{-- Dropdown chọn trạng thái --}}
                        <select name="status" class="form-select form-select-sm me-2" style="width: 150px;">
                            <option value="">-- Trạng thái --</option>
                            <option value="studying" {{ request('status') == 'studying' ? 'selected' : '' }}>Đang học
                            </option>
                            <option value="graduated" {{ request('status') == 'graduated' ? 'selected' : '' }}>Đã tốt
                                nghiệp</option>
                            <option value="suspended" {{ request('status') == 'suspended' ? 'selected' : '' }}>Tạm nghỉ
                            </option>
                            <option value="expelled" {{ request('status') == 'expelled' ? 'selected' : '' }}>Buộc thôi
                                học</option>
                        </select>

                        <!-- Bộ lọc thời gian -->
                        <div class="input-group input-group-sm me-2">
                            <span class="input-group-text">Bắt đầu</span>
                            <input type="date" name="start_time" value="{{ request('start_time') }}"
                                class="form-control" style="width: 140px;">

                            <span class="input-group-text">Kết thúc</span>
                            <input type="date" name="end_time" value="{{ request('end_time') }}" class="form-control"
                                style="width: 140px;">
                        </div>

                        <!-- Nút tìm -->
                        <button type="submit" class="btn btn-sm btn-primary" style="min-width: 70px;">
                            <i class="las la-search"></i> Tìm
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Thông tin cơ bản</th>
                            <th>Thông tin chi tiết</th>
                            <th>Liên hệ</th>
                            <th>Học tập</th>
                            <th>Phụ huynh</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú thêm</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <!-- Thông tin cơ bản -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <div class="d-flex flex-column align-items-center">
                                            <!-- Ảnh đại diện học sinh -->
                                            @if ($student->profile_photo)
                                                <img src="{{ $student->profile_photo }}" alt="Ảnh học sinh"
                                                    class="rounded-circle" width="50" height="50"
                                                    style="object-fit: cover; border: 2px solid #ddd;">
                                            @else
                                                <img src="{{ $student->profile_photo }}" alt="Không có ảnh"
                                                    class="rounded-circle" width="50" height="50"
                                                    style="object-fit: cover; opacity: 0.6;">
                                            @endif

                                            <!-- Ảnh thẻ học sinh (nếu có) -->
                                            @if ($student->student_card_photo)
                                                <a href="{{ $student->profile_photo }}" target="_blank"
                                                    class="mt-1 small text-primary text-decoration-underline">
                                                    Xem thẻ
                                                </a>
                                            @endif
                                        </div>

                                        <li><strong>Mã HS:</strong> <span>{{ $student->student_code }}</span></li>
                                        <li><strong>Giới tính:</strong>
                                            <span>{{ $student->getGenderAttribute() ?? '-' }}</span>
                                        </li>
                                        <li><strong>Ngày sinh:</strong>
                                            <span>{{ $student->formatted_date_of_birth ?? '-' }}</span>
                                        </li>
                                    </ul>
                                </td>

                                <!-- Thông tin chi tiết -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <li><strong>Nơi sinh:</strong> <span>{{ $student->birth_place ?? '-' }}</span>
                                        </li>
                                        <li><strong>Dân tộc:</strong> <span>{{ $student->ethnicity ?? '-' }}</span>
                                        </li>
                                        <li><strong>Tôn giáo:</strong> <span>{{ $student->religion ?? '-' }}</span>
                                        </li>
                                        <li><strong>Chiều cao:</strong> <span>{{ $student->height ?? '-' }} cm</span>
                                        </li>
                                        <li><strong>Cân nặng:</strong> <span>{{ $student->weight ?? '-' }} kg</span>
                                        </li>
                                        <li><strong>Nhóm máu:</strong> <span>{{ $student->blood_type ?? '-' }}</span>
                                        </li>
                                        <li><strong>Trường cũ:</strong>
                                            <span>{{ $student->previous_school ?? '-' }}</span>
                                        </li>
                                        <li><strong>Ngày nhập học:</strong>
                                            <span>{{ $student->enrollment_date ? \Carbon\Carbon::parse($student->enrollment_date)->format('d/m/Y') : '-' }}</span>
                                        </li>
                                        <li><strong>Ghi chú:</strong> <span>{{ $student->notes ?? '-' }}</span></li>
                                    </ul>
                                </td>

                                <!-- Liên hệ -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <li><strong>Điện thoại:</strong>
                                            <span>{{ $student->getMaskedPhoneAttribute() ?? '-' }}</span>
                                        </li>
                                        <li><strong>Địa chỉ:</strong> <span>{{ $student->address ?? '-' }}</span></li>
                                        <li><strong>Thành phố:</strong> <span>{{ $student->city ?? '-' }}</span></li>
                                    </ul>
                                </td>

                                <!-- Học tập -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <li><strong>Lớp:</strong> <span
                                                class="badge bg-success">{{ $student->class->name ?? '-' }}</span></li>
                                        <li><strong>Niên khóa:</strong> <span>{{ $student->school_year ?? '-' }}</span>
                                        </li>
                                        <li><strong>GPA:</strong> <span>{{ $student->gpa ?? '-' }}</span></li>
                                    </ul>
                                </td>

                                <!-- Phụ huynh -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <li><strong>Cha:</strong> <span>{{ $student->father_name ?? '-' }}</span></li>
                                        <li><strong>SĐT:</strong> <span>{{ $student->father_phone ?? '-' }}</span></li>
                                        <li><strong>Mẹ:</strong> <span>{{ $student->mother_name ?? '-' }}</span></li>
                                        <li><strong>SĐT:</strong> <span>{{ $student->mother_phone ?? '-' }}</span></li>
                                        <li><strong>Ng.giám hộ:</strong>
                                            <span>{{ $student->guardian_name ?? '-' }}</span>
                                        </li>
                                        <li><strong>SĐT:</strong>
                                            <span>{{ $student->guardian_phone ?? '-' }}</span>
                                        </li>
                                    </ul>
                                </td>

                                <!-- Trạng thái -->
                                <td>
                                    <span
                                        class="badge 
                                            @switch($student->status)
                                                @case('studying') bg-success @break
                                                @case('graduated') bg-primary @break
                                                @case('suspended') bg-warning @break
                                                @case('expelled') bg-danger @break
                                                @default bg-secondary
                                            @endswitch
                                        ">
                                        {{ $student->status_label }}
                                    </span>
                                </td>

                                <td>
                                    {{ $student->notes ?? '-' }}
                                </td>

                                <!-- Thao tác -->
                                <td>
                                    <a href="" class="btn btn-sm btn-info">
                                        <i class="las la-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-warning">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <form action="" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Xóa học sinh này?')">
                                            <i class="las la-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-3">
                                    Không có dữ liệu 😥
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($students->hasPages())
            <div class="card-body pt-2">
                {{ $students->links() }}
            </div>
        @endif
    </div>
</div>
