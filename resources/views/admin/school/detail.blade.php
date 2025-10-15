<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="card-title mb-0">Thông tin trường học</h4>
            <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editSchoolModal">
                <i class="las la-edit"></i> Chỉnh sửa
            </button>
        </div>

        <div class="card-body" id="schoolInfo">
            @if ($school)
                <div class="row">
                    <div class="col-md-3 text-center">
                        <img src="{{ $school->logo_url }}" alt="Logo trường" class="rounded mb-3" width="150">
                        <h5 class="fw-bold">{{ $school->name }}</h5>
                        <p class="text-muted mb-1">
                            {{ $school->level ?? '—' }} - {{ $school->type ?? '—' }}
                        </p>
                        <p class="mb-0"><i class="las la-calendar"></i> Thành lập:
                            {{ $school->founded_at ? \Carbon\Carbon::parse($school->founded_at)->format('d/m/Y') : '—' }}
                        </p>
                    </div>

                    <div class="col-md-9">
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <strong>Email:</strong> {{ $school->email ?? '—' }}
                            </div>
                            <div class="col-sm-6">
                                <strong>Điện thoại:</strong> {{ $school->phone ?? '—' }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <strong>Địa chỉ:</strong> {{ $school->full_address ?? '—' }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <strong>Tổng số giáo viên:</strong> {{ $school->total_teachers ?? 0 }}
                            </div>
                            <div class="col-sm-6">
                                <strong>Tổng số học sinh:</strong> {{ $school->total_students ?? 0 }}
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-12">
                                <strong>Mô tả:</strong><br>
                                <p class="text-muted">{{ $school->description ?? 'Chưa có mô tả.' }}</p>
                            </div>
                        </div>

                        <div class="text-end">
                            <small class="text-muted">
                                <i class="las la-clock"></i> Cập nhật:
                                {{ $school->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-warning mb-0">
                    Chưa có thông tin trường học. <a href="#" class="alert-link">Thêm mới</a>.
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Modal chỉnh sửa --}}
<div class="modal fade" id="editSchoolModal" tabindex="-1" aria-labelledby="editSchoolModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="editSchoolForm" class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSchoolModalLabel">Chỉnh sửa thông tin trường học</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Tên trường</label>
                        <input type="text" name="name" value="{{ $school->name ?? '' }}" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Cấp học</label>
                        <input type="text" name="level" value="{{ $school->level ?? '' }}" class="form-control">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label class="form-label">Loại hình</label>
                        <input type="text" name="type" value="{{ $school->type ?? '' }}" class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" value="{{ $school->email ?? '' }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại</label>
                        <input type="text" name="phone" value="{{ $school->phone ?? '' }}" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Địa chỉ</label>
                        <input type="text" name="address" value="{{ $school->address ?? '' }}" class="form-control">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label class="form-label">Mô tả</label>
                        <textarea name="description" rows="3" class="form-control">{{ $school->description ?? '' }}</textarea>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('editSchoolForm');
        form.addEventListener('submit', async function(e) {
            e.preventDefault();

            const formData = new FormData(form);
            try {
                const res = await fetch("", {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await res.json();

                if (res.ok) {
                    // Cập nhật nhanh phần hiển thị
                    document.getElementById('schoolInfo').innerHTML = data.html;
                    bootstrap.Modal.getInstance(document.getElementById('editSchoolModal')).hide();
                    alert('✅ Cập nhật thành công!');
                } else {
                    alert('❌ Có lỗi xảy ra: ' + (data.message || 'Không rõ nguyên nhân'));
                }
            } catch (err) {
                console.error(err);
                alert('Lỗi kết nối đến server');
            }
        });
    });
</script>
