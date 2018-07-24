<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD | @yield('title')</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('/css/admin.css') !!}">
</head>
<body>
	@yield('content')
	<script src="{!! asset('/js/jquery.min.js') !!}"></script>
  	<script src="{!! asset('/js/script.js') !!}""></script>
</body>
</html>