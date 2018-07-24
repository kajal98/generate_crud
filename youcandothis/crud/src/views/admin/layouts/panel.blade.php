<!DOCTYPE html>
<html>
<head>
	<meta name="_token" content="{{ csrf_token() }}">
	<meta charset="utf-8">
	<title>Laravel CRUD | @yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link rel="stylesheet" href="{!! asset('/css/admin.css') !!}">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
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
			@yield('content')
		</div>
	</div>
	<script src="{!! asset('/js/admin.js') !!}"></script>
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	@yield('scripts')
</body>
</html>