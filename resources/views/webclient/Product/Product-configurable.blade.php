@extends('webclient.layout.Layout')
@section('Title')
    {{$Book->book_name}}
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
    <link href='http://fonts.googleapis.com/css?family=Lato:200,300,400,500,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext'
          rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Lora:200,300,400,500,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext'
          rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Raleway:200,300,400,500,600,700,800&amp;subset=latin,cyrillic-ext,cyrillic,greek-ext,greek,vietnamese,latin-ext'
          rel='stylesheet' type='text/css'/>

    <!-- Cloud Zoom CSS -->
    <link rel="stylesheet" type="text/css" href="/css/em_cloudzoom.css" media="all"/>

    <!-- Menu CSS -->
    <link rel="stylesheet" type="text/css" href="/css/menu.css" media="all"/>
    <!-- Mega Menu CSS -->
    <link rel="stylesheet" type="text/css" href="/css/megamenu.css" media="all"/>

    <!-- Widget CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/widgets.css" media="all" /> -->

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/css/styles.css" media="all"/>
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css" media="all"/>
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" media="all"/>
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="/css/responsive.css" media="all"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="all"/>

    <!-- Ajax Cart CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_ajaxcart.css" media="all" /> -->
    <!-- Blog Style CSS -->
    <link rel="stylesheet" type="text/css" href="/css/blog-styles.css" media="all"/>
    <!-- Multi Deal Pro CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_multidealpro.css" media="all" /> -->

    <!-- Product Labels CSS -->
    <link rel="stylesheet" type="text/css" href="/css/em_productlabels.css" media="all"/>

    <!-- Quick Shop CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_quickshop.css" media="all" /> -->

    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" media="all"/>
    <!-- Lightbox CSS -->
    <link rel="stylesheet" type="text/css" href="/css/lightbox.css" media="all"/>

    <!-- Responsive Tab CSS -->
    <link rel="stylesheet" type="text/css" href="/css/responsive-tabs.css" media="all"/>
    <!-- Print CSS -->
    <link rel="stylesheet" type="text/css" href="/css/print.css" media="print"/>
    <!-- Fashion CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='/css/color1.css'/>
    <!-- Style Fashion CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='/css/style_fashion.css'/>

    <!-- Jquery Js -->
    <script type="text/javascript" src="/js/jquery-1.11.3.min.js"></script>
    <!-- Bootstrap Js -->
    <script type="text/javascript" src="/js/bootstrap.min.js"></script>
    <!-- Lazy Load Js -->
    <script type="text/javascript" src="/js/jquery.lazyload.min.js"></script>
    <!-- Owl Carousel Js -->
    <script type="text/javascript" src="/js/owl.carousel.js"></script>
    <!-- Ios Orientation Change Js -->
    <script type="text/javascript" src="/js/ios-orientationchange-fix.js"></script>
    <!-- Hover Intent Js -->
    <script type="text/javascript" src="/js/jquery.hoverIntent.js"></script>
    <!-- Select UI Js -->
    <script type="text/javascript" src="/js/selectUl.js"></script>
    <!-- Throttle Js -->
    <script type="text/javascript" src="/js/jquery.ba-throttle-debounce.js"></script>
    <!-- EM Js -->
    <script type="text/javascript" src="/js/em0131.js"></script>
    <!-- MegaMenu Js -->
    <script type="text/javascript" src="/js/megamenu.js"></script>
    <!-- Responsive Tab Js -->
    <script type="text/javascript" src="/js/jquery.custom.responsiveTabs.js"></script>
    <!-- Fancybox Js -->
    <script type="text/javascript" src="/js/jquery.fancybox.js"></script>
    <!-- Cloud Zoom Js -->
    <script type="text/javascript" src="/js/cloud-zoom.js"></script>
    <!-- Custom Js -->
    <script type="text/javascript" src="/js/custom.js"></script>


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <style>
        #commemtx
        {
            margin-left: 20px;
        }
        .usernamecmt
        {
            border-bottom: solid 0.1em ;
            color: #93CBF9;
        }
        #cmtcontent
        {
            color: #2f2f2f;
            font-family: "OpenSansRegular",Arial,Helvetica,sans-serif;
            font-size: 13px;
        }
        hr
        {
            width: 99%;
            margin-left: 1%;
        }

    </style>
