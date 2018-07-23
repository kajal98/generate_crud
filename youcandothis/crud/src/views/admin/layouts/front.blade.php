<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Atreya</title>
    <meta name="description" content="Free Bootstrap Theme by uicookies.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">
    
    <link href="https://fonts.googleapis.com/css?family=Just+Another+Hand|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="{!! asset('front/css/styles-merged.css') !!}">
    <link rel="stylesheet" href="{!! asset('front/css/style.css') !!}">
    <link rel="stylesheet" href="{!! asset('front/css/custom.css') !!}">

    <!--[if lt IE 9]>
      <script src="front/js/vendor/html5shiv.min.js"></script>
      <script src="front/js/vendor/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

  <!-- START: header -->
  
  <h1>Hello</h1>
  
  @yield('content')

  <div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-chevron-thin-up"></i></a>
  </div>
  

  <script src="{!! asset('front/js/scripts.min.js') !!}"></script>
  <script src="{!! asset('front/js/main.min.js') !!}"></script>
  <script src="{!! asset('front/js/custom.js') !!}"></script>

  </body>
</html>