<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center">
                <div class="col">
                    <h4 class="card-title mb-0">Danh sách khu vực hành chính</h4>
                </div>
                <div class="col-auto">
                    <form method="GET" action="" class="d-flex align-items-center">
                        {{-- Ô tìm kiếm --}}
                        <input type="search" name="search" class="form-control form-control-sm me-2" placeholder="🔍 Tìm theo tên hoặc mã..." value="{{ request('search') }}" style="width: 220px;">

                        {{-- Dropdown chọn loại --}}
                        <select name="type" class="form-select form-select-sm me-2" style="width: 150px;">
                            <option value="">Tất cả loại</option>
                            <option value="tinh" {{ request('type') == 'tinh' ? 'selected' : '' }}>Tỉnh</option>
                            <option value="huyen" {{ request('type') == 'huyen' ? 'selected' : '' }}>Huyện</option>
                            <option value="xa" {{ request('type') == 'xa' ? 'selected' : '' }}>Xã</option>
                        </select>

                        {{-- Nút tìm --}}
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="las la-search"></i> Tìm
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Tên khu vực hành chính</th>
                            <th>Mã số</th>
                            <th>Phân loại</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($locations as $location)
                        <tr>
                            <td>{{ $location->name }}</td>
                            <td>{{ $location->code }}</td>
                            <td><span class="badge bg-success">{{ $location->type_label ?? $location->type }}</span></td>
                            <td>{{ $location->created_at }}</td>
                            <td>{{ $location->updated_at }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-3">
                                Không có dữ liệu 😥
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($locations->hasPages())
        <div class="card-body pt-2">
            {{ $locations->links() }}
        </div>
        @endif
    </div>
    <!--end card-->
</div>