@endsection
@section('content')
    <div class="wrapper-breadcrums">
        <div class="container">
            <div class="row">
                <div class="col-sm-24">
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"><a href="/" title="Home"><span>Trang chủ</span></a> <span
                                        class="separator">/ </span>
                            </li>
                            <li class="product"><strong>{{$Book->book_name}}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.wrapper-breadcrums -->

    <div class="em-wrapper-main">
        <div class="container-fluid container-main">
            <div class="em-inner-main">
                <div class="em-wrapper-area02"></div>
                <div class="em-wrapper-area03"></div>
                <div class="em-wrapper-area04"></div>
                <div class="em-main-container em-col1-layout">
                    <div class="row">
                        <div class="em-col-main col-sm-22 col-sm-offset-1">
                            <div id="messages_product_view"></div>
                            <div class="product-view">
                                <div class="product-essential">
                                    <form method="post" id="product_addtocart_form">
                                        <input name="form_key" type="hidden" value="N4DL2crX27DuHSDk"/>
                                        <div class="product-view-detail">
                                            <div class="em-product-view row">
                                                <div class="em-product-view-primary em-product-img-box col-sm-16 first">
                                                    <div id="em-product-shop-pos-top"></div>
                                                    <div class="product-img-box">
                                                        <div class="media-left">
                                                            <p class="product-image"
                                                               style="float: right;margin-right: 25%;">
                                                                <a class="cloud-zoom" id="image_zoom"
                                                                   rel="zoomWidth: 500,zoomHeight: 500,position: 'inside'">
                                                                    <img style="width: 400px;height: 500px;"
                                                                         class="em-product-main-img"
                                                                         src="/upload/book_image/{{$Book->book_image}}"
                                                                         alt='' title="Configurable Product"/>
                                                                </a></p>
                                                        </div><!-- /.media-left -->
                                                    </div>
                                                </div><!-- /.em-product-view-primary -->
                                                <div class="em-product-view-secondary em-product-shop col-sm-8">
                                                    <div class="product-shop  em-has-options fix_menu">
                                                        <div id="em-product-info-basic">
                                                            <div class="product-name">
                                                                <h2>{{$Book->book_name}}</h2>
                                                            </div>
                                                            <div class="product-name">
                                                                <p style="font-size: 15px">Tác giả : {{$Book->book_author}}</p>
                                                            </div>
                                                            <div class="product-name">
                                                                <p style="font-size: 15px">Nhà xuất bản : {{$Book->book_publish}}</p>
                                                            </div>
                                                            <div class="product-name">
                                                                <p style="font-size: 15px">Tình trạng :
                                                                    @if($Book->book_quantity > 0)
                                                                        Còn hàng
                                                                    @else
                                                                        Hết hàng
                                                                    @endif
                                                                </p>
                                                            </div>
                                                            <div class="product-name">
                                                            <form>
                                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                <div class="rating1">
						                                             <span class="starRating">
							                                             <input id="rating5" type="radio" name="rating" class="btn_bookrating" value="5"
                                                                    @if($bookRating == 5)
                                                                    {{"checked"}}
                                                                     @endif>
							                                         <label for="rating5">5</label>
                                                                         <input id="rating4" type="radio" name="rating" class="btn_bookrating" value="4"
                                                                    @if($bookRating == 4)
                                                                     {{"checked"}}
                                                                    @endif>
                                                                         <label for="rating4">4</label>
                                                                         <input id="rating3" type="radio" name="rating" class="btn_bookrating" value="3"
                                                                    @if($bookRating == 3)
                                                                    {{"checked"}}
                                                                    @endif>
							                                                <label for="rating3">3</label>
							                                                <input id="rating2" type="radio" name="rating" class="btn_bookrating" value="2"
                                                                    @if($bookRating == 2)
                                                                    {{"checked"}}
                                                                    @endif>
							                                                <label for="rating2">2</label>
							                                                <input id="rating1" type="radio" name="rating" class="btn_bookrating" value="1"
                                                                    @if($bookRating == 1)
                                                                    {{"checked"}}
                                                                    @endif>
							                                        <label for="rating1">1</label>
						                                            </span>
                                                                </div>
                                                            </form>
                                                            </div>
                                                            <div class="clearfix"></div>
                                                            <div style="color: black;">
                                                                <h2>Mô tả ngắn:</h2>
                                                                <div class="std">{!! $Book->book_dsc !!}
                                                                </div>
                                                            </div>
                                                            <div class="em-addthis-plug"><span>Chia sẻ</span>
                                                                <a href="#" target="_blank"><img alt="Facebook"
                                                                                                 src="/images/social/facebook.png"/>
                                                                </a>
                                                                <a href="#" target="_blank"><img alt="Twitter"
                                                                                                 src="/images/social/twitter.png"/>
                                                                </a>
                                                                <a href="#" target="_blank"><img alt="Google+"
                                                                                                 src="/images/social/google_plusone_share.png"/>
                                                                </a>
                                                                <a href="#" target="_blank"><img alt="Pinterest"
                                                                                                 src="/images/social/pinterest.png"/>
                                                                </a>
                                                                <a href="#" target="_blank"><img alt="LinkedIn"
                                                                                                 src="/images/social/linkedin.png"/>
                                                                </a>
                                                                <a href="#" target="_blank"><img alt="Email"
                                                                                                 src="/images/social/email.png"/>
                                                                </a>
                                                            </div><!-- /.em-addthis-plug -->
                                                            <p style="margin-top: 3px">Đơn giá:</p>
                                                            <div style="margin-bottom: 1px;">
                                                                <div class="price-box"><span class="regular-price"
                                                                                             id="product-price-206"> <span
                                                                                class="price" content="750">{{number_format($Book->book_price - ($Book->book_price*$Book->book_sale)/100,0,',','.')}}
                                                                            đ</span> </span>
                                                                </div>
                                                                @if(Auth::check())
                                                                <input type="hidden" value="{{Auth::user()->id}}" id="userid">
                                                                @endif
                                                                @if($Book->book_sale > 0)
                                                                <div class="price-box">
                                                                    <span class="regular-price" id="product-price-206">
                                                                        <span class="price" style="font-size: 15px;" content="750">
                                                                            <strike>{{number_format($Book->book_price,0,',','.')}}</strike>đ
                                                                        </span>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div><!-- /.em-product-info-basic -->
                                                        <div class="product-options-bottom">
                                                                <div class="button_addto">
                                                                    @if($Book->book_quantity > 0)
                                                                    <a href="/Addtocart/{{$Book->book_id}}">
                                                                        <button type="button" title="Add to Cart"
                                                                                id="product-addtocart-button"
                                                                                class="button btn-cart btn-cart-detail">
                                                                            <span><span>Thêm vào giỏ hàng</span></span>
                                                                        </button>
                                                                    </a>
                                                                    @endif
                                                                </div>
                                                            </div><!-- /.add-to-cart -->
                                                        </div>
                                                    </div>
                                                </div><!-- /.em-product-view-secondary -->
                                            </div>
                                            <div class="clearer"></div>
                                        </div><!-- /.product-view-detail -->
                                    </form>
                                </div><!-- /.product-essential -->
                                <div class="row">
                                    <div class="em-product-view-primary col-sm-16 first"></div>
                                </div>
                                <div class="row">
                                    <div class="em-product-view-primary col-sm-16 first">
                                        <div id="em-wrapper-related"
                                             class="block box-collateral block-related em-line-01">
                                            <div class="em-block-title">
                                                <h2><span>Sản phẩm liên quan</span></h2>
                                            </div>
                                            <div id="em-related" class="block-content">
                                                <p class="block-subtitle">Check items to add to the cart or&nbsp;<a
                                                            href="#" onclick="selectAllRelated(this); return false;">select
                                                        all</a>
                                                </p>
                                                <div class="products-grid mini-products-list em-related-slider "
                                                     id="block-related">
                                                    @foreach($Book_related as $book)
                                                        <div class="item">
                                                            <div class="product-item">
                                                                <a href="#" title="{{$book->book_name}}" class="product-image">
                                                                    <img style="padding-left: 6.5%;padding-top: 5%;width: 200px;height: 264px;" class="em-img-lazy img-responsive" src="/upload/book_image/{{$book->book_image}}" width="180" height="180" alt="All Over Embellished"/> </a>
                                                                <div class="product-details product-shop">
                                                                    <p class="product-name"><a
                                                                                href="#">{{$book->book_name}}</a>
                                                                    </p>
                                                                    <div class="ratings">
                                                                        <div class="rating-box">
                                                                            @foreach($Rating as $rate)
                                                                                @if($rate->book_id == $book->book_id)
                                                                                    <div class="rating"
                                                                                         style="width:{{$rate->rating/5*100}}%"></div>
                                                                                @endif
                                                                            @endforeach
                                                                        </div>
                                                                    </div>
                                                                    <div class="price-box"><span class="regular-price"
                                                                                                 id="product-price-185-related"> <span
                                                                                    class="price">{{number_format($book->book_price - ($book->book_price * $book->book_sale)/100,0,',','.')}}
                                                                                đ</span> </span>
                                                                    </div>
                                                                    <div class="quickshop-link-container">
                                                                        <a href="/Product/singleproduct/{{$book->book_id}}" class="quickshop-link"
                                                                           title="Quickshop">Xem nhanh</a>
                                                                    </div>
                                                                    <a href="/Addtocart/{{$book->book_id}}"> <button type="button" title="Add to Cart" class="button btn-cart" onclick="217">
                                                                        </button></a>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.item -->
                                                    @endforeach
                                                </div><!-- /.products-grid -->
                                            </div><!-- /#em-related -->
                                        </div>
                                    </div><!-- /.em-product-view-primary -->
                                </div>
                                <div class="row">
                                    <div class="em-product-view-primary col-sm-16 first">
                                        <div class="em-product-info ">
                                            <div class="em-product-details ">
                                                <div class="em-details-tabs product-collateral">
                                                    <div class="em-details-tabs-content">
                                                        <div class="box-collateral em-line-01 box-description">
                                                            <div class="em-block-title">
                                                                <h2>Mô tả</h2>
                                                            </div>
                                                            <div class="box-collateral-content">
                                                                <div class="std" style="color: #0c0c0c">
                                                                    {!!$Book->book_dsc!!}
                                                                </div>
                                                            </div>
                                                        </div><!-- /.box-collateral -->
                                                    </div><!-- /.em-details-tabs-content -->
                                                </div><!-- /.em-details-tabs -->
                                                <div class="em-details-tabs product-collateral">
                                                    <div class="em-details-tabs-content">
                                                        <div class="box-collateral em-line-01 box-description">
                                                            <div class="em-block-title">
                                                                <h2>Thông tin sách</h2>
                                                            </div>
                                                            <div class="box-collateral-content">
                                                                <div class="std" style="color: #0c0c0c">
                                                                    <table class="table table-striped table-bordered">
                                                                        <tbody>
                                                                        <tr class="rem">
                                                                            <td class="attrríb">Nhà cung cấp</td>
                                                                            <td>{{$Book->book_provider}}</td>
                                                                        </tr>
                                                                        <tr class="rem">
                                                                            <td class="attrríb">Năm xuất bản</td>
                                                                            <td>{{$Book->book_yearpublish}}</td>
                                                                        </tr>
                                                                        <tr class="rem">
                                                                            <td class="attrríb">Kích thước</td>
                                                                            <td>{{$Book->book_size}}</td>
                                                                        </tr>
                                                                        <tr class="rem">
                                                                            <td class="attrríb">Loại bìa</td>
                                                                            <td>{{$Book->book_jackettype}}</td>
                                                                        </tr>
                                                                        <tr class="rem">
                                                                            <td class="attrríb">Số trang</td>
                                                                            <td>{{$Book->book_page}}</td>
                                                                        </tr>
                                                                        </tbody>
                                                                        <!--quantity-->
                                                                        <!--quantity-->
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.box-collateral -->
                                                    </div><!-- /.em-details-tabs-content -->
                                                </div><!-- /.em-details-tabs -->
                                                <div class="box-collateral box-reviews em-line-01"
                                                     id="customer-reviews">
                                                    <div class="form_review no_reviews">
                                                        <div class="form-add" id="customer_review_form">
                                                            <div class="em-block-title">
                                                                <h2>Đánh giá</h2>
                                                            </div>
                                                            <div id="commentcontent">
                                                                @foreach($Comments as $cmt)
                                                                    <div class="row" id="commemtx">
                                                                        <div class="row"><span class="usernamecmt">{{$cmt->user_fname}}</span></div>
                                                                        <br>
                                                                        <div class="row" id="cmtcontent">{{$cmt->comment_content}}</div>
                                                                    </div>
                                                                    <hr>
                                                                @endforeach
                                                            </div>

                                                            @if($Memberid !=null)
                                                            <form method="post" id="review-form">
                                                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                                                <fieldset>
                                                                    <ul class="form-list">
                                                                        <ul class="form-list">
                                                                            <li>
                                                                                <label for="review_field" class="required"><em>*</em>Đánh giá</label>
                                                                                <div class="input-box">
                                                                                    <textarea name="detail" id="txt_comment" cols="5" rows="3" class="required-entry"></textarea>
                                                                                </div>
                                                                            </li>
                                                                        </ul>
                                                                </fieldset>
                                                                <input type="hidden" name="validate_rating" class="validate-rating" value=""/>
                                                                <div class="buttons-set">
                                                                    <button type="button" title="Submit Review" class="button" id="btncomment">
                                                                        <span><span>Đánh giá</span></span>
                                                                    </button>
                                                                </div>
                                                            </form>
                                                            @else
                                                                <p style="color: #8A3104; font-weight: bold;text-align: center;margin-top: 1em;">Bạn cần <a href="/login">đăng nhập</a> để bình luận.</p>
                                                            @endif
                                                        </div>
                                                    </div><!-- /.form_review -->
                                                </div><!-- /.box-collateral -->
                                                @if(Auth::check())
                                                <div id="em-wrapper-upsell"
                                                     class="box-collateral box-up-sell em-line-01">
                                                    <div class="em-block-title">
                                                        <h2><span>Có thể bạn quan tâm</span></h2>
                                                    </div>
                                                    <div id="upsell-product-table">
                                                        <ul id="em-upsell" class="products-grid em-upsell-slider">
                                                            @if($List_recomend !=null)
                                                                @foreach($List_recomend as $item)
                                                                    @foreach($LBooksCm as $book)
                                                                        @if($book->book_id == $item)
                                                                <div class="item">
                                                                    <div class="product-item">
                                                                        <a href="/Product/singleproduct/{{$book->book_id}}" title="{{$book->book_name}}" class="product-image">
                                                                            <img style="padding-left: 6.5%;padding-top: 5%;width: 200px;height: 264px;" class="em-img-lazy img-responsive" src="/upload/book_image/{{$book->book_image}}" width="180" height="180" alt="All Over Embellished"/> </a>
                                                                        <div class="product-details product-shop">
                                                                            <p class="product-name"><a
                                                                                        href="/Product/singleproduct/{{$book->book_id}}">{{$book->book_name}}</a>
                                                                            </p>
                                                                            <div class="ratings">
                                                                                <div class="rating-box">
                                                                                    @foreach($Rating as $rate)
                                                                                        @if($rate->book_id == $book->book_id)
                                                                                            <div class="rating"
                                                                                                 style="width:{{$rate->rating/5*100}}%"></div>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            </div>
                                                                            <div class="price-box"><span class="regular-price"
                                                                                                         id="product-price-185-related"> <span
                                                                                            class="price">{{number_format($book->book_price - ($book->book_price * $book->book_sale)/100,0,',','.')}}
                                                                                        đ</span> </span>
                                                                            </div>
                                                                            <div class="quickshop-link-container">
                                                                                <a href="/Product/singleproduct/{{$book->book_id}}" class="quickshop-link"
                                                                                   title="Quickshop">Xem nhanh</a>
                                                                            </div>
                                                                            <a href="/Addtocart/{{$book->book_id}}"> <button type="button" title="Add to Cart" class="button btn-cart" onclick="217">
                                                                                </button></a>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- /.item -->
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            @endif
                                                        </ul><!-- /#em-upsell -->
                                                    </div>
                                                </div><!-- /#em-wrapper-upsell -->
                                                @endif
                                            </div><!-- /.em-product-details -->
                                        </div><!-- /.em-product-info -->
                                        <div id="em-product-shop-pos-bottom" style="display:inline-block;"></div>
                                    </div>
                                </div>

                            </div><!-- /.product-view -->
                        </div>
                    </div>
                </div><!-- /.em-main-container -->
            </div>
        </div>
    </div><!-- /.em-wrapper-main -->
    <!-- Page Configuration -->
    <script type="text/javascript">
        layout = '1column';
    </script>
    <!-- Product View Js -->
    <script type="text/javascript" src="/js/em_product_view.js"></script>
    <!-- Lightbox Js -->
    <script type="text/javascript" src="/js/lightbox.min.js"></script>
    <script type="text/javascript">
        jQuery('.cloud-zoom-gallery').click(function () {
            jQuery('#zoom-btn').attr('href', this.href);
        });

        function doSliderMoreview() {
            var owl = $("ul.em-moreviews-slider");
            if (owl.length) {
                owl.owlCarousel({
                    // Navigation
                    navigation: true,
                    navigationText: ["Previous", "Next"],
                    pagination: false,
                    paginationNumbers: false,
                    // Responsive
                    responsive: true,
                    items: 7,
                    /*items above 1200px browser width*/
                    itemsDesktop: [1200, 4],
                    /*//items between 1199px and 981px*/
                    itemsDesktopSmall: [992, 7],
                    itemsTablet: [768, 3],
                    itemsMobile: [480, 2],
                    // CSS Styles
                    baseClass: "owl-carousel",
                    theme: "owl-theme",
                    transitionStyle: false,
                    addClassActive: true,
                });
            }
        }

        function changeQty(increase) {
            var qty = parseInt($('#qty').val());
            if (!isNaN(qty)) {
                console.log(qty)
                qty = increase ? qty + 1 : (qty > 1 ? qty - 1 : 1);
                $('#qty').val(qty);
            }
        }

        (function ($) {
            $(window).load(function () {
                if (!isPhone) {
                    $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
                }
                doSliderMoreview();

                /* Up sell */
                var owl = $("#em-upsell");
                if (owl.length) {
                    owl.owlCarousel({
                        // Navigation
                        navigation: true,
                        navigationText: ["Previous", "Next"],
                        pagination: false,
                        paginationNumbers: false,
                        // Responsive
                        responsive: true,
                        items: 4,
                        /*items above 1200px browser width*/
                        itemsDesktop: [1200, 4],
                        /*//items between 1199px and 981px*/
                        itemsDesktopSmall: [992, 3],
                        itemsTablet: [768, 3],
                        itemsMobile: [480, 2],
                        // CSS Styles
                        baseClass: "owl-carousel",
                        theme: "owl-theme",
                        transitionStyle: false,
                        addClassActive: true,
                        afterMove: function () {
                            var $_img = owl.find('img.em-img-lazy');
                            if ($_img.length) {
                                var timeout = setTimeout(function () {
                                    $_img.trigger("appear");
                                }, 200);
                            }
                        },
                    });
                }
            });
        })(jQuery);
    </script>
    <script type="text/javascript">
        (function ($) {
            $(window).load(function () {
                if (!isPhone) {
                    $('.cloud-zoom, .cloud-zoom-gallery').CloudZoom();
                }
                doSliderMoreview();

                /* Related Slider */
                var owl = $('#em-related').find('.em-related-slider');
                if (owl.length) {
                    owl.owlCarousel({
                        // Navigation
                        navigation: true,
                        navigationText: ["Previous", "Next"],
                        pagination: false,
                        paginationNumbers: false,
                        // Responsive
                        responsive: true,
                        items: 4,
                        /*items above 1200px browser width*/
                        itemsDesktop: [1200, 4],
                        /*//items between 1199px and 981px*/
                        itemsDesktopSmall: [992, 3],
                        itemsTablet: [768, 3],
                        itemsMobile: [480, 2],
                        // CSS Styles
                        baseClass: "owl-carousel",
                        theme: "owl-theme",
                        transitionStyle: false,
                        addClassActive: true,
                        afterMove: function () {
                            var $_img = owl.find('img.em-img-lazy');
                            if ($_img.length) {
                                var timeout = setTimeout(function () {
                                    $_img.trigger("appear");
                                }, 200);
                            }
                        },
                    });
                }

                /* Related Checkbox */

            });
        })(jQuery);
    </script>
    <script>
        $('document').ready(function () {
            $('#btncomment').click(function () {
                var Memberid = $('#userid').val();
                var bookid = "{{$Book->book_id}}";
                var cmtcontent = $('#txt_comment').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:"/Product/comment/"+bookid,
                    type:"post",
                    cache:false,
                    data:
                        {
                            "cmtcontent":cmtcontent,
                            "Memberid":Memberid
                        },
                    success: function (data) {
                        $.get("/Product/comment/"+bookid,function (data) {
                            $('#commentcontent').html(data);
                        });
                        $('#txt_comment').val(' ');
                    }
                });
            });
        });
        $('.btn_bookrating').click(function () {
            var valuerate = $(this).val();
            var Memberid = $('#userid').val();
            if(Memberid == null)
            {
                alert("Bạn cân đăng nhập để đánh giá ! ");
            }
            else
            {
            var bookid = "{{$Book->book_id}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/Product/rating/"+bookid,
                type:"post",
                cache:false,
                data:
                    {
                        "valuerating":valuerate,
                        "memberid":Memberid
                    },
                success: function (data) {
                }
            });
            }
        });
    </script>
@endsection
