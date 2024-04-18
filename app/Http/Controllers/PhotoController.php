<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;


class PhotoController extends Controller
{
    public function index(){
        $albums = Auth::user()->albums;
        return view('Nav-Point.Photos.photo', ['albums' => $albums]);
    }

    public function store(Request $request)
    {
        $albums = Auth::user()->albums;

        $request->validate([
            'judulfoto' => 'required',
            'deskripsifoto' => 'required',
            'lokasifile' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
            'category' => 'required|string|max:255',
            'album_id' => [
                'required',
                function ($attribute, $value, $fail) use ($albums) {
                    if (!$albums->contains('id', $value)) {
                        $fail('The selected album is invalid.');
                    }
                },
            ],
        ]);
        
        $lokasiFile = $request->file('lokasifile')->store('public/photos');
        $photo = new Photo();
        $photo->judulfoto = $request->judulfoto;
        $photo->deskripsifoto = $request->deskripsifoto;
        $photo->lokasifile = $lokasiFile;
        $photo->album_id = $request->album_id;
        $photo->category = $request->category;
        $photo->save();
        
        return redirect()->route('home')->with('success', 'Foto berhasil ditambahkan.');
    }
}
