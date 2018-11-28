@extends('webclient.layout.Layout')
@section('Title')
    Kết quả
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

    <!-- jQuery Ui CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='/css/jquery.ui.css' />
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
    <!-- Layered Navigation CSS -->
    <link rel='stylesheet' type='text/css' media='all' href='/css/em_layerednavigation.css' />
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
    <!-- Category Js -->
    <script type="text/javascript" src="/js/em_category.js"></script>
    <!-- Slider Js -->
    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
    <!-- Custom Js -->
    <script type="text/javascript" src="/js/custom.js"></script>


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
                            <li class="home"> <a href="/" title="Home"><span>Trang chủ</span></a> <span class="separator">/ </span>
                            </li>
                            <li class="contact"> <strong>  Tìm kiếm</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="em-wrapper-main">
        <div class="container container-main">
            <div class="em-inner-main">
                <div class="em-wrapper-area02"></div>
                <div class="em-wrapper-area03"></div>
                <div class="em-wrapper-area04"></div>
                <div class="em-main-container em-col2-left-layout">
                    <div class="row">
                        <div class="col-sm-18 col-sm-push-6 em-col-main">
                            <div class="page-title category-title">
                                <h1>Kết quả : {{$Count}} kết quả</h1>
                            </div>

                            <div class="category-products">
                                <div class="toolbar-top">
                                    <div class="toolbar">
                                        <div class="pager">
                                            <p class="amount"> Items 1 to 12 of 20 total</p>
                                            <div class="pages">
                                                <ol>
                                                    <li class="current">1</li>
                                                    <li><a href="#">2</a>
                                                    </li>
                                                    <li>
                                                        <a class="next i-next" href="#" title="Next"> <img src="/images/pager_arrow_right.gif" alt="Next" class="v-middle" /> </a>
                                                    </li>
                                                </ol>
                                            </div>
                                        </div><!-- /.pager -->
                                        <div class="sorter">
                                            {{--<p class="view-mode">--}}
                                                {{--<label>View as:</label> <strong title="Grid" class="grid">Grid</strong> <a href="category-two-columns-left-list.html" title="List" class="list">List</a>--}}
                                            {{--</p>--}}
                                            <div class="sort-by toolbar-switch">
                                                <label>Sắp xếp</label>
                                                <select style="width: 185px" class="sortby" name="sortby" id="sortby">
                                                    <option selected="selected">-- Sắp Xếp --</option>
                                                    <option value="">Thứ tự</option>
                                                    <option value="name">Tên</option>
                                                    <option value="price-asc">Giá thấp đến cao</option>
                                                    <option value="price-desc">Giá cao đến thấp</option>
                                                </select>

                                            </div>
                                            {{--<div style="float:right;">--}}
                                                    {{--<label>Hiện</label>--}}
                                                    {{--<select class="toolbar-show" id="toolbar-show" style="width: 150px;">--}}
                                                        {{--<option value="2" selected="selected"> 12 sản phẩm</option>--}}
                                                        {{--<option value="24"> 24 sản phẩm</option>--}}
                                                        {{--<option value="36"> 36 sản phẩm</option>--}}
                                                    {{--</select>--}}
                                            {{--</div>--}}
                                        </div><!-- /.sorter -->
                                        <hr>
                                    </div>
                                </div><!-- /.toolbar-top -->
                                <div id="em-grid-mode">
                                    <ul class="emcatalog-grid-mode products-grid emcatalog-disable-hover-below-mobile">
                                        @foreach($Books as $book)
                                        <li class="item">
                                            <div class="product-item">
                                                <div class="product-shop-top">
                                                    <ul class="productlabels_icons">
                                                        @if($book->book_quantity <= 0)
                                                            <li class="label out-of-stock">
                                                                <p> Hết </p>
                                                            </li>
                                                        @endif
                                                        @if($book->book_sale > 0)
                                                            <li class="label special">
                                                                <p><span>{{$book->book_sale}}%</span> </p>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                    <a href="/Product/singleproduct/{{$book->book_id}}" style="padding-left: 3%;padding-top: 3%" title="WIASSI Version 12" class="product-image">
                                                        <img  style=" width: 194px;height: 264px;padding-left: 3%;padding-top: 3%" class="em-img-lazy img-responsive em-alt-hover" src="/upload/book_image/{{$book->book_image}}" width="220" height="220" alt="WIASSI Version 12" />
                                                        <img style=" width: 190px;height: 264px;" id="product-collection-image-217" class="em-img-lazy img-responsive em-alt-org" src="/upload/book_image/{{$book->book_image}}" width="220" height="220" alt="WIASSI Version 12" />
                                                        <span class="bkg-hover"></span>
                                                    </a>
                                                    <div class="bottom">
                                                        @if($book->book_quantity > 0)
                                                        <div class="em-btn-addto text-center ">
                                                            <a href="/Addtocart/{{$book->book_id}}"> <button type="button" title="Add to Cart" class="button btn-cart" onclick="217"><span>Thêm vào giỏ</span>
                                                                </button></a>
                                                        </div>
                                                        @endif
                                                        <div class="quickshop-link-container"> <a href="/Product/singleproduct/{{$book->book_id}}" class="quickshop-link" title="Quickshop">Quickshop</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-shop">
                                                    <div class="f-fix">
                                                        <h2 class="product-name text-center  "><a href="/Product/singleproduct/{{$book->book_id}}" title="WIASSI Version 12"> {{$book->book_name}} </a></h2>
                                                        <div class=" text-center">
                                                            <div class="ratings">
                                                                <div class="rating-box">
                                                                    @foreach($Rating as $rate)
                                                                        @if($rate->book_id == $book->book_id)
                                                                            <div class="rating" style="width:{{$rate->rating/5*100}}%"></div>
                                                                        @endif
                                                                    @endforeach
                                                                </div> <span class="amount"><a href="#" onclick="217"></a></span>
                                                            </div>
                                                        </div>
                                                        <div class="text-center ">
                                                            <div class="price-box"> <span class="regular-price" id="product-price-217"> <span class="price"  content="1200">{{number_format(($book->book_price - ($book->book_price * $book->book_sale)/100),0,',','.')}} đ</span> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- /.product-item -->
                                        </li>
                                        @endforeach
                                    </ul>
                                    <div class="toolbar-bottom em-box-03">
                                        <div class="toolbar">
                                            <div class="pager">
                                                <p class="amount">{{$Books->count()}} sản phẩm</p>
                                                <div class="text-right">
                                                    {{$Books->links()}}
                                                </div>
                                            </div><!-- /.pager -->
                                        </div>
                                    </div><!-- /.toolbar-bottom -->
                                </div><!-- /.em-grid-mode -->

                            </div><!-- /.category-products -->
                        </div><!-- /.em-col-main -->
                        <div class="col-sm-6 col-sm-pull-18 em-col-left em-sidebar">
                            <div class="em-wrapper-area02"></div>
                            <div class="em-line-01 block block-layered-nav">
                                <div class="em-block-title block-title"> <strong><span>Mua theo</span></strong>
                                </div>
                                <div class="block-content">
                                    <p class="block-subtitle">Shopping Options</p>
                                    <dl>
                                        <dt>Danh mục</dt>
                                        <dd>
                                            <ol class="filter tree-filter">
                                                @foreach($ListCategory as $item)
                                                    <li>
                                                        <div class="label-icon">
                                                            <div class="label"> <a class="tree-item" href="/Product/Category/{{$item->category_id}}">{{$item->category_name}}</a></div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ol>
                                        </dd>
                                        <dt> Lọc giá sản phẩm</dt>
                                        <dd>
                                            <div class="rslider">
                                                <div id="slider-range"></div>
                                                <div class="values">
                                                    <span id="from-val"><span class="price">0</span></span>
                                                    <input type="hidden" id="from-val-input" name="from-val" value="0">
                                                    <span id="to-val"><span class="price">500.000</span></span>
                                                    <input type="hidden" id="to-val-input" name="to-val" value="500000">
                                                    <br>
                                                    <button style="margin-top: 30px;margin-left: 900px; float: right;" type="button" class="button" id="filter"><span>Lọc</span></button>
                                                </div>
                                            </div>
                                        </dd>
                                    <input type="hidden" id="Keyword-input" name="to-val" value="{{$Keyword}}">
                                    <br>
                                    </dl>
                                </div>
                            </div><!-- /.block-layered-nav -->
                        </div><!-- /.em-sidebar -->
                    </div>
                </div><!-- /.em-main-container -->
            </div>
        </div>
    </div><!-- /.em-wrapper-main -->

    <script type="text/javascript">
        (function($) {
            if (typeof EM == 'undefined') EM = {};
            if (typeof EM.SETTING == 'undefined') EM.SETTING = {};

            function setColumnCountGridMode() {
                var wWin = $(window).width();
                if (EM.SETTING.DISABLE_RESPONSIVE == 1) {
                    var sDesktop = 'emcatalog-desktop-';
                    var sDesktopSmall = 'emcatalog-desktop-small-';
                    var sTablet = 'emcatalog-tablet-';
                    var sMobile = 'emcatalog-mobile-';
                    var sGrid = $('#em-grid-mode');
                    if (wWin > 1200) {
                        sGrid.removeClass().addClass(sDesktop + '4');
                    } else {
                        if (wWin <= 1200 && wWin > 768) {
                            sGrid.removeClass().addClass(sDesktopSmall + '3');
                        } else {
                            if (wWin <= 768 && wWin > 480) {
                                sGrid.removeClass().addClass(sTablet + '3');
                            } else {
                                sGrid.removeClass().addClass(sMobile + '2');
                            }
                        }
                    }
                } else {
                    var sDesktop = 'emcatalog-desktop-';
                    var sGrid = $('#em-grid-mode');
                    sGrid.removeClass().addClass(sDesktop + '4');
                }
            };


            //Ready Function
            $(document).ready(function() {

                /* Price slider Activation */
                var currencies = "đ";
                var toolbar_status = "1";
                var rate = "1";
                var min = "0"
                min = Number(min);
                var max = "500000"
                max = Number(max);
                var currentMinPrice = "0"
                currentMinPrice = Number(currentMinPrice);
                var currentMaxPrice = "500000"
                //alert('min: '+min+'--max: '+ max+ 'currentMin: '+currentMinPrice);
                currentMaxPrice = Number(currentMaxPrice);
                var params = "";
                var tax_min = "0";
                var tax_max = "0";
                params = $.trim(params);
                //slider
                $("#slider-range").slider({
                    range: true,
                    min: min,
                    max: max,
                    values: [currentMinPrice, currentMaxPrice],
                    slide: function(event, ui) {
                        console.log(ui.values[0])
                        $('#from-val > span').text( ui.values[0].toFixed(0)+' đ');
                        $('#from-val-input').val(ui.values[0]);
                        $('#to-val > span').text(ui.values[1].toFixed(0)+' đ');
                        $('#to-val-input').val(ui.values[1]);
                    },
                    stop: function(event, ui) {

                    }
                });

                $('#from-val > span').text( $("#slider-range").slider("values", 0).toFixed(0)+' đ');
                $('#to-val > span').text( $("#slider-range").slider("values", 1).toFixed(0)+' đ');

                setColumnCountGridMode();
            });
            $(window).resize($.throttle(300, function() {
                setColumnCountGridMode();
            }));
        })(jQuery);
    </script>
    <script>
        $('document').ready(function () {
            $('#sortby').change(function () {
                var from = {{$From}}+"";
                var to = {{$To}}+"";
                var typesort = $(this).val();
                var keyword = $("#Keyword-input").val().replace(/ /g,"%");
                if(typesort != "name") {
                    var type = typesort.slice(0, 5);
                    var sort = typesort.slice(6, 10);
                }
                else
                {
                    var type=typesort;
                    var sort='asc';
                }
                window.location="/Product/Search/"+keyword+"?order="+type+"&from="+from+"&to="+to+"&sort="+sort;

            });
        });
        $('document').ready(function () {
           $('#filter').click(function () {
              var from = $('#from-val-input').val();
              var to = $('#to-val-input').val();
              var typesort = $(this).val();
               var keyword = $("#Keyword-input").val().replace(/ /g,"%");
               if(typesort != "name") {
                   var type = typesort.slice(0, 5);
                   var sort = typesort.slice(6, 10);
               }
               else
               {
                   var type=typesort;
                   var sort='asc';
               }
               window.location="/Product/Search/"+keyword+"?order="+type+"&from="+from+"&to="+to+"&sort="+sort;
           });
        });
    </script>
@endsection