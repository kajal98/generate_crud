<!DOCTYPE html>
<html>
<head>
	@include('shared.head')
	<style type="text/css">
	.days-remaining {
		position: absolute;
		left: 20px;
		bottom: 20px;
		font-size: 15px;
		color: #fff;
		cursor: pointer;
		z-index: 7;
        /*		    width: 35px;
        */		    line-height: 24px;
        border: #007bff solid 5px;
        background: #007bff;
        text-align: center;
        -webkit-border-radius: 3px 3px 0px 0px;
        -moz-border-radius: 3px 3px 0px 0px;
        border-radius: 3px 3px 0px 0px;
        }

    .mychat {
        border: 2px solid #dedede;
        background-color: #f1f1f1;
        border-radius: 5px;
        padding: 10px;
        margin: 10px 0;
    }

    .darker {
        border-color: #ccc;
        background-color: #ddd;
    }

    .mychat::after {
        content: "";
        clear: both;
        display: table;
    }

    .mychat img {
        float: left;
        max-width: 60px;
        width: 100%;
        margin-right: 20px;
        border-radius: 50%;
    }

    .mychat img.right {
        float: right;
        margin-left: 20px;
        margin-right:0;
    }

    .time-right {
        float: right;
        color: #aaa;
    }

    .time-left {
        float: left;
        color: #999;
    }

    .chat-container {
      height: 400px;
      overflow: auto;
      -webkit-transform: rotate(180deg);
              transform: rotate(180deg);
      direction: rtl;
    }
    .chat-container .mychat {
      border-bottom: solid 1px #ccc;
      padding: 20px;
      -webkit-transform: rotate(180deg);
              transform: rotate(180deg);
      direction: ltr;
    }
    .chat-container .mychat .avatar {
      float: left;
      margin-right: 5px;
    }
    .chat-container .mychat .datetime {
      float: right;
      color: #999;
    }
    .send-message-form input {
      width: 100%;
      border: none;
      font-size: 16px;
      padding: 10px;
    }
    .send-message-form button {
      
    }

</style>
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
	@include('shared.script')
    <script src="{!! asset('js/pusher.js') !!}"></script>
	@yield('scripts')
</body>
</html>