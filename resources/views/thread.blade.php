@extends('layouts.default')
@section('content')
<div id="thread-view" class="forum-item-list">
	<h1>{{ $thread->title }}</h1>
	
	<div class="breadcrumb">
		<a href="{{ route('subforums') }}">@lang('website.subforums')</a> <span class="ml-2 mr-2">&gt;</span> <a href="{{ route('subforum', ['subforum' => $subforum]) }}">{{$subforum->name}}</a>
	</div>
	
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	
	<div class="badges">
		@if(!empty($thread->pinned))
		<!--<span title="{{__('website.thread-pinned')}}">&#x1F4CC;</span>-->
		<i class="fas fa-thumbtack forum-icon" title="{{__('website.thread-pinned')}}"></i>
		@endif 
		@if(!empty($thread->locked))
		<!--<span title="{{__('website.thread-locked')}}">&#x1F512;</span>-->
		<i class="fas fa-lock forum-icon" title="{{__('website.thread-locked')}}"></i>
		@endif 
	</div>
	
	<div id="thread-list" class="list-items">
		@auth
		<div id="thread-buttons" class="d-flex flex-row justify-content-between">
		@if((!$isBanned && !$thread->locked) || auth()->user()->id_role < 3)
    	<a class="btn btn-primary" href="{{ route('create-post', ['subforum' => $subforum->id, 'thread' => $thread]) }}">@lang('website.post-new')</a>
    	@endif
    	@if(auth()->user()->id_role === 1)
    	<form action="{{ route('switch-locked', ['subforum' => $subforum, 'thread' => $thread])}}" method="post">
    		@csrf
    		<input type="submit" class="btn btn-warning" value="@lang('website.actions-switch-locked')">
    	</form>
    	<form action="{{ route('switch-pinned', ['subforum' => $subforum, 'thread' => $thread])}}" method="post">
    		@csrf
    		<input type="submit" class="btn btn-success" value="@lang('website.actions-switch-pinned')">
    	</form>
    	@endif
    	@if($thread->creator == auth()->user()->id || auth()->user()->id_role === 1)
    	<form action="{{ route('delete-thread', ['subforum' => $subforum, 'thread' => $thread])}}" method="post">
    		@method('DELETE')
    		@csrf
    		<input type="submit" class="btn btn-danger" value="@lang('website.actions-delete-thread')">
    	</form>
    	@endif
    	</div>
    	@endauth
		@foreach($posts as $post)
		<div id="{{$post->id}}" class="forum-item thread-item">
			<div class="post-author">
				<p>{{$post->user_name}}</p>
				<p>@lang('website.post-number', ['post-number' => $post->user_posts])</p>
			</div>
			<div class="post-content">
    			<h5>{{$post->title}}</h5>
    			<p>{{$post->content}}</p>
    			<p>@lang('website.post-date', ['post-date' => $post->creation_date])</p>
    			@auth
    			<div class="d-flex flex-row justify-content-between">
    			@if($post->user_id === auth()->user()->id)
    			<form action="{{ route('edit-post', ['subforum' => $subforum, 'thread' => $thread, 'post' => $post])}}" method="get">
    				@csrf
    				<input type="submit" class="btn btn-warning" value="@lang('website.actions-edit')">
    			</form>
    			@endif
    			@if($post->user_id === auth()->user()->id || auth()->user()->id_role == 1)
    			<form action="{{ route('delete-post', ['subforum' => $subforum, 'thread' => $thread, 'post' => $post])}}" method="post">
    				@method('DELETE')
    				@csrf
    				<input type="submit" class="btn btn-danger" value="@lang('website.actions-delete')">
    			</form>
    			@endif
    			</div>
    			@endauth
			</div>
		</div>
		@endforeach
		<div class="float-right">
			{{ $posts->links() }}
		</div>
	</div>
</div>
@endsection