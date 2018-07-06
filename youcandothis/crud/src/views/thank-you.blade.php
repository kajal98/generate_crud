@extends('layouts.front')
@section('style')
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-111817302-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-111817302-1');
</script>
@endsection
@section('content')
<div class="thankyou-new-page">
    <div class="container">
        <div class="thankyou-new">
            <h3>Welcome to Edoc24X7!!</h3>
            <div class="thankyou-new-text">Thank you for registering with eDoc24x7. Please check your email to verify your account.</div>
            <div class="button-border">
                <a href="{!! route('home') !!}">BACK TO HOMEPAGE</a>
            </div>
        </div>
    </div>
</div>
@endsection
