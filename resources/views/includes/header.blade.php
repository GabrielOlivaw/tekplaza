<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
	<a href="{{ route('subforums') }}" class="navbar-brand">@lang('website.brand')</a>
	<ul class="navbar-nav">		
		@auth
		<li class="nav-item"><a href="#user" class="nav-link">{{ auth()->user()->name }}</a></li>
		<li class="nav-item"><a href="{{ route('message-list') }}" class="nav-link">@lang('website.messages')</a></li>
		<li class="nav-item"><a href="{{ route('user-list') }}" class="nav-link">@lang('website.user-list')</a></li>
		<li class="nav-item">
			<form action="{{ route('logout') }}" method="post">
				@csrf
				<input class="nav-link btn" type="submit" value="@lang('website.logout')">
			</form>
		</li>
		@endauth
		@guest
		<li class="nav-item dropdown">
			<a id="login-dropdown" href="{{ route('login') }}" class="nav-link dropdown-toggle" data-toggle="dropdown">@lang('website.login')</a>
			<div class="dropdown-menu">
				<form action="{{ route('login') }}" method="post" class="form-horizontal p-2">
					@csrf
					<input type="email" class="form-control" name="email" placeholder="@lang('website.email')">
					@if(!session()->has('fromRegister'))
					@error('email')
        			<div class="login-error text-danger">{{ $message }}</div>
        			@enderror
        			@endif
        			
					<input type="password" class="form-control" name="password" placeholder="@lang('website.password')">
					@if(!session()->has('fromRegister'))
					@error('password')
        			<div class="login-error text-danger">{{ $message }}</div>
        			@enderror
        			@endif
        			
					<input type="submit" class="btn btn-primary" value="@lang('website.login')">
					@if(session('login_error'))
					<div class="login-error text-danger">{{ session('login_error') }}</div>
					@endif
				</form>
			</div>
		</li>
		<li class="nav-item"><a href="{{ route('register') }}" class="nav-link">@lang('website.register')</a></li>
		@endguest
		<!--
		<li class="nav-item dropdown">
			<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Language</a>
			<div class="dropdown-menu">
				<a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'es']) }}">Español</a>
				<a class="dropdown-item" href="{{ route('set-locale', ['locale' => 'en']) }}">English</a>
			</div>
		</li>
		-->
	</ul>
</nav>

<script>
	@if((session('login_error') || $errors->any()) && !session()->has('fromRegister'))
	$(document).ready(function () {
		$("#login-dropdown").trigger("click");
	});
	@endif
</script>