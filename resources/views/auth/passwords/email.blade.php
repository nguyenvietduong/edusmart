@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
        <form method="POST" action="{{ route('password.email') }}" class="bg-white shadow-sm p-5 rounded">
            @csrf

            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/2919/2919600.png" alt="Reset Password Icon" class="img-fluid" style="max-width: 80px;">
            </div>

            <h3 class="text-center text-dark fw-bold mb-3">Quên mật khẩu?</h3>
            <p class="text-muted text-center mb-4">Nhập email để đặt lại mật khẩu.</p>

            @if (session('status'))
                <div class="alert alert-success text-center">
                    {{ session('status') }}
                </div>
            @endif

            <div class="form-floating mb-3">
                <input type="email" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" placeholder="name@example.com"
                       value="{{ old('email') }}" required autofocus>
                <label for="email">Địa chỉ Email</label>
                @error('email')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-grid gap-2 d-md-flex justify-content-md-center mt-4">
                <button type="submit" class="btn btn-primary px-4">Gửi liên kết</button>
                <a href="{{ route('login') }}" class="btn btn-outline-secondary px-4">Đăng nhập</a>
            </div>
        </form>
    </div>
</div>
@endsection