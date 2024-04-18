<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Models\Comment;

class PDetailController extends Controller
{
    public function index(Photo $photo)
    {
        return view('Nav-Point.Photos.detail-photo', compact('photo'));
    }
}
