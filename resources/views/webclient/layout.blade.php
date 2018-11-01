
<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    <!-- for-mobile-apps -->
   @yield('css')
    <!-- //animation-effect -->
</head>
<body>
<!-- header -->
<div class="header">
    <div class="container">
        <div class="header-grid">
            <div class="header-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                @if(Auth::check())
                    <ul>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:info@example.com">phamdanghieu47@gmail.com</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+84961098497</li>
                        <li><i class="glyphicon glyphicon-user" aria-hidden="true"></i><a href="/">{{Auth::user()->user_name}}</a>
                        </li>
                        <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="/info">Cập nhật tài khoản</a>
                        </li>
                        <li><i class="glyphicon glyphicon-upload" aria-hidden="true"></i><a href="/addproduct">Tải sách</a>
                        </li>
                        @if(Auth::user()->role_id > 1)
                            <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="admin/dashboard">Admin</a>
                            </li>
                        @endif
                        <li><i class="glyphicon glyphicon-log-out" aria-hidden="true"></i><a href="/logout">Logout</a>
                        </li>
                    </ul>
                @else
                    <ul>
                        <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:info@example.com">phamdanghieu47@gmail.com</a></li>
                        <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+84961098497</li>
                        <li><i class="glyphicon glyphicon-log-in" aria-hidden="true"></i><a href="/login">Đăng Nhập</a>
                        </li>
                        <li><i class="glyphicon glyphicon-book" aria-hidden="true"></i><a href="/register">Đăng Ký</a>
                        </li>
                    </ul>
                @endif
            </div>
            <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">
                <ul class="social-icons">
                    <li><a href="#" class="facebook"></a></li>
                    <li><a href="#" class="twitter"></a></li>
                    <li><a href="#" class="g"></a></li>
                    <li><a href="#" class="instagram"></a></li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="logo-nav">
            <div class="logo-nav-left animated wow zoomIn" data-wow-delay=".5s">
                <h1><a href="/">Book Store <span>Shop anywhere</span></a></h1>
            </div>
            <div class="logo-nav-left1">
                <nav class="navbar navbar-default">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header nav_2">
                        <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse"
                                data-target="#bs-megadropdown-tabs">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="/" class="act">Trang Chủ</a></li>
                            <!-- Mega Menu -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Danh Mục Sách <b
                                            class="caret"></b></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        @foreach($Category as $ct)
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <h6 style="height: 80px;" ><a style="height: 100px;" href="/Product/Category/{{$ct->category_id}}">{{$ct->category_name}}</a></h6>
                                                <div style="height: 250px;">
                                                @foreach($Types as $type)
                                                    @if($type->category_id == $ct->category_id)
                                                        <li><a href="/Product/Type/{{$type->type_id}}">{{$type->type_name}}</a></li>
                                                    @endif
                                                @endforeach
                                                </div>
                                            </ul>
                                        </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li><a href="mail">Liên hệ với chúng tôi</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="logo-nav-right">
                <div class="search-box">
                    <div id="sb-search" class="sb-search">
                        <form>
                            <input class="sb-search-input" placeholder="Nhập từ khóa để tìm kiếm..." type="search"
                                   id="search">
                            <input class="sb-search-submit" type="submit" value="">
                            <span class="sb-icon-search"> </span>
                        </form>
                    </div>
                </div>
                <!-- search-scripts -->
                <script src="/js/classie.js"></script>
                <script src="/js/uisearch.js"></script>
                <script>
                    new UISearch(document.getElementById('sb-search'));
                </script>
                <!-- //search-scripts -->
            </div>
            <div class="header-right">
                <div class="cart box_1">
                    <a href="/Checkout/Cart">
                        <h3>
                            <div class="total">
                                <span class="simpleCart_total" id="Totalprice">{{number_format($Carttotal,0,',','.')}} đ</span>
                                (<span id="simpleCart_quantity" class="simpleCart_quantity">{{$Cartquantity}}</span> sản phẩm)
                            </div>
                            <img src="/images/bag.png" alt=""/>
                        </h3>
                    </a>
                    <p><a href="/ClearCart" class="simpleCart_empty">Xóa giỏ hàng</a></p>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="content">
    @yield('content');
</div>
<div class="footer">
    <div class="container">
        <div class="footer-grids">
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".5s">
                <h3>Thông tin</h3>
                <p><b style="font-size: medium">Nhóm phát triển gồm</b><br>
                    <a href="https://www.facebook.com/phamdanghieu0407">Phạm Đăng Hiếu</a><br>
                    <a href="https://www.facebook.com/phamdanghieu0407">Vũ Văn Đức</a><br>
                    <a href="https://www.facebook.com/phamdanghieu0407">Nguyễn Thị Hồng Ngọc</a><br>
                    Lớp: KTPM1-K10
                </p>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                <h3>Liên Hệ</h3>
                <ul>
                    <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Đại Học Công Nghiệp Hà
                        Nội<span>Bắc Từ Liêm , Hà Nội.</span>
                    </li>
                    <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a
                                href="mailto:phamdanghieu47@gmail.com">phamdanghieu@gmail.com</a></li>
                    <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+84961098497</li>
                </ul>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
                <h3>Thanh Toán</h3>
                <div class="footer-grid-left">
                    <a><img src="/images/13.jpg" alt=" " class="img-responsive"/></a><br>
                    <p>Thanh toán khi nhận hàng</p>
                </div>
                <div class="footer-grid-left">
                    <a><img src="/images/14.jpg" alt=" " class="img-responsive"/></a><br>
                    <p>Thanh toán qua thẻ ngân hàng nội địa</p>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".7s">
                <h3>Follow Us</h3>
                <div class="footer-grid-left">
                    <a href="https://www.facebook.com/"><img src="/images/icon_fb_2x.jpg" alt=" "
                                                             class="img-responsive"/></a><br>
                </div>
                <div class="footer-grid-left">
                    <a href="https://plus.google.com"><img src="/images/icon_g_2x.jpg" alt=" "
                                                           class="img-responsive"/></a><br>
                </div>
                <div class="footer-grid-left">
                    <a href="https://twitter.com/"><img src="/images/icon_twt_2x.jpg" alt=" "
                                                        class="img-responsive"/></a><br>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
            <h2><a href="/">Book Store <span>shop anywhere</span></a></h2>
        </div>
        <div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
            <p>&copy 2016 Book Store. All rights reserved | Design by Nhom 7</p>
        </div>
    </div>
</div>
<!-- //footer -->
</body>
</html>
