@extends('layouts.default')
@section('content')
<div id="create-thread-view" class="forum-item-list">
	<h1>@lang('website.thread-new')</h1>
	
	<div class="breadcrumb">
		<a href="{{ route('subforums') }}">@lang('website.subforums')</a> <span class="ml-2 mr-2">&gt;</span> <a href="{{ route('subforum', ['subforum' => $subforum]) }}">{{$subforum->name}}</a>
	</div>
	
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	
	<form id="create-thread-form" action="{{ route('create-thread', ['subforum' => $subforum]) }}" method="post">
		@csrf
		<div id="register-form-title" class="register-form-field">
			<label for="title">@lang('website.thread-title')</label>
			<input type="text" id="title" class="form-control" name="title" required>
		</div>
		@if(!empty($error_title))
    	<p class="text-danger">{{ $error_title }}</p>
    	@endif
    	
		<div id="register-form-content" class="register-form-field">
    		<label for="content">@lang('website.thread-content')</label>
    		<textarea id="content" name="content" class="form-control" rows="10" required></textarea>
    	</div>
    	@if(!empty($error_content))
    	<p class="text-danger">{{ $error_content }}</p>
    	@endif
		<input type="submit" class="btn btn-lg btn-info submit-form" value="{{ trans('website.send') }}">
	</form>
</div>
@endsection