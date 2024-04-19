<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Album;
use App\Models\User;
use App\Models\Photo;
use Illuminate\Support\Facades\Crypt;



class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $albums = $user->albums;
        $totalAlbumsCount = $user->albums->count();
        foreach ($albums as $album) {
            $album->encrypted_id = Crypt::encrypt($album->id);
        }
        $totalPhotosCount = 0;
        foreach ($user->albums as $album) {
            $totalPhotosCount += $album->photos()->count();
        }
        $totalLikesCount = 0;

        foreach ($user->albums as $album) {
            foreach ($album->photos as $photo) {
                $totalLikesCount += $photo->likes()->count();
            }
        }

        $photos = auth()->user()->photos()->get(); 


        $isOwnProfile = auth()->check() && auth()->user()->id === $user->id;
        return view("Nav-Point.Profile.profile", compact('user', 'albums', 'isOwnProfile', 'totalAlbumsCount', 'totalPhotosCount', 'totalLikesCount', 'photos'));
    }

    public function viewProfile($username)
    {
        $user = User::where('name', $username)->firstOrFail();
        $albums = $user->albums;
        $totalAlbumsCount = $user->albums->count();
        foreach ($albums as $album) {
            $album->encrypted_id = Crypt::encrypt($album->id);
        }
        $totalPhotosCount = 0;
        foreach ($user->albums as $album) {
            $totalPhotosCount += $album->photos()->count();
        }
        $totalLikesCount = 0;

        foreach ($user->albums as $album) {
            foreach ($album->photos as $photo) {
                $totalLikesCount += $photo->likes()->count();
            }
        }
        $photos = $album->photos;
        
        $isOwnProfile = auth()->check() && auth()->user()->id === $user->id;
        return view("Nav-Point.Profile.profile", compact('user', 'albums', 'isOwnProfile', 'totalAlbumsCount', 'totalPhotosCount', 'totalLikesCount', 'photos'));
    }


    public function edit()
    {
        return view("Nav-Point.Profile.edit-profile");
    }

    public function showAlbum($encrypted_id)
    {
        $id = Crypt::decrypt($encrypted_id);
        $album = Album::findOrFail($id);
        if ($album->user_id !== auth()->user()->id) {
            abort(403);
        }
        $photos = $album->photos;
        return view('Nav-Point.Profile.profile-albums', compact('album', 'photos'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'namalengkap' => 'required',
            'alamat' => 'required',
            'profile_image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->namalengkap = $request->namalengkap;
        $user->alamat = $request->alamat;
        if ($request->hasFile('profile_image')) {
            if ($user->profile_image !== 'images/default_profile.jpg') {
                Storage::delete('public/' . $user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('public/profile_images');
            $user->profile_image = str_replace('public/', '', $imagePath);
        }

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

}
