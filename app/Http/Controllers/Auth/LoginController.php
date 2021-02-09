<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function view() {
        return view('auth.login');
    }
    
    public function login(Request $request) {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if (!auth()->attempt($request->only('email', 'password')))
            return back()->with('login_error', __('website.error-login'));
        
        return back();
    }
}
