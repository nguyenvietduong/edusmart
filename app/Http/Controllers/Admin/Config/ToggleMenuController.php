<?php

namespace App\Http\Controllers\Admin\Config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ToggleMenuController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'toggleMenu' => 'required|in:default,collapsed',
        ]);
    
        session(['menu' => $request->input('toggleMenu')]); // Store menu in session
    
        return response()->json(['success' => true]);
    }    
}