<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Photo;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;

class HomeController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('Nav-Point.index', compact('photos'));
    }

    public function search(Request $request)
{
    $search = $request->input('search');

    $photos = Photo::where('judulfoto', 'like', '%' . $search . '%')->get();
    $users = User::where('name', 'like', '%' . $search . '%')->get();
    return view('Nav-Point.search', compact('photos', 'users', 'search'));
}


    public function showPhoto($encryptedId)
    {
        $id = Crypt::decrypt($encryptedId);
        $photo = Photo::findOrFail($id);

        $relatedPhotos = $this->getRelatedPhotos($photo);

        $userName = null;
        $userProfileImage = null;
        if ($photo->album) {
            $user = $photo->album->user;
            if ($user) {
                $userName = $user->name;
                $userId = $user->id;
                $userProfileImage = $user->profile_image;
            }
        }

        $comments = $photo->comments;
        $currentTime = Carbon::now();
        foreach ($comments as $comment) {
            $comment->formatted_time = $this->formatCommentTime($comment->created_at, $currentTime);
        }

        $totalComments = $photo->comments->count();
        $totalLikes = $photo->likes()->count();

        return view('Nav-Point.Photos.detail-photo', compact('photo', 'userName', 'userProfileImage', 'comments', 'totalComments', 'totalLikes', 'relatedPhotos', 'userId'));
    }

    private function getRelatedPhotos($photo)
    {
        return Photo::where('category', $photo->category)
            ->where('id', '!=', $photo->id)
            ->get();
    }

    public function showRelatedPhoto($encryptedUserId)
    {
        $id = Crypt::decrypt($encryptedUserId);
        $photo = Photo::findOrFail($id);

        $user = $photo->album->user;

        $userName = $user->name;
        $userProfileImage = $user->profile_image;

        $relatedPhotos = $this->getRelatedPhotos($photo);

        $relatedComments = $photo->comments;
        $relatedLikes = $photo->likes()->count();

        $comments = $photo->comments;
        $currentTime = Carbon::now();
        foreach ($comments as $comment) {
            $comment->formatted_time = $this->formatCommentTime($comment->created_at, $currentTime);
        }

        return view('Nav-Point.Profile.user-comment-profile', compact('photo', 'relatedPhotos', 'relatedComments', 'relatedLikes', 'userName', 'userProfileImage', 'comments'));
    }


    public function formatCommentTime($time, $currentTime)
    {
        $commentTime = $time->diff($currentTime);

        if ($commentTime->days > 0) {
            if ($commentTime->days == 1) {
                return 'Yesterday';
            } elseif ($commentTime->days > 6) {
                return $time->format('Y-m-d');
            } else {
                return $commentTime->days . ' days ago';
            }
        } elseif ($commentTime->h > 0) {
            return $commentTime->h . ' hours ago';
        } elseif ($commentTime->i > 0) {
            return $commentTime->i . ' minutes ago';
        } else {
            return 'Just now';
        }
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
            'komentar' => 'required|string|max:255',
        ]);

        $comment = new Comment();
        $comment->photo_id = $request->photo_id;
        $comment->user_id = auth()->user()->id;
        $comment->komentar = $request->komentar;
        $comment->save();
        // dd($comment);

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function like(Request $request)
    {
        $request->validate([
            'photo_id' => 'required|exists:photos,id',
        ]);

        $userId = Auth::id();
        $photoId = $request->photo_id;

        $existingLike = Like::where('user_id', $userId)
            ->where('photo_id', $photoId)
            ->first();

        if ($existingLike) {
            $existingLike->delete();
            $liked = false;
        } else {
            Like::create([
                'user_id' => $userId,
                'photo_id' => $photoId,
            ]);
            $liked = true;
        }

        $totalLikes = Like::where('photo_id', $photoId)->count();
        return response()->json([
            'liked' => $liked,
            'totalLikes' => $totalLikes
        ]);
    }

    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        dd($user);
        return view('Nav-Point.Profile.user-comment-profile', compact('user'));
    }


}
