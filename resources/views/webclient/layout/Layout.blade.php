<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from htmlcooker.com/tvlgiao/everything/assets/everything/fashion/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Oct 2015 02:40:03 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('Title')</title>
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="HTMLCooker">
    @yield('Css')
    <link href="/css/stylefooter.css" rel="stylesheet" type="text/css" media="all"/>
    <link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link href="/fontawesome-free-5.5.0-web/css/all.css" rel="stylesheet">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords"
          content="Simple Footer Widget Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <!-- //for-mobile-apps -->
    <link href="css/stylefooter.css" rel="stylesheet" type="text/css" media="all"/>
    {{--<link href='//fonts.googleapis.com/css?family=Viga' rel='stylesheet' type='text/css'>--}}
    {{--<link--}}
        {{--href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'--}}
        {{--rel='stylesheet' type='text/css'>--}}
</head>

<body class="cms-index-index">
<div class="wrapper ">
    <noscript>
        <div class="global-site-notice noscript">
            <div class="notice-inner">
                <p><strong>JavaScript seems to be disabled in your browser.</strong>
                    <br/> You must have JavaScript enabled in your browser to utilize the functionality of this website.
                </p>
            </div>
        </div>
    </noscript>
    <div class="page two-columns-left">
        @include('webclient.layout.Header')
        <div class="em-wrapper-main">
            @yield('content')
        </div><!-- /.em-wrapper-main -->

        <!--/footer-->
        @include('webclient.layout.Footer')
        <p id="back-top" style="display: none;"><a title="Top" href="#top">Top</a></p>
    </div><!-- /.page -->
</div><!-- /.wrapper -->
<script>

    $('document').ready(function () {
        $(".btn_search").click(function () {
            var keyword = $(".input-text").val().replace(/ /g, "%");
            window.location = "/Product/Search/" + keyword;
        });
    });
    $('document').ready(function () {
        $(".btn_search2").click(function () {
            var keyword = $(".pad2").val().replace(/ /g, "%");
            window.location = "/Product/Search/" + keyword;
        });
    });
</script>
</body>

<!-- Mirrored from htmlcooker.com/tvlgiao/everything/assets/everything/fashion/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 Oct 2015 02:42:17 GMT -->
</html>
