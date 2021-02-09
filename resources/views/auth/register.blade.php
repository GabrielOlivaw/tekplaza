@extends('layouts.default')
@section('content')
<div id="register-view" class="forum-item-list">
	<h1>@lang('website.register')</h1>
	
	<div class="breadcrumb">
		<a href="{{ route('subforums') }}">@lang('website.subforums')</a>
	</div>

	<form id="register-form" action="{{ route('register') }}" method="post">
		@csrf
		<div id="register-form-name" class="register-form-field">
			<label for="name">@lang('website.name')</label>
			<input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required>
			
			@error('name')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>
		
		<div id="register-form-email" class="register-form-field">
    		<label for="email">@lang('website.email')</label>
    		<input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" required>
    		
    		@error('email')
			<div class="text-danger">{{ $message }}</div>
			@enderror
    	</div>
		
		<div id="register-form-password" class="register-form-field">
    		<label for="password">@lang('website.password')</label>
    		<input type="password" id="password" class="form-control" name="password" required>
		
			@error('password')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>
		
		<div id="register-form-password-confirmation" class="register-form-field">
    		<label for="password_confirmation">@lang('website.password-confirm')</label>
    		<input type="password" id="password_confirmation" class="form-control" name="password_confirmation" required>
		
			@error('password_confirmation')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>
		<input type="submit" class="btn btn-lg btn-info" value="@lang('website.send')">
	</form>
</div>
@endsection