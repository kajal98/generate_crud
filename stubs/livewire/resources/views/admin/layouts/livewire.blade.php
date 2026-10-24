<!DOCTYPE html>
<html>
<head>
	<meta name="_token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>Laravel CRUD | {{ $title ?? 'Admin' }}</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="{!! asset('vendor/crud/css/admin.css') !!}">
	<style type="text/css">
		.help-block{
			color: #9e331e;
		}
	</style>
</head>
<body>
	@include('admin.shared.header')
	@include('admin.shared.sidebar')
	<div class="main-container">
		<div class="pd-ltr-20 customscroll customscroll-10-p height-100-p xs-pd-20-10">
			@include('admin.shared.flash')
			{{ $slot }}
		</div>
	</div>
	<script src="{!! asset('vendor/crud/js/script.js') !!}"></script>
	@stack('scripts')
</body>
</html>