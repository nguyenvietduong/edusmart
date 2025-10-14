@extends('layouts.admin')

@section('adminContent')
<div class="container-fluid">
    @include('admin.component.breadcrumb', [
        'title' => 'Nhật ký hoạt động',
        'items' => [
        'Cấu Hình' => null,
        'Công Việc' => null,
        'Nhật ký hoạt động' => null,
        ]
    ])

    <div class="row">
        <div class="row">
            <!--end col-->
            @include('admin.account.activityLog.table')
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
@endsection