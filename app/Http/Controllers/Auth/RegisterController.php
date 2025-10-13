<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * Where to redirect users after successful register.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Display the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     */
    public function register(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'username' => ['required', 'string', 'max:50', 'unique:users'], // thêm username
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Tạo user mới
        $user = User::create([
            'username' => $request->username,
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Đăng nhập luôn cho user vừa đăng ký
        auth()->login($user);

        // Redirect về trang dashboard (hoặc home)
        return redirect()->intended(route('dashboard'));
    }
}
