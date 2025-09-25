<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user = Auth::user();

            // Bypass untuk logout
            if ($request->route()->getName() === 'logout') {
                return $next($request);
            }

            if ($user) {
                if ($user->isAdmin()) {
                    return redirect()->route('admin.dashboard');
                }

                if ($user->isDirector()) {
                    return redirect()->route('director.dashboard');
                }

                if ($user->isKaryawan()) {
                    return redirect()->route('karyawan.dashboard');
                }
            }

            return $next($request);
        });
    }
    
    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->password)) {
            $request->session()->regenerate();

            $user = Auth::user();

            // Perlakuan khusus admin
            if ($user->isAdmin()) {
                return redirect()->route('admin.dashboard');
            }

            // Redirect berdasarkan role
            if ($user->isDirector()) {
                return redirect()->route('director.dashboard');
            } elseif ($user->isKaryawan()) {
                return redirect()->route('karyawan.dashboard');
            }

            // Default redirect jika role tidak dikenali
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
