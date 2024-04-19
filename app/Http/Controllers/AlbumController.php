<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\User;
use App\Exports\AlbumsExport;
use Maatwebsite\Excel\Facades\Excel;

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
    public function exportAlbumToExcel()
    {
        $username = auth()->user()->name;
        $userId = User::where('name', $username)->value('id');
        $albumIds = Album::where('user_id', $userId)->pluck('id')->toArray();

        return Excel::download(new AlbumsExport($albumIds), 'albums.xlsx');
    }
}
