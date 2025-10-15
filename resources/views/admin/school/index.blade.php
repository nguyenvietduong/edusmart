@extends('layouts.admin')

@section('adminContent')
<div class="container-fluid">
    @include('admin.component.breadcrumb', [
        'title' => 'Khu vực hành chính',
        'items' => [
        'Cấu Hình' => null,
        'Công Việc' => null,
        'Khu vực hành chính' => null,
        ]
    ])

    <div class="row">
        <div class="row">
            <!--end col-->
            @include('admin.school.detail')
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
@endsection