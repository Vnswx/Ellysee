<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ViolationType;

class ViolationTypeController extends Controller
{
    public function index()
    {
        $violationTypes = ViolationType::all();
        return view('Layout.Admin.violation', compact('violationTypes'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:violation_types,name|max:255',
        ]);

        ViolationType::create($request->all());

        return redirect()->route('Layout.Admin.dashboard')
                         ->with('success', 'Jenis pelanggaran berhasil ditambahkan.');
    }
}
