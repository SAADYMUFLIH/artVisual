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
    
        if (Auth::attempt($data)) {
            $request->session()->regenerate();
    
            // Cek apakah pengguna adalah admin atau bukan
            if (Auth::user()->isAdmin()) {
                return redirect()->route('admin.dashboard'); // Mengarahkan ke dashboard admin
            } else {
                return redirect()->route('explore'); // Mengarahkan ke dashboard admin
            }
        } else {
            // Tampilkan pesan kesalahan jika autentikasi gagal
            return back()->with('error', 'Username atau password salah.');
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('explore')->with('success', 'You have been logged out!');
    }


    // //admin 
    // public function adminLogin()
    // {
    //     return view('admin.login.login');
    // }

    // public function adminLoginStore(Request $request)
    // {
    //     $credentials = $request->only('username', 'password');

    //     if (Auth::attempt($credentials)) {
    //         // Otentikasi berhasil, periksa apakah pengguna adalah admin
    //         if (Auth::user()->isAdmin()) {
    //             // Jika pengguna adalah admin, arahkan ke dashboard admin
    //             return redirect()->route('admin.dashboard');
    //         } else {
    //             // Jika pengguna bukan admin, arahkan kembali ke halaman login dengan pesan kesalahan
    //             return redirect()->route('admin.login.login')->with('error', 'Anda bukan admin.');
    //         }
    //     }

    //     // Otentikasi gagal, arahkan kembali ke halaman login dengan pesan kesalahan
    //     return redirect()->route('admin.login')->with('error', 'Username atau password salah.');
    // }

     
    public function dashboard()
    {
        // Pastikan hanya admin yang bisa mengakses halaman dashboard
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('admin.login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        // Jika admin, arahkan ke halaman dashboard admin
        return view('admin.dashboard.dashboard');
    }

    // public function adminLogout(Request $request)
    // {
    //     Auth::logout();

    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     return redirect()->route('home')->with('success', 'You have been logged out!');
    // }

    
    
}
