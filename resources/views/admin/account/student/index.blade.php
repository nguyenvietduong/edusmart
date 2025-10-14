@extends('layouts.admin')

@section('adminContent')
<div class="container-fluid">
    @include('admin.component.breadcrumb', [
        'title' => 'Học sinh',
        'items' => [
        'Cấu Hình' => null,
        'Công Việc' => null,
        'Học sinh' => null,
        ]
    ])

    <div class="row">
        <div class="row">
            <!--end col-->
            @include('admin.account.student.table')
            <!--end col-->
        </div>
        <!--end row-->
    </div>
</div>
@endsection