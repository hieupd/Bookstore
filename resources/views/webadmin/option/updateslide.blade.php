@extends('webadmin.Layout.Layout')
@section('title')
    Thêm Sản Phẩm
@endsection
@section('css')
    <link href="/dist/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
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
                <a href="#">Quản Lý Slide</a>
            </li>
            <li class="active">Thêm Slide</li>
        </ul><!-- /.breadcrumb -->
    </div>
@endsection
@section('contentname')
    <div class="page-header">
        <h1>
            Quản lý Slide
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Cập nhập Slide
            </small>
            <!-- /.nav-search -->
        </h1>
    </div>
@endsection
@section('Content')

                    <form action="/admin/dashboard/slidemanager/updateslide/{{$Slide->slide_id}}" method="POST" enctype="multipart/form-data">
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
                                     <label>Tên Slide</label>
                                     <input class="form-control" style="width: 650px" name="slide_name" value="{{$Slide->slide_name}}" placeholder="Nhập tên slide" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 ">
                            <img src="/upload/Slide/{{$Slide->slide_image}}" style="width: 600px;height: 300px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" value="{{$Slide->slide_iamge}}" name="slide_image">
                        </div>
                        <div class="form-group">
                            <label>Mô tả slide</label>
                            <textarea id="demo" class="ckeditor" name="slide_dsc">
                                {!! $Slide->slide_dsc !!}
                            </textarea>
                        </div>

                        <button type="submit" class="btn btn-default">Cập nhập slide</button>
                        <button type="reset" class="btn btn-default" onclick="Redirect();">Hủy</button>
                    </form>

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
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js" ></script>
    <!-- DataTables JavaScript -->
    <script src="/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        function Redirect() {
            window.location = "/admin/dashboard/slidemanager";
        }
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
