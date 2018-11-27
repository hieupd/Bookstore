@extends('webclient.layout.Layout')
@section('Title')
    Giỏ hàng
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
    <link rel="stylesheet" type="text/css" href="/css/menu.css" media="all" />
    <!-- Mega Menu CSS -->
    <link rel="stylesheet" type="text/css" href="/css/megamenu.css" media="all" />

    <!-- Widget CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/widgets.css" media="all" /> -->

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="/css/styles.css" media="all" />
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.css" media="all" />
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" type="text/css" href="/css/owl.carousel.css" media="all" />
    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="/css/responsive.css" media="all" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.css" media="all" />

    <!-- Ajax Cart CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_ajaxcart.css" media="all" /> -->
    <!-- Blog Style CSS -->
    <link rel="stylesheet" type="text/css" href="/css/blog-styles.css" media="all" />
    <!-- Multi Deal Pro CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_multidealpro.css" media="all" /> -->

    <!-- Product Labels CSS -->
    <link rel="stylesheet" type="text/css" href="/css/em_productlabels.css" media="all" />

    <!-- Quick Shop CSS -->
    <!-- <link rel="stylesheet" type="text/css" href="css/em_quickshop.css" media="all" /> -->

    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css" href="/css/jquery.fancybox.css" media="all" />

    <!-- Responsive Tab CSS -->
    <link rel="stylesheet" type="text/css" href="/css/responsive-tabs.css" media="all" />
    <!-- Print CSS -->
    <link rel="stylesheet" type="text/css" href="/css/print.css" media="print" />
    <!-- Fashion CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='/css/color1.css' />
    <!-- Style Fashion CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='/css/style_fashion.css' />

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
    <!-- Custom Js -->
    <script type="text/javascript" src="/js/custom.js"></script>

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
@endsection
@section('content')
    <div class="wrapper-breadcrums">
        <div class="container">
            <div class="row">
                <div class="col-sm-24">
                    <div class="breadcrumbs">
                        <ul>
                            <li class="home"> <a href="/" title="Home"><span>Trang chủ</span></a> <span class="separator">/ </span>
                            </li>
                            <li class="contact"> <strong>  Thanh toán</strong>
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
                            <div class="cart">
                                <div class="page-title title-buttons">
                                    <h1>Giỏ hàng</h1>
                                    <ul class="checkout-types">
                                        <li>
                                            <button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout"><span><span>Proceed to Checkout</span></span>
                                            </button>
                                        </li>
                                    </ul>
                                </div><!-- /.page-title -->
                                <form method="post" action="/Updatecart">
                                    @csrf
                                    <fieldset>

                                        <table id="shopping-cart-table" class="data-table cart-table">
                                            <thead>
                                            <tr class="em-block-title">
                                                <th><span class="nobr">Hình ảnh</span>
                                                </th>
                                                <th><span class="nobr">Tên sản phẩm</span>
                                                </th>
                                                <th class="a-center" colspan="1"><span class="nobr">Đơn giá</span>
                                                </th>
                                                <th class="a-center">Số lượng</th>
                                                <th class="a-center last" colspan="1">Tổng tiền</th>
                                            </tr>
                                            </thead>
                                            <tfoot>
                                            <tr>
                                                <td colspan="7" class="a-right">
                                                    <button type="button" title="Continue Shopping" class="button btn-continue"><span><span>Tiếp tục mua sắm</span></span>
                                                    </button>
                                                    <button type="submit" name="update_cart_action" value="update_qty" title="Update Shopping Cart" class="button btn-update"><span><span>Cập nhập giỏ hàng</span></span>
                                                    </button>
                                                    <button type="button" name="update_cart_action" value="empty_cart" title="Clear Shopping Cart" class="button btn-empty" id="empty_cart_button"><span><span>Xóa giỏ hàng</span></span>
                                                    </button>
                                                </td>
                                            </tr>
                                            </tfoot>
                                            <tbody>
                                            @foreach($Cart_content as $item)
                                            <tr class="first odd">
                                                <td>
                                                    <div class="cart-product"><a href="/RemoveCart/{{$item->id}}" title="Remove item" class="btn-remove btn-remove2">Remove item</a>
                                                        <a href="/Product/singleproduct/{{$item->id}}" title=" baby dino baller graphic tee " class="product-image"><img style="width: 120px;height: 150px;" src="/upload/book_image/{{$item->attributes->img}}" width="100" alt=" baby dino baller graphic tee " />
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>
                                                    <h2 class="product-name"> <a href="/Product/singleproduct/{{$item->id}}"> {{$item->name}} </a></h2>
                                                </td>
                                                <td class="a-center"> <span class="cart-price"> <span class="price"></span> {{number_format($item->price,0,',','.')}}đ </span>
                                                </td>
                                                <td class="a-center">
                                                    <div class="qty_cart" >
                                                        <input id="" name="{{$item->id}}" value="{{$item->quantity}}" size="4" title="Qty" style="margin-left: 45px" class="input-text qty" maxlength="12" />
                                                    </div>
                                                </td>
                                                <td class="a-center last"> <span class="cart-price"> <span class="price">{{number_format($item->price*$item->quantity,0,',','.')}}đ</span> </span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </fieldset>
                                </form><!-- /form -->
                                <div class="cart-collaterals row">
                                    <div class="first col-md-12 col-sm-24">
                                        <div class="row">
                                            <div class="col-sm-24 col-md-24">
                                                <form id="discount-coupon-form" method="post">
                                                    <div class="discount em-box-cart">
                                                        <h2>Mã giảm giá</h2>
                                                        <div class="discount-form em-box">
                                                            <label for="coupon_code">Giảm giá</label>
                                                            <input type="hidden" name="remove" id="remove-coupone" value="0" />
                                                            <div class="input-box">
                                                                <input class="input-text" id="coupon_code" name="coupon_code" value="" />
                                                            </div>
                                                            <div class="buttons-set">
                                                                <button type="button" title="Apply Coupon" class="button" onclick="discountForm.submit(false)" value="Apply Coupon"><span><span>Gửi</span></span>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- /.col-sm-24 -->
                                        </div>
                                    </div><!-- /first -->
                                    <div class="last totals col-md-12 col-sm-24">
                                        <div class="em-box-cart">
                                            <h2>Tổng tiền</h2>
                                            <div class="em-box">
                                                <table id="shopping-cart-totals-table">
                                                    <col />
                                                    <col style="width: 3%;" />
                                                    <tfoot>
                                                    <tr>
                                                        <td style=" " class="a-right" colspan="1"> <strong>Tổng tiền:</strong>
                                                        </td>
                                                        <td style="" class="a-right"> <strong><span class="price">{{number_format($Cart_Total,0,',','.')}}đ  </span></strong>
                                                        </td>
                                                    </tr>
                                                    </tfoot>
                                                    <tbody>
                                                    @foreach($Cart_content as $item)
                                                    <tr >
                                                        <td style="float:left;"  colspan="1"> {{$item->name}}</td>
                                                        <td style=" float: left " class="a-right"> <span class="price">{{number_format($item->price,0,',','.')}} đ x {{$item->quantity}}</span>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                @if($Cart_Total > 0)
                                                <ul class="checkout-types">
                                                    <li>
                                                        <button style="width: 250px" type="button" title="Proceed to Checkout" class="button btn-proceed-checkout btn-checkout"><span><span>Thanh toán</span></span>
                                                        </button>
                                                    </li>
                                                </ul>
                                                @endif
                                            </div>
                                        </div><!-- /.em-box-cart -->
                                    </div><!-- /.last -->
                                </div><!-- /.cart-collaterals -->
                            </div>
                        </div>
                    </div>
                </div><!-- /.em-main-container -->
            </div>
        </div>
    </div><!-- /.em-wrapper-main -->
    {{--<script type="text/javascript">--}}
        {{--function qtyDown(id) {--}}
            {{--var qty_el = document.getElementById('cart[' + id + '][qty]');--}}
            {{--var qty = qty_el.value;--}}
            {{--if (!isNaN(qty) && qty > 1) {--}}
                {{--qty_el.value--;--}}
            {{--}--}}
            {{--return false;--}}
        {{--}--}}

        {{--function qtyUp(id) {--}}
            {{--var qty_el = document.getElementById('cart[' + id + '][qty]');--}}
            {{--var qty = qty_el.value;--}}
            {{--if (!isNaN(qty)) {--}}
                {{--qty_el.value++;--}}
            {{--}--}}
            {{--return false;--}}
        {{--}--}}
    {{--</script>--}}
    <script>
        $('document').ready(function () {
            $('.btn-continue').click(function () {
                window.location = "/";
            }) ;
            $('.btn-empty').click(function () {
                window.location = "/ClearCart";
            });
            $('.btn-checkout').click(function () {
               window.location = "/Checkout";
            });
        });
    </script>
@endsection
