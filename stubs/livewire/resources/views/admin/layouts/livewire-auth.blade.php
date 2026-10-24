<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel CRUD | {{ $title ?? 'Admin' }}</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('vendor/crud/css/admin.css') !!}">
</head>
<body>
	{{ $slot }}
  	<script src="{!! asset('vendor/crud/js/script.js') !!}"></script>
</body>
</html>