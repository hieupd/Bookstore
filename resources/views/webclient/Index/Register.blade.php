@extends('webclient.layout.Layout')
@section('Title')
    Đăng kí
@endsection
@section('Css')
    <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
    <!-- Retina iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
    <!-- Retina iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
    <!-- Standard iPad Touch Icon-->
    <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
    <!-- Standard iPhone Touch Icon-->
    <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

    <!-- ================= Google Fonts ================== -->
    <link href='http://fonts.googleapis.com/css?family=Lato:200,300,400,500,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Lora:200,300,400,500,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext' rel='stylesheet' type='text/css' />

    <!-- Cloud Zoom CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_cloudzoom.css" media="all" /> -->

    <!-- Menu CSS -->
    <link rel="stylesheet" type="text/css" href="css/menu.css" media="all" />
    <!-- Mega Menu CSS -->
    <link rel="stylesheet" type="text/css" href="css/megamenu.css" media="all" />

    <!-- Widget CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/widgets.css" media="all" /> -->

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.css" media="all" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.css" media="all" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all" />

    <!-- Ajax Cart CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_ajaxcart.css" media="all" /> -->
    <!-- Blog Style CSS -->
    <link rel="stylesheet" type="text/css" href="css/blog-styles.css" media="all" />
    <!-- Multi Deal Pro CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_multidealpro.css" media="all" /> -->

    <!-- Product Labels CSS -->
    <link rel="stylesheet" type="text/css" href="css/em_productlabels.css" media="all" />

    <!-- Quick Shop CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_quickshop.css" media="all" /> -->

    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="all" />

    <!-- Responsive Tab CSS -->
    <link rel="stylesheet" type="text/css" href="css/responsive-tabs.css" media="all" />
    <!-- Print CSS -->
    <link rel="stylesheet" type="text/css" href="css/print.css" media="print" />
    <!-- Fashion CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='css/color1.css' />
    <!-- Style Fashion CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='css/style_fashion.css' />

    <!-- Jquery Js -->
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Js -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- Lazy Load Js -->
    <script type="text/javascript" src="js/jquery.lazyload.min.js"></script>
    <!-- Owl Carousel Js -->
    <script type="text/javascript" src="js/owl.carousel.js"></script>
    <!-- Ios Orientation Change Js -->
    <script type="text/javascript" src="js/ios-orientationchange-fix.js"></script>
    <!-- Hover Intent Js -->
    <script type="text/javascript" src="js/jquery.hoverIntent.js"></script>
    <!-- Select UI Js -->
    <script type="text/javascript" src="js/selectUl.js"></script>
    <!-- Throttle Js -->
    <script type="text/javascript" src="js/jquery.ba-throttle-debounce.js"></script>
    <!-- EM Js -->
    <script type="text/javascript" src="js/em0131.js"></script>
    <!-- MegaMenu Js -->
    <script type="text/javascript" src="js/megamenu.js"></script>
    <!-- Responsive Tab Js -->
    <script type="text/javascript" src="js/jquery.custom.responsiveTabs.js"></script>
    <!-- Fancybox Js -->
    <script type="text/javascript" src="js/jquery.fancybox.js"></script>
    <!-- Custom Js -->
    <script type="text/javascript" src="js/custom.js"></script>


    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
@endsection
@section('content')
    <div class="wrapper-breadcrums">
        <div class="container">
            <div class="row">
                <div class="col-sm-24">
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"> <a href="index.html" title="Go to Home Page"><span >Trang chủ</span></a> <span class="separator">/ </span>
                            </li>
                            <li class="cms_page"> <strong>Đăng kí</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.wrapper-breadcrums -->

    <div class="em-wrapper-main">
        <div class="container container-main">
            <div class="em-inner-main">
                <div class="em-wrapper-area02"></div>
                <div class="em-main-container em-col1-layout">
                    <div class="row">
                        <div class="em-col-main col-sm-24">
                            <div class="account-create">
                                @if(session('Thongbao'))
                                    <div class="alert alert-success">
                                        {{session('Thongbao')}}
                                        </br>
                                    </div>
                                @endif
                                <div class="page-title">
                                    <h1>Tạo tài khoản</h1>
                                </div>
                                <form id="form-validate" method="POST" action="{{route('register')}}">
                                @csrf
                                    <div class="fieldset">
                                        <input type="hidden" name="success_url" value="" />
                                        <input type="hidden" name="error_url" value="" />
                                        <h2 class="legend">Thông tin cá nhân</h2>
                                        <ul class="form-list">
                                            <li class="fields">
                                                <div class="customer-name-middlename">
                                                    <div class="field name-firstname">
                                                        <label for="firstname" class="required"><em>*</em>Họ tên</label>
                                                        <div class="input-box">
                                                            <input type="text" id="firstname" name="user_fname" value="" title="First Name" maxlength="255" class="input-text required-entry" />
                                                        </div>
                                                    </div>
                                                    <div class="field name-middlename">
                                                        <label for="middlename">Email</label>
                                                        <div class="input-box">
                                                            <input type="text" id="middlename" name="user_email" value="" title="Middle Name/Initial" class="input-text " />
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="control">
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="fieldset">
                                        <h2 class="legend">Thông tin đăng nhập</h2>

                                        <ul class="form-list">
                                            <li>
                                                <label class="required"><em>*</em>Tài khoản</label>
                                                <div class="input-box">
                                                    <input style="width: 50%";  type="text" name="user_name" id="email_address" value="" title="Email Address" class="input-text validate-email required-entry" />
                                                </div>
                                            </li>
                                            <li class="fields">
                                                <div class="field">
                                                    <label for="password" class="required"><em>*</em>Mật khẩu</label>
                                                    <div class="input-box">
                                                        <input type="password" name="password" id="password" title="Password" class="input-text required-entry validate-password" />
                                                    </div>
                                                </div>
                                                <div class="field">
                                                    <label for="confirmation" class="required"><em>*</em>Xác nhận mật khẩu</label>
                                                    <div class="input-box">
                                                        <input type="password" name="password_confirmation" title="Confirm Password" id="confirmation" class="input-text required-entry validate-cpassword" />
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                        <div id="window-overlay" class="window-overlay" style="display:none;"></div>
                                        <div id="remember-me-popup" class="remember-me-popup" style="display:none;">
                                            <div class="remember-me-popup-head">
                                                <h3>What's this?</h3> <a href="#" class="remember-me-popup-close" title="Close">Close</a>
                                            </div>
                                            <div class="remember-me-popup-body">
                                                <p>Checking &quot;Remember Me&quot; will let you access your shopping cart on this computer when you are logged out</p>
                                                <div class="remember-me-popup-close-button a-right"> <a href="#" class="remember-me-popup-close button" title="Close"><span>Close</span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="buttons-set">
                                            <button type="submit" style="height: 37px"  class="button" title="Register" name="send" id="send2"><span><span>Đăng kí</span></span></button>
                                            <p class="back-link"><a href="/" class="back-link"><small>&laquo; </small>Quay lại trang chủ</a>
                                            </p>
                                            <p class="required">* Trường bắt buộc</p>
                                        </div>
                                        @if(session('status'))
                                            <ul>
                                                <li class="text-danger">
                                                    {{session('status')}}
                                                </li>
                                            </ul>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.em-wrapper-main -->
@endsection