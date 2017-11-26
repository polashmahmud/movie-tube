<?php

namespace App\Http\Controllers;

use App\Helper;
use App\Rate;
use App\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search($slug)
    {
        $id = Helper::getNumberCatagory($slug);

    	$videos = Video::where('catagory', $id)->inRandomOrder()->paginate(12);

    	return view('search.index', compact('videos', 'movielist'));
    }

    public function searchTop()
    {
    	$videos = Video::select(
                    DB::raw('videos.*, 
                        SUM(rates.rate) / Count(rates.rate) as rate'
                    ))
                 ->leftJoin('rates', 'rates.video_id', '=', 'videos.id')
                 ->groupBy('videos.id')
                 ->orderBy('rate', 'desc')
                 ->paginate(12);

        return view('search.index', compact('videos'));
    }

    public function searchMovie(Request $request)
    {
        $search = $request->search;
        $videos = Video::where('name', 'LIKE', '%'.$search.'%')->paginate(12);

        return view('search.index', compact('videos'));
    }

}
