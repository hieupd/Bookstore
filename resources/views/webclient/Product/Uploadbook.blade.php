@extends('webclient.layout.Layout')
@section('Title')
    Tải Sách
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
    <link rel="stylesheet" type="text/css" href="/dist/bootstrap.css" media="all" />

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
                            <li class="cms_page"> <strong>Tải sách</strong>
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
                            <form action="/Product/uploadbook" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                @if(count($errors) > 0)
                                    <div class="alert alert-danger">
                                        @foreach($errors -> all() as $err)
                                        {{$err}}
                                        </br>
                                        @endforeach
                                    </div>
                                @endif
                                @if(session('Thongbao'))
                                    <div class="alert alert-success">
                                        {{session('Thongbao')}} </br>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Tên Sách</label>
                                            <input class="form-control" style="width: 450px" name="txtbook_name" placeholder="Nhập tên sách" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Danh Mục</label>
                                            </br>
                                            <select class="form-control form-control-lg" name="sl_CL" style="width: 250px;" id="book_category">
                                                @foreach($Category as $cate)
                                                    <option value="{{$cate->category_id}}"> {{$cate->category_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--input class="form-control" name="txtPrice" placeholder="Please Enter Password" /-->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Thể loại</label>
                                            </br>
                                            <select class="form-control form-control-lg" name="sl_TL" style="width: 250px;" id="book_type">
                                                @foreach($Type as $tp)
                                                    <option value="{{$tp->type_id}}"> {{$tp->type_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <!--input class="form-control" name="txtPrice" placeholder="Please Enter Password" /-->
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label>Tác giả</label>
                                            <input class="form-control" style="width: 450px" name="txtbook_author" placeholder="Nhập tác giả" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Nhà xuất bản</label>
                                            <input class="form-control"  style="width: 350px" name="txtbook_publish" placeholder="Nhập nhà xuất bản" />
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Năm xuất bản</label>
                                            <select class="form-control form-control-lg" name="slcbook_yearpublish" style="width: 153px;">
                                                @for($i = 1997 ; $i <= (int)date('Y') ;$i++)
                                                    <option> {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Nhà cung cấp</label>
                                                <input type="text" class="form-control" value="{{Auth::user()->user_fname}}" style="width: 450px" name="txtbook_provider" placeholder="Nhập nhà cung cấp" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Loại bìa</label>
                                                <input class="form-control" name="txtbook_jackettype" placeholder="Nhập loại bìa" style="width: 250px"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Số lượng</label>
                                                <input class="form-control" name="txtbook_quantity" value="0" placeholder="Số lượng " style="width: 70px" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Kích thước</label>
                                            <select class="form-control form-control-lg" name="slcbook_size" style="width: 153px;">
                                                <option>17x24</option>
                                                <option>14.5x20.5</option>
                                                <option>14x21</option>
                                                <option>16x24</option>
                                                <option>18x27</option>
                                                <option>13x19</option>
                                                <option>24x16</option>
                                                <option>27x18</option>
                                                <option>21x24</option>
                                                <option>24x27</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Số trang</label>
                                                <input class="form-control" name="txtbook_page" placeholder="Số trang" style="width: 100px" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Đơn giá</label>
                                                <input class="form-control" name="txtbook_price" placeholder="Đơn giá " style="width: 200px" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Giảm giá (%)</label>
                                            <select class="form-control form-control-lg" name="slcbook_sale" style="width: 60px;">
                                                @for($i = 0 ; $i <= 100 ;$i++)
                                                    <option> {{$i}}</option>
                                                @endfor
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh</label>
                                    <input type="file" name="Image">
                                </div>
                                <div class="form-group">
                                    <label>Mô tả Sách</label>
                                    <textarea id="demo" class="ckeditor" name="txtbook_dsc"></textarea>
                                </div>
                                <button type="submit" style="height: 37px" class="button">Tải sách</button>
                                <p class="back-link"><a href="/" class="back-link"><small>&laquo; </small>Quay lại trang chủ</a>
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.em-wrapper-main -->
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js" ></script>
    <script type="text/javascript">
        $(window).bind('load',function () {
            var categoryid = $('#book_category').val();
            $.get("/admin/ajax/category/"+categoryid,function (data) {
                $('#book_type').html(data);
            });
        });
        $('document').ready(function () {
            $('#book_category').change(function () {
                var categoryid = $(this).val();
                $.get("/admin/ajax/category/"+categoryid,function (data) {
                    $('#book_type').html(data);
                });
            });
        });
    </script>
@endsection