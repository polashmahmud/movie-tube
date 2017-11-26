@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9 col-sm-6">
            <div class="video-show">
                <iframe width="100%" height="500" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <h6>নতুন মুভি</h6>
            <hr>
            @foreach($newmovies as $movie)
            <div class="video-show">
                <iframe width="100%" height="105" src="{{ $movie->url }}" frameborder="0" allowfullscreen></iframe>
                <p><a href="{{ route('video.show', $movie->id) }}">{{ $movie->name }}</a></p>
            </div>
            @endforeach
        </div>
    </div>
    <h4 class="mt-3">{{ $video->name }}</h4>
    <p>
        {!!html_entity_decode($video->description)!!}
    </p>
    <hr>
    <div class="row">
        <div class="col">
            <div class="fb-comments" data-href="http://movie-tube.tk/video/{{ $video->id }}" data-numposts="10"></div>
        </div>
        
        <div class="col">
        @auth    
            <p><strong>রেটিংঃ</strong> <span>@if(isset($rate)) আপনি <span class="bn">{{ $rate->rate }}</span> রেটিং দিয়েছেন, পরিবর্তন করুন @else মুভিটির রেটিং দিন @endif</span> </p> 
            <form action="{{ route('rate.store') }}" method="post">
            {{ csrf_field() }}
            <input type="text" name="video_id" value="{{ $video->id }}" hidden>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="rate" id="inlineRadio1" value="2" checked> ২
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="4"> ৪
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="rate" id="inlineRadio1" value="6"> ৬
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="rate" id="inlineRadio2" value="8"> ৮
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <input class="form-check-input" type="radio" name="rate" id="inlineRadio1" value="10"> ১০
              </label>
            </div>
            <div class="form-check form-check-inline">
              <label class="form-check-label">
                <button type="submit" class="btn btn-light btn-sm">রেটিং</button>
              </label>
            </div>
            </form>
            <hr>
        @endauth
        <div class="fb-share-button" data-href="http://movie-tube.tk/video/{{ $video->id }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmovie-tube.tk%2Fvideo%2F1&amp;src=sdkpreparse">Share</a></div>
        <hr>
        
        <div class="row">
            @foreach($viewrelative as $movie)
            <div class="col-md-6 col-sm-12">
                <div class="video-show">
                    <iframe width="100%" height="100" src="{{ $movie->url }}" frameborder="0" allowfullscreen></iframe>
                    <p><a href="{{ route('video.show', $movie->id) }}">{{ $movie->name }}</a></p>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
@endsection

