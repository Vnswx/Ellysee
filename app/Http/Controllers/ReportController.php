<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViolationType;
use App\Models\Report;
use App\Models\Photo;


class ReportController extends Controller
{
    public function index()
    {
        $violationTypes = ViolationType::all();
        $reports = Report::with('violationTypes')->get();

        // dd($reports);
        return view('Layout.Admin.dashboard', compact('violationTypes', 'reports'));
    }


    // Menyimpan laporan yang dilakukan oleh pengguna
    public function store(Request $request)
    {
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
            'reason' => 'required',
            'violation_type_id' => 'required|exists:violation_types,id',
        ]);

        Report::create([
            'photo_id' => $request->photo_id,
            'reason' => $request->reason,
            'violation_type_id' => $request->violation_type_id,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil disimpan.');
    }

    public function approve(Report $report)
    {
        $photo = Photo::find($report->photo_id);
        if ($photo) {
            $photo->delete();
        }

        $report->delete();

        return view('Layout.Admin.dashboard')->with('success', 'Foto telah dihapus.');
    }

    public function reject(Report $report)
    {
        $report->delete();

        return view('Layout.Admin.dashboard')->with('success', 'Laporan telah ditolak.');
    }

}
