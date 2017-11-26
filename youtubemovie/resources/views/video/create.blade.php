@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6">
			<h6>নতুন মুভি যুক্ত করার ফরম</h6>
			<hr>
			<div class="video-form">
				<form action="{{ route('video.store') }}" method="post">
					{{ csrf_field() }}
				  <div class="form-group {{ $errors->has('url') ? ' has-error' : '' }}">
				    <label for="youTubeUrl">ইউটিউব ইউআরএল</label>
				    @if ($errors->has('url'))
                        <span class="help-block">
                            <strong style="color: red;">{{ $errors->first('url') }}</strong>
                        </span>
                    @endif
				    <div class="row">
				    <div class="col-md-7">
				    	<input type="text" class="form-control" id="youTubeUrl" placeholder="https://www.youtube.com/watch?v=" disabled>
				    </div>
				    <div class="col-md-5">
				   		<input type="text" name="url" class="form-control" id="youTubeUrl" placeholder="ইউটিউব ইউআরএল">
				    </div>
				    </div>
				  </div>
				  <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
				    <label for="youTubeName">মুভির নাম</label>
				    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong style="color: red;">{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
				    <input type="text" name="name" class="form-control" id="youTubeName" placeholder="মুভির নাম">
				  </div>
				  <div class="form-group">
				    <label for="youTubeDescription">মুভির বর্ননা</label>
				    <textarea name="description" id="editor" class="form-control" cols="30" rows="10"></textarea>
				  </div>
				    <div class="form-group{{ $errors->has('catagory') ? ' has-error' : '' }}">
				      <label for="catagory">ক‍্যাটাগরি</label>
					    @if ($errors->has('catagory'))
	                        <span class="help-block">
	                            <strong style="color: red;">{{ $errors->first('catagory') }}</strong>
	                        </span>
	                    @endif
				      <select id="catagory" class="form-control" name="catagory">
				        <option selected>পছন্দ করুন মুভির ক‍্যাটাগরি</option>
				        <option value="1">বাংলা</option>
				        <option value="2">হিন্দি</option>
				        <option value="3">ইংরেজি</option>
				        <option value="4">তামিল</option>
				        <option value="5">তেলেগু</option>
				      </select>
				    </div>
				  <button type="submit" class="btn btn-primary">নতুন মুভি</button>
				</form>
			</div>
		</div>
		<div class="col-md-6">
			<h6>ব‍্যবহার বিধি</h6>
			<hr>
			<ul>
				<li class="mb-2">ইউটিউব URL ব‍্যবহার করার জন‍্য পুরো URL ব‍্যবহার না করে শুধু মাত্র <kbd>watch?v=</kbd> এর পর যে অংশটুকু আছে তা ব‍্যবহার করুন। উদাহরন স্বরুপ লাল রং করা অংশটুকুই ব‍্যবহার করুন। https://www.youtube.com/watch?v=<span style="color: red;">DzBa71rNJ5YM</span></li>
				<li class="mb-2">মুভির নাম ইংরেজিতে অথবা বাংলাতে লিখুন।</li>
				<li class="mb-2">মুভির বর্ণনা এর ফিল্ডে মুভি সম্পর্কে আপনার মতামত অথবা বর্ণনা লিখুন, এটা আবশ‍্যিক নয়।</li>
				<li class="mb-2">ক‍্যাটাগরি ফিন্ডে মুভিটা কোন ভাষায় তা সিলেট করুন।</li>
			</ul>
		</div>
	</div>
</div>
@endsection

@section('footer-script')
<script src="{{ asset("js/ckeditor.js") }}"></script>

<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
@endsection
