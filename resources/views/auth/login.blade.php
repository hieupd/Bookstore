@extends('webclient.layout')
@section('title')
    Đăng nhập
@endsection
@section('css')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="/js/jquery.min.js"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="/js/simpleCart.min.js"></script>
    <!-- cart -->
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <!-- for bootstrap working -->
    <script type="text/javascript" src="/js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- animation-effect -->
    <link href="/css/animate.min.css" rel="stylesheet">
    <script src="/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!-- //animation-effect -->
@endsection
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang chủ</a></li>
                <li class="active">Đăng nhập</li>
            </ol>
        </div>
    </div>
    <!-- //breadcrumbs -->
    <!-- login -->
    <div class="login">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Đăng Nhập</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Vui lòng đăng nhập để sử dụng được dịch vụ của Bookstore</p>
            <div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
                @if(session('status'))
                    <ul>
                        <li class="text-danger">
                            {{session('status')}}
                        </li>
                    </ul>
                @endif
                <form method="POST" action="{{route('logincheck')}}">
                    @csrf
                    <input type="text" placeholder="Username" required=" " name="user_name">
                    <input type="password" placeholder="Mật khẩu" required=" " name="password">
                    {{--<div class="forgot">--}}
                    {{--<a href="#">Quên mật khẩu ?</a>--}}
                    {{--</div>--}}
                    <input type="submit" value="Đâng Nhập">
                </form>
            </div>
            <h4 class="animated wow slideInUp" data-wow-delay=".5s">Dành cho người mới sử dụng</h4>
            <p class="animated wow slideInUp" data-wow-delay=".5s"><a href="/register">Đăng ký tại đây</a> (hoặc) quay lại
                <a href="/">Trang chủ<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
        </div>
    </div>
    <!-- //login -->
@endsection
