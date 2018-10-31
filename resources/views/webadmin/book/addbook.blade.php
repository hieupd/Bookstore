@extends('webadmin.Layout.Layout')
@section('title')
    Thêm Sản Phẩm
@endsection
@section('css')
    <link rel="stylesheet" href="/css/bootstrap.min.css" />

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
                <a href="#">Trang Chủ</a>
            </li>

            <li>
                <a href="#">Quản Lý</a>
            </li>
            <li>
                <a href="#">Quản Lý Sản Phẩm</a>
            </li>
            <li class="active">Thêm sản phẩm</li>
        </ul><!-- /.breadcrumb -->
    </div>
@endsection
@section('contentname')
    <div class="page-header">
        <h1>
            Quản lý Sản Phẩm
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Thêm sản phẩm
            </small>
            <!-- /.nav-search -->
            <button type="submit" class="btn btn-default" onclick="Redirect();" style="float: right;"> << Quay lại trang quản lý</button>
        </h1>
    </div>
@endsection
@section('Content')

                    <form action="/admin/dashboard/bookmanager/addbook" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
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
                                        <select class="form-control form-control-lg" name="sl_CL" style="width: 250px;">
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
                                    <select class="form-control form-control-lg" name="sl_TL" style="width: 250px;">
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
                                    <input class="form-control"  style="width: 400px" name="txtbook_publish" placeholder="Nhập nhà xuất bản" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Năm xuất bản</label>
                                    <select class="form-control form-control-lg" name="slcbook_yearpublish" style="width: 140px;">
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
                                        <input class="form-control" style="width: 450px" name="txtbook_provider" placeholder="Nhập nhà cung cấp" />
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
                                    <select class="form-control form-control-lg" name="slcbook_size" style="width: 140px;">
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
                        <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
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
            window.location = "/admin/dashboard/bookmanager";
        }
    </script>
@endsection