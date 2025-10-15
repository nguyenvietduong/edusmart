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
                    <h4 class="card-title mb-0">Danh sách giáo viên</h4>
                </div>

                <div class="col-auto">
                    <form method="GET" action="" class="d-flex align-items-center">
                        <!-- Ô tìm kiếm -->
                        <input type="search" name="search" class="form-control form-control-sm me-2"
                            placeholder="🔍 Tìm theo mã, tên, SĐT, email..." value="{{ request('search') }}"
                            style="width: 230px;">

                        <!-- Trạng thái làm việc -->
                        <select name="is_active" class="form-select form-select-sm me-2" style="width: 150px;">
                            <option value="">-- Trạng thái --</option>
                            <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Đang công tác
                            </option>
                            <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Đã nghỉ</option>
                        </select>

                        <!-- Lọc thời gian -->
                        <div class="input-group input-group-sm me-2">
                            <span class="input-group-text">Bắt đầu</span>
                            <input type="date" name="start_date" value="{{ request('start_date') }}"
                                class="form-control" style="width: 140px;">

                            <span class="input-group-text">Kết thúc</span>
                            <input type="date" name="end_date" value="{{ request('end_date') }}" class="form-control"
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
                            <th>Thông tin chuyên môn</th>
                            <th>Phụ trách giảng dạy</th>
                            <th>Liên hệ</th>
                            <th>Trạng thái</th>
                            <th>Ghi chú</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($teachers as $teacher)
                            <tr>

                                <!-- Thông tin cơ bản -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <div class="d-flex flex-column align-items-center mb-2">
                                            @if ($teacher->photo)
                                                <img src="{{ $teacher->photo }}" alt="Ảnh GV" class="rounded-circle"
                                                    width="55" height="55"
                                                    style="object-fit: cover; border: 2px solid #ddd;">
                                            @else
                                                <img src="https://via.placeholder.com/55x55?text=GV" alt="Không có ảnh"
                                                    class="rounded-circle" width="55" height="55"
                                                    style="opacity: 0.6;">
                                            @endif

                                            <!-- Ảnh thẻ (nếu có) -->
                                            @if ($teacher->photo)
                                                <a href="{{ $teacher->photo }}" target="_blank"
                                                    class="mt-1 small text-primary text-decoration-underline">
                                                    Xem thẻ
                                                </a>
                                            @endif
                                        </div>

                                        <li><strong>Mã GV:</strong> <span>{{ $teacher->teacher_code }}</span></li>
                                        <li><strong>Giới tính:</strong>
                                            <span>{{ $teacher->getGenderAttribute() ?? '-' }}</span>
                                        </li>
                                        <li><strong>Ngày sinh:</strong>
                                            <span>{{ $teacher->getFormattedBirthDateAttribute() ?? '-' }}</span>
                                        </li>
                                        <li><strong>CCCD:</strong> <span>{{ $teacher->citizen_id ?? '-' }}</span></li>
                                    </ul>
                                </td>

                                <!-- Thông tin chuyên môn -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <li><strong>Chuyên môn:</strong>
                                            <span>{{ $teacher->specialization ?? '-' }}</span>
                                        </li>
                                        <li><strong>Trình độ:</strong>
                                            <span>{{ $teacher->qualification ?? '-' }}</span>
                                        </li>
                                        <li><strong>Chức vụ:</strong> <span>{{ $teacher->position ?? '-' }}</span></li>
                                        <li>
                                            <strong>Môn giảng dạy:</strong>
                                            <span>
                                                {{ $teacher->subjects->pluck('name')->implode(', ') ?: '-' }}
                                            </span>
                                        </li>
                                        <li><strong>Ngày vào làm:</strong>
                                            <span>{{ $teacher->hire_date ? \Carbon\Carbon::parse($teacher->hire_date)->format('d/m/Y') : '-' }}</span>
                                        </li>
                                        <li><strong>Ngày nghỉ việc:</strong>
                                            <span>{{ $teacher->resign_date ? \Carbon\Carbon::parse($teacher->resign_date)->format('d/m/Y') : '-' }}</span>
                                        </li>
                                    </ul>
                                </td>

                                {{-- Cột các môn đang dạy --}}
                                <td>
                                    @if ($teacher->homeroomClasses->count())
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($teacher->homeroomClasses as $class)
                                                <li class="d-flex align-items-center mb-1">
                                                    <span class="badge bg-primary me-2">
                                                        <i class="las la-chalkboard-teacher me-1"></i> Chủ nhiệm
                                                    </span>
                                                    <span class="fw-semibold text-dark">{{ $class->name }}
                                                        ({{ $class->grade_level }})
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <em class="text-muted">Không chủ nhiệm lớp nào</em>
                                    @endif

                                    @if ($teacher->subjects->count())
                                        <ul class="list-unstyled mb-0">
                                            @foreach ($teacher->subjects as $subject)
                                                <li class="mb-1">
                                                    <i class="las la-book text-primary me-2"></i>
                                                    <strong>{{ $subject->name }}</strong>:
                                                    @php
                                                        $classesForSubject = $teacher->classes->filter(
                                                            fn($class) => $class->pivot->subject_id == $subject->id,
                                                        );
                                                    @endphp
                                                    @if ($classesForSubject->count())
                                                        <ul class="ps-4 mb-0 text-muted">
                                                            @foreach ($classesForSubject as $class)
                                                                <li>
                                                                    {{ $class->name }}
                                                                    <span class="badge bg-light text-dark border ms-1">
                                                                        Học kỳ {{ $class->pivot->semester }}
                                                                    </span>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <em class="text-muted">Chưa được phân công</em>
                                    @endif
                                </td>

                                <!-- Liên hệ -->
                                <td>
                                    <ul class="list-unstyled user-info mb-0">
                                        <li><strong>Điện thoại:</strong> <span>{{ $teacher->phone ?? '-' }}</span></li>
                                        <li><strong>Email:</strong> <span>{{ $teacher->email ?? '-' }}</span></li>
                                        <li><strong>Địa chỉ:</strong> <span>{{ $teacher->address ?? '-' }}</span></li>
                                    </ul>
                                </td>

                                <!-- Trạng thái -->
                                <td>
                                    <span class="badge {{ $teacher->is_active ? 'bg-success' : 'bg-secondary' }}">
                                        {{ $teacher->is_active ? 'Đang công tác' : 'Đã nghỉ' }}
                                    </span>
                                </td>

                                <!-- Ghi chú -->
                                <td>{{ $teacher->notes ?? '-' }}</td>

                                <!-- Thao tác -->
                                <td>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="las la-eye"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-warning">
                                        <i class="las la-edit"></i>
                                    </a>
                                    <form action="#" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Xóa giáo viên này?')">
                                            <i class="las la-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted py-3">
                                    Không có dữ liệu 😥
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($teachers->hasPages())
            <div class="card-body pt-2">
                {{ $teachers->links() }}
            </div>
        @endif
    </div>
</div>
