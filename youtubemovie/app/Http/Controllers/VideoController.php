<?php

namespace App\Http\Controllers;

use App\Rate;
use App\Video;
use Auth;
use Illuminate\Http\Request;


class VideoController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::inRandomOrder()->paginate(12);
        return view('welcome', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('video.create', compact('movielist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'url' => 'required',
            'name' => 'required',
            'catagory' => 'required',
        ]);

        $video = new Video;
        $video->user_id = Auth::id();
        $video->url = 'https://www.youtube.com/embed/' . $request->url;
        $video->name = $request->name;
        $video->catagory =  $request->catagory;
        $video->description = $request->description;
        $video->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        $rate = Rate::where([
                       'user_id' => Auth::id(),
                       'video_id' => $video->id,
                ])->first();
        $newmovies = Video::latest()->take(3)->get();
        $viewrelative = Video::where('catagory', $video->catagory)->inRandomOrder()->take(8)->get();
        $movielist = \App\Video::all();
        return view('video.show', compact('video', 'rate', 'newmovies', 'viewrelative', 'movielist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
