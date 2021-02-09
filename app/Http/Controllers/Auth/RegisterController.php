<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function view() {
        return view('auth.register');
    }
    
    public function register(Request $request) {
        Session::flash('fromRegister', true);
        
        $this->validate($request, [
            'name' => 'required|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_role' => 3
        ]);
        
        return redirect()->route('subforums');
    }
}
