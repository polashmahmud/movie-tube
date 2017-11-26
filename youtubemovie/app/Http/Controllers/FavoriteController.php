<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{

    public function favoriteVideo($id)
	{
	    Auth::user()->favorites()->attach($id);
	    return back();
	}

	public function unFavoriteVideo($id)
	{
	    Auth::user()->favorites()->detach($id);
	    return back();
	}

	public function myFavorites()
	{
	    $videos = Auth::user()->favorites()->inRandomOrder()->paginate(12);
	    $movielist = \App\Video::all();

	    return view('search.index', compact('videos', 'movielist'));
	}
}
