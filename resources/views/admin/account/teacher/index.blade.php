@extends('layouts.admin')

@section('adminContent')
<div class="container-fluid">
    @include('admin.component.breadcrumb', [
        'title' => 'Giáo viên',
        'items' => [
        'Hệ thống' => null,
        'Người dùng' => null,
        'Giáo viên' => null,
        ]
    ])

    <div class="row">
        <div class="row">
            <!--end col-->
            @include('admin.account.teacher.table')
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
@endsection