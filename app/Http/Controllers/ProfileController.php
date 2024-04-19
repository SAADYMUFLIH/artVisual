<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function index_profile()
    {
        // Mengambil semua album dari database
        $user = auth()->user();
        $album = $user->albums;
    
        // Pastikan $albums bukan null sebelum digunakan
        if ($album) {
            return view('profile.profile', compact('album', 'user'));
        } else {
            // Jika $albums null, berikan pesan atau tindakan lain sesuai kebutuhan
            return view('profile.profile')->with('error', 'Tidak ada album yang tersedia.');
        }
    }
    

    public function editProfile()
    {
        return view('profile.editProfile');
    }

    public function updateProfile(Request $request)
    {
        //validasi
        $request->validate([
            'username' => 'required|unique:users|max:255',
            'email' => 'required|email|unique:users',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'nama_lengkap' => 'required|max:255',
            'alamat' => 'required|max:255',
        ]);

        $user = Auth::user();

        $user->username = $request->username;
        $user->email = $request->email;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->alamat = $request->alamat;
        if ($request->hasFile('image')) {
            if ($user->image !== 'assets/profile/profile_default.jpg') {
                Storage::delete('public/' . $user->image);
            }
    
            $imagePath = $request->file('image')->store('public/image');
            $user->image = str_replace('public/', '', $imagePath);
        }
    
        // dd($user);

        $user->save();

        return redirect()->route('profile')->with('success', 'Ubah Profile berhasil');
    }

    public function show_album(Album $album ,$id)
    {
        $user = auth()->user();
        $album = Album::findOrFail($id);
        if ($album->user_id !== $user->id){
            'dsad';
        }
        $photos = $album->foto;
        return view('album.detailalbum', compact('user', 'album', 'photos'));
    }
}
