<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::inRandomOrder()->paginate(12);
        return view('welcome', compact('videos', 'movielist'));
    }
}
