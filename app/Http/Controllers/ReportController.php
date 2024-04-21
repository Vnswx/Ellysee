<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViolationType;
use App\Models\Report;
use App\Models\Photo;
use Illuminate\Support\Facades\Auth;



class ReportController extends Controller
{
    public function index()
    {
        $violationTypes = ViolationType::all();
        $reports = Report::with('violationTypes')->get();

        // dd($reports);
        return view('Layout.Admin.dashboard', compact('violationTypes', 'reports'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
            'violation_type_id' => 'required|exists:violation_types,id',
        ]);
    
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthenticated'], 401);
        }
    
        try {
            $report = Report::create([
                'user_id' => Auth::id(),
                'photo_id' => $request->photo_id,
                'violation_type_id' => $request->violation_type_id,
            ]);
    
            if ($report) {
                $photo = Photo::find($request->photo_id);
                if ($photo) {
                    $photo->update(['reported' => true]);
                }
            }
    
            return response()->noContent();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to create report'], 500);
        }
    }

    public function approve(Report $report)
    {
        $photo = Photo::find($report->photo_id);
        if ($photo) {
            $photo->comments()->delete();
            $photo->likes()->delete();
            $photo->delete();
        }
        $report->delete();
        return redirect()->route('admin-index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function reject(Report $report)
    {
        $report->delete();
        return redirect()->route('admin-index')->with('success', 'Foto berhasil ditambahkan.');

    }

}
