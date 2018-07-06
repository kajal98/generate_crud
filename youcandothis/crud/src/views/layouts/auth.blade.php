<!DOCTYPE html>
<html>
<head>
	@include('shared.head')
</head>
<body>
	@yield('content')
	<script src="{!! asset('/js/jquery.min.js') !!}"></script>
  	<script src="{!! asset('/js/script.js') !!}"></script>
</body>
</html>