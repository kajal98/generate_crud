<!DOCTYPE html>
<html>
<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8">
    <title>DeskApp Dashboard</title>

    <!-- Site favicon -->
    <!-- <link rel="shortcut icon" href="images/favicon.ico"> -->

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- CSS -->
    <link rel="stylesheet" href="/css/admin.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-119386393-1');
    </script>
</head>
<body>
    <div class="error-page login-wrap bg-cover height-100-p customscroll d-flex align-items-center flex-wrap justify-content-center pd-20">
        <img src="vendors/images/error-bg.jpg" alt="" class="bg_img">
        <div class="pd-10">
            <div class="error-page-wrap text-center color-white">
                <h1 class="color-white weight-500">Error: 404 Page Not Found</h1>
                <img src="vendors/images/404.png" alt="">
                <p>Sorry, the page you’re looking for cannot be accessed.<br>Either check the URL, <a href="{!! url('/admin') !!}">go home</a>.</p>
            </div>
        </div>
    </div>
    <script src="{!! asset('/js/admin.js') !!}"></script>
</body>
</html>