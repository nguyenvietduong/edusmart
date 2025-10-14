<style>
    .user-info li {
        display: flex;
        justify-content: space-between;
        /* label trái, dữ liệu phải */
        gap: 1rem;
        /* khoảng cách giữa label và dữ liệu */
        white-space: nowrap;
        /* không xuống dòng tự động */
    }

    .user-info li strong {
        flex-shrink: 0;
        /* label không bị thu hẹp */
    }

    .user-info li span {
        text-align: left;
        /* dữ liệu bên phải */
    }
</style>
<div class="col-12 col-lg-12">
    <div class="card">
        <div class="card-header">
            <div class="row align-items-center justify-content-between">
                <!-- Cột bên trái -->
                <div class="col-auto">
                    <h4 class="card-title mb-0">Danh sách khu vực hành chính</h4>
                </div>

                <!-- Cột bên phải -->
                <div class="col-auto">
                    <form method="GET" action="" class="d-flex align-items-center">
                        <!-- Ô tìm kiếm -->
                        <input type="search" name="search" class="form-control form-control-sm me-2"
                            placeholder="🔍 Tìm theo tên hoặc mã..." value="{{ request('search') }}"
                            style="width: 220px;">

                        <div class="input-group input-group-sm me-2">
                            <span class="input-group-text">Bắt đầu</span>
                            <input type="datetime-local" name="start_time"
                                value="{{ request('start_time') ? request('start_time') : '' }}" class="form-control"
                                style="width: 120px;">

                            <span class="input-group-text">Kết thúc</span>

                            <input type="datetime-local" name="end_time"
                                value="{{ request('end_time') ? request('end_time') : '' }}" class="form-control"
                                style="width: 120px;">
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
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th>Thông tin người tạo</th>
                            <th>Hành động</th>
                            <th>Module</th>
                            <th>Mô tả</th>
                            <th>Dữ liệu cũ</th>
                            <th>Dữ liệu mới</th>
                            <th>Địa chỉ IP</th>
                            <th>Ngày tạo</th>
                            <th>Ngày cập nhật</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($activityLogs as $activityLog)
                            <tr>
                                <td>
                                    <ul class="list-unstyled mb-0">
                                        <li><strong>Họ Tên:</strong>
                                            {{ $activityLog->user->last_name . ' ' . $activityLog->user->first_name }}
                                        </li>
                                        <li><strong>Email:</strong> {{ $activityLog->user->email }}
                                        </li>
                                        <li><strong>SĐT:</strong>
                                            {{ optional($activityLog->user->getProfileAttribute())->phone ?? '-' }}</li>
                                    </ul>
                                </td>
                                <td>{{ $activityLog->action }}</td>
                                <td>{{ $activityLog->module ?? '-' }}</td>
                                <td>{{ $activityLog->description ?? '-' }}</td>
                                <td>
                                    @php
                                        $oldData = $activityLog->old_data ?? null;
                                        $oldDataLines = [];
                                        $oldDataShort = '-';
                                        if ($oldData) {
                                            foreach ($oldData as $k => $v) {
                                                if (is_array($v)) {
                                                    $v = json_encode($v, JSON_UNESCAPED_UNICODE);
                                                }
                                                $oldDataLines[] = "$k: $v";
                                            }
                                            $fullText = implode("\n", $oldDataLines);
                                            $oldDataShort =
                                                strlen($fullText) > 100 ? substr($fullText, 0, 100) . '...' : $fullText;
                                        }
                                    @endphp

                                    <pre class="json-preview">{{ $oldDataShort }}</pre>

                                    @if ($oldData && strlen($fullText) > 100)
                                        <button class="btn btn-sm btn-link toggle-json-btn btn btn-success"
                                            type="button" data-full="{{ $fullText }}"
                                            data-short="{{ $oldDataShort }}">
                                            Xem thêm
                                        </button>
                                    @endif
                                </td>

                                <td>
                                    @php
                                        $newData = $activityLog->new_data ?? null;
                                        $newLines = [];
                                        if ($newData) {
                                            foreach ($newData as $k => $v) {
                                                if (is_array($v)) {
                                                    $v = json_encode($v, JSON_UNESCAPED_UNICODE);
                                                }
                                                $newLines[] = "$k: $v";
                                            }
                                        }
                                        $newDataShort = $newData
                                            ? (strlen(implode("\n", $newLines)) > 100
                                                ? substr(implode("\n", $newLines), 0, 100) . '...'
                                                : implode("\n", $newLines))
                                            : '-';
                                    @endphp

                                    <pre class="json-preview">{{ $newDataShort }}</pre>
                                    @if ($newData && strlen(implode("\n", $newLines)) > 100)
                                        <button class="btn btn-sm btn-link toggle-json-btn btn btn-success"
                                            type="button" data-full="{{ implode("\n", $newLines) }}"
                                            data-short="{{ $newDataShort }}">
                                            Xem thêm
                                        </button>
                                    @endif
                                </td>
                                <td><span class="badge bg-success">{{ $activityLog->ip_address ?? '-' }}</span></td>
                                <td>{{ $activityLog->created_at }}</td>
                                <td>{{ $activityLog->updated_at }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-3">
                                    Không có dữ liệu 😥
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if ($activityLogs->hasPages())
            <div class="card-body pt-2">
                {{ $activityLogs->links() }}
            </div>
        @endif
    </div>
    <!--end card-->
</div>
<script>
    $(document).on('click', '.toggle-json-btn', function() {
        const $btn = $(this);
        const $pre = $btn.siblings('pre.json-preview');
        const fullText = $btn.data('full');
        const shortText = $btn.data('short');

        if ($btn.text() === 'Xem thêm') {
            $pre.text(fullText);
            $btn.text('Thu gọn');
        } else {
            $pre.text(shortText);
            $btn.text('Xem thêm');
        }
    });
</script>
