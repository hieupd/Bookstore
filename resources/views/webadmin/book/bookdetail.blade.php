@extends('webadmin.Layout.Layout')
@section('title')
    {{$BookDetail->book_name}}
@endsection
@section('css')
    <link rel="stylesheet" href="/dist/bootstrap.min.css" />

    <!-- page specific plugin styles -->
    <link rel="stylesheet" href="/css/jquery-ui.min.css" />
    <link rel="stylesheet" href="/css/bootstrap-datepicker3.min.css" />
    <!--Tablelink-->

    <!-- MetisMenu CSS -->
    <link href="\bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="\dist\css\sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="\bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="\bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="\bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <!-- text fonts -->
    <link rel="stylesheet" href="/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="/css/ace-skins.min.css" />
    <link rel="stylesheet" href="/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
    <link rel="stylesheet" href="/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->


    <script src="/js/html5shiv.min.js"></script>
    <script src="/js/respond.min.js"></script>
@endsection
@section('pathofpage')

    <div class="breadcrumbs ace-save-state" id="breadcrumbs">
        <ul class="breadcrumb">
            <li>
                <i class="ace-icon fa fa-home home-icon"></i>
                <a href="/admin/dashboard/">Trang Chủ</a>
            </li>

            <li>
                <a href="#">Quản Lý</a>
            </li>
            <li>
                <a href="#">Quản Lý Sản Phẩm</a>
            </li>
            <li class="active">Thông tin sản phẩm</li>
        </ul><!-- /.breadcrumb -->
    </div>
@endsection
@section('contentname')
    <div class="page-header">
        <h1>
            Quản lý Sản Phẩm
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Thông tin sản phẩm
                <i class="ace-icon fa fa-angle-double-right"></i>
                {{$BookDetail->book_name}}
            </small>
            <!-- /.nav-search -->
            <button type="submit" class="btn btn-default" onclick="Redirect();" style="float: right;"> << Quay lại trang quản lý</button>
        </h1>
    </div>
@endsection
@section('Content')
    <div class="row" style="font-family: Helvetica, Arial, sans-serif ; font-weight: bold ">
        <div class="col-md-4">
            <img style="width: 301px; height: 401px" src="/upload/book_image/{{$BookDetail->book_image}}">
        </div>
        <div class="col-md-6">
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Tên sản phẩm : </label> <span>{{$BookDetail->book_name}}</span>
                </div>
                <div class="col-md-5">
                    <label>Thể loại : </label> <span>{{$Type->type_name}}</span>
                </div>
            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Tác giả : </label> <span>{{$BookDetail->book_author}}</span>
                </div>

            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Nhà xuất bản : </label> <span>{{$BookDetail->book_publish}}</span>
                </div>
                <div class="col-md-5">
                    <label>Năm xuất bản : </label> <span>{{$BookDetail->book_yearpublish}}</span>
                </div>
            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-6">
                    <label>Nhà cung cấp : </label> <span>{{$BookDetail->book_provider}}</span>
                </div>

            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Kích thước: </label> <span>{{$BookDetail->book_size}}</span>
                </div>
                <div class="col-md-5">
                    <label>Loại bìa : </label> <span>{{$BookDetail->book_jackettype}}</span>
                </div>
            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Số trang : </label> <span>{{$BookDetail->book_page}}</span>
                </div>
                <div class="col-md-5">
                    <label>Số lượng : </label> <span>{{$BookDetail->book_quantity}} cuốn</span>
                </div>
            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Giảm giá : </label> <span>{{$BookDetail->book_sale}} %</span>
                </div>
            </div>
            <br>
            <div class="row" style="margin-top: 7px;">
                <div class="col-md-7">
                    <label>Đơn giá : </label> <span>{{$BookDetail->book_price}} VND</span>
                </div>
            </div>
            <br>
        </div>
    </div>


        <div class="row" style="margin-top: 7px;">
            <div class="col-md-12">
                <label>Mô tả: </label>
                    @php
                    echo htmlspecialchars_decode( $BookDetail->book_dsc ,ENT_HTML401);
                    @endphp
            </div>
        </div>
@endsection
@section('Script')
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        if('ontouchstart' in document.documentElement) document.write("<script src='/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->
    <script src="/js/bootstrap-datepicker.min.js"></script>
    <script src="/js/jquery.jqGrid.min.js"></script>
    <script src="/js/grid.locale-en.js"></script>

    <!-- ace scripts -->
    <script src="/js/ace-elements.min.js"></script>
    <script src="/js/ace.min.js"></script>
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        function Redirect() {
           history.back();
        }
    </script>
@endsection
