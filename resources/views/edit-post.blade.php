@extends('layouts.default')
@section('content')
<div id="edit-post-view" class="forum-item-list">
	<h1>@lang('website.post-edit')</h1>
	
	<div class="breadcrumb">
		<a href="{{ route('subforums') }}">@lang('website.subforums')</a> 
		<span class="ml-2 mr-2">&gt;</span> <a href="{{ route('subforum', ['subforum' => $subforum]) }}">{{$subforum->name}}</a>
		<span class="ml-2 mr-2">&gt;</span> <a href="{{ route('thread', ['subforum' => $subforum, 'thread' => $thread]) }}">{{$thread->title}}</a>
	</div>
	
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	
	<form id="edit-post-form" action="{{ route('edit-post', ['subforum' => $subforum, 'thread' => $thread, 'post' => $post]) }}" method="post">
		@method('PUT')
		@csrf
		<div id="register-form-title" class="register-form-field">
			<label for="title">@lang('website.thread-title')</label>
			<input type="text" id="title" class="form-control" name="title" value="{{ $post->title }}" required>
		</div>
		@if(!empty($error_title))
    	<p class="text-danger">{{ $error_title }}</p>
    	@endif
    	
		<div id="register-form-content" class="register-form-field">
    		<label for="content">@lang('website.thread-content')</label>
    		<textarea id="content" name="content" class="form-control" rows="10" required>{{ $post->content }}</textarea>
    	</div>
    	@if(!empty($error_content))
    	<p class="text-danger">{{ $error_content }}</p>
    	@endif
		<input type="submit" class="btn btn-lg btn-info submit-form" value="{{ trans('website.send') }}">
	</form>
</div>
@endsection