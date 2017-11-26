<div class="header-section mt-5">
      <div class="container">
        <div class="row">
          <div class="col-md-5">
            <div class="logo">
              <a href="{{ url('/') }}"><h1>মুভি টিউব</h1></a>
            </div>
          </div>
          <div class="col-md-4">
            <div class="search-area">
              {{-- <input type="text" placeholder="খুঁজুন... "> --}}
                
              {{-- <select class="js-example-basic-single" name="movie">
                @foreach($movielist as $list)
                <option value="{{ $list->id }}">{{ $list->name }}</option>
                @endforeach
              </select> --}}
              <form class="form-inline" action="{{ url('search-movie') }}" method="post"">
                {{ csrf_field() }}
                <div class="form-group" style="width: 280px; margin-right: 8px;">
                  <label for="search" class="sr-only">Search</label>
                  <input type="text" name="search" class="form-control" id="search" placeholder="খুঁজুন...">
                </div>
                <button type="submit" class="btn btn-secondary btn-sm">Go</button>
              </form>
            </div>
          </div>
          <div class="col-md-3">
            <span class="float-right">
            @if (Route::has('login'))
                @auth
                <div class="btn-group">
                  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @if(isset(Auth::user()->avatar))
                    <img class="rounded-circle" src={{ Auth::user()->avatar }} alt="" style="width: 35px; height: 35px; margin-right: 5px;"> {{ Auth::user()->name }} 
                    @else
                    <img class="rounded-circle" src={{ asset("img/user.png") }} alt="" style="width: 35px; height: 35px; margin-right: 5px;"> {{ Auth::user()->name }}
                    @endif
                  </button>
                  <div class="dropdown-menu">
                    {{-- <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a> --}}
                    {{-- <a class="dropdown-item" href="#"><i class="fa fa-cogs"></i> Setting</a> --}}
                    <a class="dropdown-item" href="{{ route('video.create') }}"><i class="fa fa-plus"></i> নতুন মুভি যুক্ত করুন</a>
                    <a class="dropdown-item" href="{{ url('my_favorites') }}"><i class="fa fa-star"></i> পছন্দের তালিকা</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out"></i> প্রস্থান
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                  </div>
                </div>
                @else
                    <a class="btn btn-light" href="{{ url('login') }}"><i class="fa fa-sign-in"></i></a>
                    <a class="btn btn-secondary" href="{{ url('register') }}"><i class="fa fa-user-plus"></i></a>
                    <a class="btn btn-primary" href="{{ url('login/facebook') }}"><i class="fa fa-facebook"></i></a>
                @endauth
            @endif
            </span>
          </div>
        </div>
        <hr>
      </div>
    </div>

    <div class="header-info-section mb-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h6 class="pt-2">ভাষাঃ 
              <a href="{{ url('search/bangla') }}" class="">বাংলা <span class="badge badge-light bn">{{ \App\Helper::getVideoCount(1) }}</span></a>,  
              <a href="{{ url('search/hindi') }}" class="">হিন্দি <span class="badge badge-light bn">{{ \App\Helper::getVideoCount(2) }}</span></a>,  
              <a href="{{ url('search/english') }}" class="">ইংরেজি <span class="badge badge-light bn">{{ \App\Helper::getVideoCount(3) }}</span></a>,  
              <a href="{{ url('search/tamil') }}" class="">তামিল <span class="badge badge-light bn">{{ \App\Helper::getVideoCount(4) }}</span></a>,  
              <a href="{{ url('search/telugu') }}" class="">তেলুগু <span class="badge badge-light bn">{{ \App\Helper::getVideoCount(5) }}</span></a>,  
              <a href="{{ route('searchTop') }}" class="">জনপ্রিয়</a>
            </h6>
          </div>
          <div class="col-md-4">
            <h6 class="text-right pt-2 bn">মোট মুভির সংখ্যাঃ {{ \App\Video::count() }}</h6>
          </div>
        </div>
        <hr>
      </div>
    </div>