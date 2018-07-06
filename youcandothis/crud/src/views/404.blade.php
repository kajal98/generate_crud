<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edoc</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="{!! asset('images/favicon.ico') !!}">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,600,700,800" rel="stylesheet"> 
{{--     <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/slick.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/font-awesome.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/jquery.fancybox.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/style.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/media.css') !!}"> --}}
    <link rel="stylesheet" type="text/css" href="{!! asset('css/app.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! asset('css/dev.css') !!}">
    @yield('style')
</head>
<body>
    @include('shared.header')   
    @include('shared.banner')

    @include('shared.flash')
    <div class="faq-page text-center">
        <div class="container">
        <div class="title"><h2>The page you are looking for does not exist</h2></div>
        <div class="button-border">
            <a href="{!! route('home') !!}"><i class="fa fa-long-arrow-left"></i> Back To Home</a>
        </div>
    </div>
    </div>
    @include('shared.footer')
    <script src="{!! asset('js/app.js') !!}"></script>
{{--     <script src="{!! asset('js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('js/jquery-migrate-3.0.0.min.js') !!}"></script>
    <script src="{!! asset('js/bootstrap.js') !!}"></script>
    <script src="{!! asset('js/slick.js') !!}"></script>
    <script src="{!! asset('js/jquery.fancybox.js') !!}"></script>
    <script src="{!! asset('js/setting.js') !!}"></script> --}} 
    <script>
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://edoc24x7.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
    <script id="dsq-count-scr" src="//edoc24x7.disqus.com/count.js" async></script>
    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a29249d5607a60a"></script>

    @yield('scripts')
</body>
</html>