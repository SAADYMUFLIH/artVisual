<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use App\Models\User;
use App\Models\Album;
use App\Models\Report;
use App\Models\Komentar;
use App\Models\ReportPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExploreController extends Controller
{
    public function index_explore()
    {
        $photos = Foto::all();
        return view('explore.explore', compact('photos'));
    }

    public function search(Request $request)
    {
        $search = $request->input('search');

        $photos = Foto::where('judul_foto', 'like', '%' . $search . '%')->get();
        $users = User::where('username', 'like', '%' . $search . '%')->get();
        return view('explore.explore', compact('photos', 'users', 'search'));
    }

    public function show_foto($id)
    {
        $foto = Foto::findOrFail($id);
        $reports = Report::all();

        if ($foto->album) {
            $user = $foto->album->user;

            if ($user) {
                $userName = $user->username;
                $userProfileImage = $user->image;
            }
        }

        $komentar = $foto->komentar;
        
        return view('explore.detailfoto', compact('foto', 'user','userName', 'userProfileImage','komentar','reports'));
    }

    public function storeKomentar(Request $request)
    {
        $request->validate([
            'foto_id' => 'required|exists:foto,id',
            'isi_komentar' => 'required|string|max:255',
        ]);

        $comment = new Komentar();
        $comment->foto_id = $request['foto_id'];
        $comment->user_id = auth()->user()->id;
        $comment->isi_komentar = $request['isi_komentar'];
        $comment->save();
        // dd($comment);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function like(Request $request)
    {
        $request->validate([
            'foto_id' => 'required|exists:foto,id',
        ]);

        $userId = Auth::id();
        $fotoId = $request->foto_id;

        $existingLike = Like::where('user_id', $userId)
            ->where('foto_id', $fotoId)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            $message = 'Photo unliked successfully.';
        } else {
            Like::create([
                'user_id' => $userId,
                'foto_id' => $fotoId,
            ]);
            $message = 'Photo liked successfully.';
        }

        return redirect()->back()->with('success', $message);
    }

    public function laporFoto(Request $request, $foto_id) 
    {
        $request->validate([
            'report_id' => 'required|exists:reports,id',
        ]);

        // Dapatkan report berdasarkan report_id yang dipilih
        $report = Report::findOrFail($request->report_id);

        $reportPhoto = new ReportPhoto();
        $reportPhoto->foto_id = $foto_id;
        $reportPhoto->keterangan = $report->report_type; 
        $reportPhoto->save();

        return back()->withInput()->with('success', 'Foto Berhasil Di laporkan');
    }
}
