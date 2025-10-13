<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ConfirmPasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Hiển thị form xác nhận mật khẩu
     */
    public function showConfirmForm()
    {
        return view('auth.passwords.confirm');
    }

    /**
     * Xác nhận mật khẩu và chuyển hướng tiếp theo
     */
    public function confirm(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        if (!Hash::check($request->password, $request->user()->password)) {
            return back()->withErrors([
                'password' => 'Mật khẩu không chính xác.',
            ]);
        }

        // Đánh dấu đã xác nhận mật khẩu
        $request->session()->put('auth.password_confirmed_at', time());

        return redirect()->intended($this->redirectPath());
    }

    /**
     * Xác định nơi redirect sau xác nhận
     */
    protected function redirectPath()
    {
        return ''; // Đổi theo ý bạn
    }
}