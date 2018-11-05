<!DOCTYPE html>
<html>
	@include('admin::layouts.include.head')
	<body class="hold-transition skin-purple sidebar-mini">
		<div class="loader"></div>
		<div class="wrapper">
			@include('admin::layouts.include.header')
			<!-- Left side column. contains the logo and sidebar -->
			@include('admin::layouts.include.sidebar')
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper" style="font-size: 14px">
			<br/>
				<!-- @include('flash::message') -->
				@yield('content')
			</div>
			<!-- /.content-wrapper -->
			@include('admin::layouts.include.footer')
		</div>
		@include('admin::layouts.include.javascript')
		<!-- ./wrapper -->
		@yield('style')
		@yield('javascript')
	</body>
</html>