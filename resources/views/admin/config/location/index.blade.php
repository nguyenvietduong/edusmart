@extends('layouts.admin')

@section('adminContent')
<div class="container-fluid">
    @include('admin.component.breadcrumb', [
        'title' => 'Khu vực hành chính',
        'items' => [
        'Cấu Hình' => null,
        'Yêu Cầu' => null,
        'Khu vực hành chính' => null,
        ]
    ])

    <div class="row">
        <div class="row">
            <div class="col-12 col-lg-12">
                <div class="row align-items-center mb-3">
                    <div class="col">
                        <form id="import-location-form">
                            @csrf
                            <button type="submit" class="btn btn-success">
                                Cập nhật dữ liệu khu vực hành chính
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
            @include('admin.config.location.table')
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
@endsection

@push('script')
<script>
    const _token = "{{ csrf_token() }}";
    const url_import_location = "{{ route('admin.config.command.location.import') }}";
</script>
<script src="{{ asset(config('app.asset_admin_path') . '/js/config/location/import-location.js') }}"></script>
@endpush