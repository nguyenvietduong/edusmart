@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center fw-bold">
                    Xác minh địa chỉ email
                </div>

                <div class="card-body p-4">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        Một liên kết xác minh mới đã được gửi đến email của bạn.
                    </div>
                    @endif

                    <p class="mb-3">
                        Trước khi tiếp tục, vui lòng kiểm tra email của bạn để xác minh tài khoản.
                    </p>

                    <p class="mb-3">
                        Nếu bạn không nhận được email,
                    </p>

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link px-0">
                            nhấn vào đây để gửi lại
                        </button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection