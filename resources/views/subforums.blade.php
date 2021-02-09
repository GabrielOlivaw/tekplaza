@extends('layouts.default')
@section('content')
<div id="subforums-view" class="forum-item-list">
	<h1>@lang('website.subforums')</h1>
	@if(session()->has('error'))
	<div class="errorMessage bg-danger text-white m-3 p-3">{{ session()->get('error') }}</div>
	@endif
	<div id="subforums-list" class="list-items">
		@foreach($subforums as $subforum)
		<a class="subforum-element" href="{{ route('subforum', ['subforum' => $subforum->id]) }}">
		<div id="{{$subforum->id}}" class="forum-item subforums-item p-3">
			<div class="subforums-details">
    			<h5 class="font-weight-bold">{{$subforum->name}}</h5>
    			<p>{{$subforum->description}}</p>
			</div>
			<div class="subforums-thread-count">
				<p>@lang('website.threads'): {{$subforum->thread_number}}</p>
			</div>
		</div>
		</a>
		@endforeach
	</div>
</div>
@endsection