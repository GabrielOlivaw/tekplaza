<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
    	@include('layouts.head')
    </head>
	<body>
		<header>
			@include('includes.header')
		</header>
		<main class="container">
			@yield('content')
		</main>
	</body>
</html>
