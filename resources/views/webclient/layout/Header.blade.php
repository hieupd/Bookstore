<div class="em-wrapper-header">
    <div class="hidden-xs em-header-style08">
        <div class="em-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-24">
                        @if(Auth::check())
                            <div class="em-search f-right">
                                <div class="em-top-search">
                                    <div class="em-wrapper-js-search em-search-style01">
                                        <div class="em-wrapper-search em-no-category-search">
                                            <a class="em-search-icon" title="Search" href=""><span>Tìm kiếm</span></a>
                                            <div class="em-container-js-search" style="display: none;">
                                                <input type="hidden" id="Searchbarshowstatus" value="0">
                                                    <div class="form-search no_cate_search">
                                                        <div class="text-search">
                                                            <label for="search">Tìm kiếm:</label>
                                                            <input id="search" type="text" name="keyword" value="" class="input-text keyword" maxlength="128" placeholder="Tìm kiếm..." />
                                                            <button type="button" title="Search" class="button btn_search"><span><span>Tìm kiếm</span></span></button>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div><!-- /.em-wrapper-js-search -->
                                </div>
                            </div><!-- /.em-search -->
                            <div class="em-top-links">
                                <ul class="list-inline f-right">
                                    <li>
                                        <i class="fas fa-sign-out-alt"></i>&nbsp
                                        <a href="/logout">Đăng xuất</a>
                                    </li>
                                </ul>
                                @if(Auth::user()->role_id > 1)
                                    <ul class="list-inline f-right">
                                        <li>
                                            <i class="fas fa-link"></i>&nbsp
                                            <a href="/admin/dashboard">Trang quản lý</a>
                                        </li>
                                    </ul>
                                @endif
                                    <ul class="list-inline f-right">
                                        <li><i class="fas fa-file-upload"></i>&nbsp
                                          <a href="/Product/uploadbook">Tải sách</a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline f-right">
                                        <li>
                                            <i class="fas fa-pen"></i>&nbsp
                                            <a href="/info/{{Auth::user()->id}}">Cập nhật tài khoản</a>
                                        </li>
                                    </ul>
                                    <ul class="list-inline f-right">
                                        <li>
                                            <i class="far fa-user"></i>&nbsp
                                            <a href="/">{{Auth::user()->user_fname}}</a>
                                        </li>
                                    </ul>

                            </div>
                        @else
                            <div class="">
                                <div class="em-search f-right">
                                    <div class="em-top-search">
                                        <div class="em-wrapper-js-search em-search-style01">
                                            <div class="em-wrapper-search em-no-category-search"> <a class="em-search-icon" title="Search" href=""><span>Tìm kiếm</span></a>
                                                <div class="em-container-js-search" style="display: none;">
                                                        <div class="form-search no_cate_search">
                                                            <input type="hidden" id="Searchbarshowstatus" value="0">
                                                            <div class="text-search">
                                                                <label for="search">Tìm kiếm:</label>
                                                                <input id="search" type="text" name="keyword" value="" class="input-text keyword" maxlength="128" placeholder="Tìm kiếm..." />
                                                                <button type="button" title="Search" class="button btn_search" ><span><span>Tìm kiếm</span></span></button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div><!-- /.em-wrapper-js-search -->
                                    </div>
                                </div><!-- /.em-search -->
                                <div class="em-top-links">
                                    <div class="f-right"></div>
                                    <ul class="list-inline f-right">
                                        <li><a class="em-register-link" href="/register" title="">Đăng kí</a></li>
                                    </ul>
                                    <div id="em-login-link" class="account-link f-right em-non-login">
                                        <a href="{{route('login')}}" class="link-account" id="link-login" title="Login">Đăng nhập</a>
                                    </div><!-- /#em-login-link -->
                                </div><!-- /.em-top-links -->
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div><!-- /.em-header-top -->
        <div id="em-fixed-top"></div>
        <div class="em-header-bottom em-fixed-top">
            <div class="container em-menu-fix-pos">
                <div class="row">
                    <div class="col-sm-24">
                        <div class="em-logo f-left">
                            <a href="/" title="Clothing Commerce" class="logo">
                                <strong>Clothing Commerce</strong>
                                <img class="retina-img" style="height: 56px; width: 256px" src="/images/Logo4.png" alt="Clothing Commerce" />
                            </a>
                        </div>
                        <div class="em-logo-sticky f-left">
                            <a href="/" title="Fashion Commerce" class="logo">
                                <img style="height: 46px; width: 66px;" src="/images/logo_small.png" alt="Fashion Commerce" />
                            </a>
                        </div>
                        <div class="em-search em-search-sticky f-right">
                            <div class="em-top-search">
                                <div class="em-wrapper-js-search em-search-style01">
                                    <div class="em-wrapper-search"> <a class="em-search-icon" title="Search" href=""><span>Search</span></a>
                                        <div class="em-container-js-search" style="display: none;">
                                                <div class="form-search">
                                                    <label for="search">Tìm kiếm:</label>
                                                    <input id="search-fixed-top" type="text" name="keyword" value="" class="input-text pad2" maxlength="128" placeholder="Tìm kiếm..." />
                                                    <button type="button" title="Search" class="button btn_search2"><span><span>Tìm Kiếm</span></span></button>
                                                </div>
                                        </div>
                                    </div>
                                </div><!-- /.em-wrapper-js-search -->
                            </div>
                        </div><!-- /.em-search -->
                        @if(Auth::check())
                        <div class="em-top-cart-sticky em-top-cart f-right">
                            <div class="em-wrapper-js-topcart em-wrapper-topcart em-no-quickshop">
                                <div class="em-container-topcart">
                                    <div class="em-summary-topcart">
                                        <a class="em-amount-js-topcart em-amount-topcart" title="Shopping Cart" href="/Checkout/Cart"> <span class="em-topcart-text">My Cart:</span>
                                            <span class="em-topcart-qty">{{$Cartquantity}}</span> </a>
                                    </div>
                                    <div class="em-container-js-topcart topcart-popup" style="display:none">
                                        <div class="topcart-popup-content">
                                            <p class="em-block-subtitle">Shopping Cart</p>
                                            <div class="topcart-content">
                                                @if($CartContent->count() > 0)
                                                @foreach($CartContent as $item)
                                                    <div class="row" style="margin-bottom: 0.5em">
                                                        <div class="col-md-8">
                                                            <img style="width: 80px;height: 100px;" src="/upload/book_image/{{$item->attributes->img}}">
                                                        </div>
                                                        <div class="col-md-16">
                                                            <p style="margin: 0em;padding-bottom: 0.6em;font-weight: bold">{{$item->name}}</p>
                                                            <p style="margin: 0em;padding-bottom: 0.6em;font-weight: bold">{{$item->quantity}} x {{number_format($item->price,0,',','.')}} đ </p>
                                                            <a href="/RemoveCart/{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <hr>
                                                <div class="row">
                                                    <a href="/ClearCart"><button type="button" class="button" title="Checkout"><span><span>Xóa giỏ hàng</span></span></button></a>
                                                    <a href="/Checkout"><button type="button" class="button" title="Checkout" style="float: right"><span><span>Thanh toán</span></span></button>
                                                    </a>
                                                </div>
                                                @else
                                                    <p>Bạn chưa có sản phẩm trong giỏ !</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.em-wrapper-js-topcart -->
                        </div><!-- /.em-top-cart -->
                        @endif
                        <div class="em-menu-hoz f-right">
                            <div id="em-main-megamenu">
                                <div class="em-menu">
                                    <div class="megamenu-wrapper wrapper-4_7164">
                                        <div class="em_nav" id="toogle_menu_4_7164">
                                            <ul class="hnav em_hoz_menu effect-menu">
                                                {{--<li class="menu-item-link menu-item-depth-0  menu-item-parent">--}}
                                                    {{--<a class="em-menu-link" href="/"> <span> Trang chủ </span> </a>--}}
                                                {{--</li><!-- /.menu-item-link -->--}}
                                                {{--<li class="menu-item-link menu-item-depth-0  menu-item-parent">--}}
                                                    {{--<a class="em-menu-link" href="#"> <span> Danh mục</span> </a>--}}
                                                    {{--<ul class="menu-container">--}}
                                                        {{--<li class="menu-item-hbox menu-item-depth-1 col-menu menu_col24 grid_24 menu-item-parent" style="">--}}
                                                            {{--<ul class="menu-container" style="padding:0 10px">--}}
                                                                {{--@foreach($Category as $category)--}}
                                                                {{--<li class="menu-item-vbox menu-item-depth-2 col-sm-6 grid_6 alpha menu-item-parent" style="">--}}
                                                                    {{--<ul class="menu-container">--}}
                                                                        {{--<li class="menu-item-text menu-item-depth-3  ">--}}
                                                                            {{--<div class="em-line-01">--}}
                                                                                {{--<a href="/Product/Category/{{$category->category_id}}"><h5 class="text-uppercase">{{$category->category_name}}</h5></a>--}}
                                                                                {{--<div>--}}
                                                                                    {{--<ul class="menu-container">--}}
                                                                                        {{--@foreach($Types as $type)--}}
                                                                                        {{--@if($type->category_id == $category->category_id)--}}
                                                                                        {{--<li class="menu-item-link menu-item-depth-1 first label-hot-menu"><a class="em-menu-link" href="/Product/Type/{{$type->type_id}}">{{$type->type_name}}</a>--}}
                                                                                        {{--</li>--}}
                                                                                        {{--@endif--}}
                                                                                        {{--@endforeach--}}
                                                                                    {{--</ul><!-- /.menu-container -->--}}

                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</li>--}}
                                                                    {{--</ul>--}}
                                                                {{--</li><!-- /.menu-item-vbox -->--}}
                                                                {{--@endforeach--}}
                                                            {{--</ul>--}}
                                                        {{--</li>--}}
                                                    {{--</ul><!-- /.menu-container -->--}}
                                                    {{--<!--<ul class="menu-container">-->--}}
                                                    {{--<!--<li class="menu-item-hbox menu-item-depth-1 col-menu menu_col24 grid_24 menu-item-parent" style="">-->--}}
                                                    {{--<!--<ul class="menu-container">-->--}}
                                                    {{--<!--<li class="menu-item-vbox menu-item-depth-2 col-sm-6 menu-item-parent" style="">-->--}}
                                                    {{--<!--<ul class="menu-container">-->--}}
                                                    {{--<!--<li class="menu-item-text menu-item-depth-3  ">-->--}}
                                                    {{--<!--<div class="menu-cate effect03 zoom-img">-->--}}
                                                    {{--<!--<div>-->--}}
                                                    {{--<!--<a title="em-sample-title" href="category-two-columns-left.html"><img class="img-responsive" src="images/menu/img-cate2.jpg" alt="em-sample-alt" />-->--}}
                                                    {{--<!--</a>-->--}}
                                                    {{--<!--</div>-->--}}
                                                    {{--<!--<p class="h5"><a href="http://demo.emthemes.com/everything/index.php/fashion.html">Two Columns Left</a>-->--}}
                                                    {{--<!--</p>-->--}}
                                                    {{--<!--</div>-->--}}
                                                    {{--<!--</li>-->--}}
                                                    {{--<!--</ul>-->--}}
                                                    {{--<!--</li>&lt;!&ndash; /.menu-item-vbox &ndash;&gt;-->--}}
                                                    {{--<!--</ul>&lt;!&ndash; /.menu-container &ndash;&gt;-->--}}
                                                    {{--<!--</li>-->--}}
                                                    {{--<!--</ul>&lt;!&ndash; /.menu-container &ndash;&gt;-->--}}
                                                {{--</li><!-- /.menu-item-link -->--}}
                                                {{--<li class="menu-item-link menu-item-depth-0  menu-item-parent">--}}
                                                    {{--<a class="em-menu-link" href="#"> <span> Sản Phẩm </span> </a>--}}
                                                    {{--<ul class="menu-container">--}}
                                                        {{--<li class="menu-item-hbox menu-item-depth-1 col-menu menu_col24 grid_24 menu-item-parent" style="width: 880px;">--}}
                                                            {{--<ul class="menu-container" style="padding:0 10px">--}}
                                                            {{--</ul>--}}
                                                        {{--</li>--}}
                                                    {{--</ul><!-- /.menu-container -->--}}
                                                {{--</li><!-- /.menu-item-link -->--}}
                                                {{--<li class="menu-item-link menu-item-depth-0 hidden-sm hidden-md menu-item-parent">--}}
                                                    {{--<a class="em-menu-link" href="#"> <span> Tạo mẫu </span> </a>--}}
                                                    {{--<ul class="menu-container" style="padding-bottom:130px; background-repeat:no-repeat; background-position: right bottom">--}}
                                                        {{--<li class="menu-item-hbox menu-item-depth-1 col-menu menu_col24 grid_24 menu-item-parent" style="">--}}
                                                            {{--<ul class="menu-container" style="padding:0 10px">--}}
                                                            {{--</ul>--}}
                                                        {{--</li>--}}
                                                    {{--</ul><!-- /.menu-container -->--}}
                                                {{--</li><!-- /.menu-item-link -->--}}
                                                <li class="menu-item-link menu-item-depth-0  menu-item-parent">
                                                    <a class="em-menu-link" > <span></span> &nbsp </a>
                                                </li><!-- /.menu-item-link -->
                                            </ul><!-- /.hnav em_hoz_menu -->
                                        </div><!-- /.em_nav -->
                                    </div><!-- /.megamenu-wrapper -->
                                </div><!-- /.em-menu -->
                            </div><!-- /#em-main-megamenu -->
                        </div><!-- /.em-menu-hoz -->
                    </div>
                </div>
            </div><!-- /.container -->
        </div><!-- /.em-header-bottom -->
    </div>
</div><!-- /.em-wrapper-header -->