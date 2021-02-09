@extends('layouts.default')
@section('content')
<div id="subforum-view" class="forum-item-list">
	<h1>{{ $subforum->name }}</h1>
	
	<div class="breadcrumb">
		<a href="{{ route('subforums') }}">@lang('website.subforums')</a>
	</div>
	
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	
	<div id="subforum-list" class="list-items">
		<div id="actions-bar">
    		@auth
    		@if(!$isBanned)
        	<a class="btn btn-primary" href="{{ route('create-thread', ['subforum' => $subforum->id]) }}">@lang('website.thread-new')</a>
        	@endif
        	@endauth
        	<div id="filter-items" class="float-right">
            	<input id="filterInput" type="text" class="form-control" placeholder="@lang('website.actions-search-threads')"></input>
            	<button id="filterButton" type="button" class="form-control"><i class="fas fa-search forum-icon"></i></button>
        	</div>
    	</div>
    	<div id="threadList">
    		@foreach($threads as $thread)
    		<a class="thread-element" href="{{ route('thread', ['subforum' => $subforum->id, 'thread' => $thread->id]) }}">
        		<div id="{{$thread->id}}" class="forum-item subforum-item px-3" >
        			<div class="subforum-details">
        				<p class="font-weight-bold">
        					{{$thread->title}}
        					@if(!empty($thread->pinned))
        					<!--<span title="{{__('website.thread-pinned')}}">&#x1F4CC;</span>-->
        					<i class="fas fa-thumbtack forum-icon" title="{{__('website.thread-pinned')}}"></i>
        					@endif 
        					@if(!empty($thread->locked))
        					<!--<span title="{{__('website.thread-locked')}}">&#x1F512;</span>-->
        					<i class="fas fa-lock forum-icon" title="{{__('website.thread-locked')}}"></i>
        					@endif 
        				</p>
        				<p>@lang('website.post-author'): {{$thread->user_name}}</p>
        			</div>
        			<div class="subforum-post-count">
        				<p>@lang('website.post-number', ['post-number' => $thread->post_number])</p>
        			</div>
        		</div>
    		</a>
    		@endforeach
		</div>
		<div id="threadsLinks" class="float-right">
			{{ $threads->links() }}
		</div>
	</div>
</div>
<script>
	var threadListUrl = "{{ route('subforum', ['subforum' => $subforum]) }}";
	var subforumUrl = "{{ route('subforum-filter', ['subforum' => $subforum]) }}";
</script>
@endsection