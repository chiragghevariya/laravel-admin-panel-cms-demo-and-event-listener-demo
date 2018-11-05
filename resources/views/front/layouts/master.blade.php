<!DOCTYPE html>
<html>
	@include('front.layouts.include.head')
	<body>
		<div class="loader"></div>
		<div class="wrapper">
			@include('front.layouts.include.header')
			<div class="content-wrapper" style="font-size: 14px">
			<br/>
				@yield('content')
			</div>
			@include('front.layouts.include.footer')
		</div>
		@include('front.layouts.include.javascript')
		@yield('style')
		@yield('javascript')
	</body>
</html>