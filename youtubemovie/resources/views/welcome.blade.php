@extends('layouts.app')

@section('content')
<div class="video-section">
  <div class="container">
    <div class="row">
      @forelse($videos as $video)
      <div class="col-md-4">
        <div class="video-area mb-5">
          <div class="video-thum mb-1">
            <iframe width="100%" height="180" src="{{ $video->url }}" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="video-content p-3">
            <h5><a href="{{ route('video.show', $video->id) }}">{{ $video->name }}</a></h5>
            <p class="time-area"><i class="fa fa-flag"></i> {{-- <a href="#">2017</a> | --}} <a href="{{ url('search', $video->catagory) }}">{{ \App\Helper::getCatagory($video->catagory) }}</a> {{-- <span class="float-right"><a href="#">Action</a>, <a href="#">Drama</a> --}}</span></p>
            <p>
              {{ str_limit(strip_tags($video->description), 100) }}
              {{-- {{ $video->description }} --}}
            </p>
          </div>
          <div class="read-more p-3" style="margin-bottom:30px;">
            <span class="float-right">
              <div class="fb-share-button" data-href="http://movie-tube.tk/video/{{ $video->id }}" data-layout="button_count" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmovie-tube.tk%2Fvideo%2F1&amp;src=sdkpreparse">Share</a></div>
              
              <a class="btn btn-light btn-small" href="{{ route('video.show', $video->id) }}">{{ \App\Helper::getRate($video->id) }} <i class="fa fa-star"></i></a> <a class="btn btn-light btn-small" href="{{ route('video.show', $video->id) }}"><span class="fb-comments-count ml-3" data-href="http://movie-tube.tk/video/{{ $video->id }}"></span> <i class="fa fa-comment"></i></a>
          </span>

            @if (Auth::check())
              <div class="panel-footer">
                @if($video->favorited() == 'true') 
                  <form action="{{ url('unfavorite', $video->id) }}" method="post">
                @else
                  <form action="{{ url('favorite', $video->id) }}" method="post">
                @endif
                {{ csrf_field() }}
                {{-- {{ $video->favorited() ? 'true' : 'false' }} --}}
                
                  @if($video->favorited() == 'true') 
                   <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-heart"></i></button>
                  @else
                    <button type="submit" class="btn btn-secondary btn-sm"><i class="fa fa-heart-o"></i></button>
                  @endif
                
                </form>
              </div>
            @endif
          </div>
        </div>
      </div>
      @empty
      <h2>কোন রেকর্ড পাওয়া যায় নাই! <i class="fa fa-exclamation-circle"></i></h2>
      @endforelse
    </div>
    <div class="pagination-area justify-content-center">
      {{ $videos->links('vendor.pagination.bootstrap-4') }}
    </div>
  </div>
</div>
@endsection