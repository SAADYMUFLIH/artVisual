<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index_album()
    {
        return view('album.detailalbum');
    }

    public function index_create()
    {
        return view('album.createalbum');
    }

    public function create_album(Request $request)
    {
          // Validasi data yang dikirimkan
          $validated = $request->validate([
            'nama_album' => 'required|string',
            'desc' => 'nullable|string',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        // Simpan foto ke dalam penyimpanan Laravel
        $path = $request->file('photo')->store('photos', 'public');

        $album = Album::create([
            'user_id' => auth()->id(), // Ambil ID pengguna yang sedang login
            'nama_album' => $validated['nama_album'],
            'desc' => $validated['desc'],
            'photo' => $path, // Simpan foto ke dalam direktori 'photos'
        ]);

        // Redirect pengguna ke halaman yang sesuai setelah foto berhasil disimpan
        return redirect()->route('profile')->with('success', 'Album created successfully.');
    }

    public function hapus_album($id)
    {
         // Cari album berdasarkan ID
         $album = Album::find($id);

         // Jika album tidak ditemukan, kembalikan response not found
         if (!$album) {
             return response()->json(['message' => 'Album not found'], 404);
         }
 
         // Hapus album
         $album->delete();
 
        // Redirect pengguna ke halaman yang sesuai setelah foto berhasil disimpan
        return redirect()->route('profile')->with('success', 'Album Delete successfully.');
    }
}
