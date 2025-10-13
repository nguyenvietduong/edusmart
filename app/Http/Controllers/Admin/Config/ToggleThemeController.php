<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToggleThemeController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'theme' => 'required|in:light,dark',
        ]);
    
        session(['theme' => $request->input('theme')]); // Store theme in session
    
        return response()->json(['success' => true]);
    }    
}