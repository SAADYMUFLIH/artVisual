<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users',
            'nama_lengkap' => 'required|max:255',
            'alamat' => 'required|max:255',
        ]);

        $defaultImage = 'assets/profile/profile_default.jpg';

        $data['password'] = bcrypt($data['password']);
        $data['image'] = $defaultImage;

        // dd($data);

        User::create($data);

        return back()->withInput()->with('success', 'Registrasi berhasil');
    }
  
    public function login()
    {
        return view('auth.login');
    }

    public function loginStore(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|max:255',
            'password' => 'required',
        ]);
    
        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return back()->withInput()->with('success', 'Login berhasil');
        } else {
            if(Auth::check()) {
                return back()->with('error', 'Password salah.');
            } else {
                return back()->with('error', 'Username atau password salah.');
            }
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out!');
    }
}
