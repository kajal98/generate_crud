<!DOCTYPE html>
<html>
<head>
	@include('shared.head')
</head>
<body>
	@include('shared.header')
	@include('shared.sidebar')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			@include('shared.flash')
			@yield('content')
		</div>
	</div>
	<script src="{!! asset('/js/jquery.min.js') !!}"></script>
	<script src="{!! asset('/js/script.js) !!}"></script>
	<script src="{!! asset('/js/plupload.full.min.js') !!}"></script>
	@yield('scripts')
</body>
</html>