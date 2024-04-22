<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\ReportPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    public function showReport()
    {
        $reportPhotos = ReportPhoto::with('photo')->get();
        return view('admin.report.report', compact('reportPhotos'));
    }

    public function deleteReportPhoto($id)
    {
        $reportPhoto = ReportPhoto::find($id);
        if (!$reportPhoto) {
            return redirect()->back()->with('error', 'Report photo not found.');
        }

        // Ambil ID foto yang terkait
        $fotoId = $reportPhoto->foto_id;

        // Hapus semua foto yang terkait dengan report photo
        Foto::where('id', $fotoId)->delete();

        // Hapus ReportPhoto
        $reportPhoto->delete();

        return redirect()->back()->with('success', 'Report photo and associated photos deleted successfully.');
    }

    
}
