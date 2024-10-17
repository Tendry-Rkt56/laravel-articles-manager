<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class SecurityController extends Controller
{

    public function loginView()
    {
        return view('app.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('app.home'));
        }
        return to_route('auth.login')->with('danger', 'Invalid credentials');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }

}
