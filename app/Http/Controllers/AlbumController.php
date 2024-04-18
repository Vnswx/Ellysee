<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumController extends Controller
{
    public function index()
    {
        return view('Nav-Point.Albums.album');
    }

    public function store(Request $request)
    {
        $request->validate([
            'namaalbum' => 'required',
            'deskripsi' => 'required',
        ]);

        $album = Album::create([
            'namaalbum' => $request->namaalbum,
            'deskripsi' => $request->deskripsi,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('home')->with('success', 'Album berhasil dibuat.');
    }
}
