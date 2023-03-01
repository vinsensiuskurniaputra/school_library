<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if(\Auth::user()->role == User::ROLES['Admin'] || \Auth::user()->role == User::ROLES['Librarian']){
                return redirect()->intended(route('admin.home.index'));
            } else{
                return redirect()->intended(route('home.index'));
            }
        }
        return back()->with('error', 'Anda Gagal Login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
