@extends('webadmin.Layout.Layout')
@section('title')
	Quản Lý Sách
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
            <style>
                .new-collections-grid1-left p a,.occasion-cart a{
                    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
                    font-size: 10px;
                    color: #D8703F;
                    margin: 4%;
                    text-decoration: none;
                    text-transform: uppercase;
                    padding: .5em 1em;
                    border: 1px solid;
                    font-weight: bold;
                }
            </style>
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
            <li class="active">Quản lý Sách </li>
        </ul><!-- /.breadcrumb -->
	</div>
@endsection
@section('contentname')
	<div class="page-header">
		<h1>
			Quản lý sách
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Bảng quản lý sách
			</small>
			<!-- /.nav-search -->
            <div style="float: right;">
                <small>

                <label style="margin-right:10px;">Kiểu hiển thị</label>
                    <select id="selectviewmethod" style="width: 100px">
                        <option value="image" style="font-size: 13px;"><span>Hình ảnh</span></option>
                        <option value="table" style="font-size: 13px;"><span>Bảng</span></option>

                    </select>
                </small>
            </div>
		</h1>

	</div>

@endsection
@section('Content')

                <!-- /.col-lg-12 -->
			@if(session('Thongbao'))
				<div class="alert alert-success">
					{{session('Thongbao')}} </br>
				</div>
			@endif

        <div id="ImageContent" style="display: none">
            <div class="row">
                @foreach($bookimage as $b)
                     <div class="col-md-2 new-collections-grid" style="border: #F7F7F9 solid 0.1em ;padding-bottom: 0.5em;padding-left: 1.5em">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image" style="margin-top: 0.5em;margin-right: 20em">
                                <a href="/admin/dashboard/bookmanager/bookdetail/{{$b->book_id}}" class="product-image"><img  style="width: 175px; height: 200px; align-items: center ; " src="/upload/book_image/{{$b->book_image}}" class="bookimage"/></a>
                            </div>
                            <div class="text-center">
                            <div ><h5>Mã sản phẩm : {{$b->book_id}}</h5></div>
                            <div style="width: 150px; height: 200px;"><h5><a href="/admin/dashboard/bookmanager/bookdetail/{{$b->book_id}}">{{$b->book_name}}</a></h5></div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="new-collections-grid1-left">
                                        <p>
                                            <a href="/admin/dashboard/bookmanager/deletebook/{{$b->book_id}}"><i class="fa fa-trash-o  fa-fw"></i> Xóa </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="new-collections-grid1-left">

                                        <p >
                                            <a style="margin-right: 1em" href="/admin/dashboard/bookmanager/updatebook/{{$b->book_id}}"><i class="fa fa-pencil fa-fw"></i> Sửa </a>
                                        </p>

                                    </div>
                                </div>
                            </div>



                        </div>
                     </div>
                @endforeach
            </div>
            <div class="text-right">
                {{$bookimage->links()}}
            </div>
        </div>
                <div id="TableContent" style="display: none">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr align="center">
                            <th>Tên sách</th>
                            <th>Hình ảnh</th>
                            <th>Thể loại</th>
                            <th>Tác giả</th>
                            <th>Nhà xuất bản</th>
                            <th>Nhà cung cấp</th>
                            <th>Số trang</th>
                            <th>Đơn giá</th>
                            <th>Số lượng</th>
                            <th width="50px;">Chi tiết</th>
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $b)
                            <tr class="odd gradeX" align="center">
                                <td><span>{{$b->book_name}}</span></td>
                                <td><img class="bookimage" src="/upload/book_image/{{$b->book_image}}" width="80px;" height="100px;" ></td>
                                <td><span>{{$b->type_name}}</span></td>
                                <td><span>{{$b->book_author}}</span></td>
                                <td><span>{{$b->book_publish}}</span></td>
                                <td><span>{{$b->book_provider}}</span></td>
                                <td><span>{{$b->book_page}}</span></td>
                                <td><span>{{$b->book_price}}</span></td>
                                <td><span>{{$b->book_quantity}}</span></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="/admin/dashboard/bookmanager/bookdetail/{{$b->book_id}}">Chi tiết</a></td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="/admin/dashboard/bookmanager/deletebook/{{$b->book_id}}"> Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="/admin/dashboard/bookmanager/updatebook/{{$b->book_id}}">Sửa</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
	<script src="/bower_components/jquery.dataTables.min.js"></script>
	<script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
	<script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
            $("#selectviewmethod").on("change",function () {
                if($(this).val() === "image")
                {
                    $("#TableContent").hide();
                    $("#ImageContent").show();
                }
                else
                {
                    $("#TableContent").show();
                    $("#ImageContent").hide();
                }
            });
        });
        $(window).bind('load',function () {
            if($("#selectviewmethod").val() === "image")
            {
                $("#TableContent").hide();
                $("#ImageContent").show();
            }
            else
            {
                $("#TableContent").show();
                $("#ImageContent").hide();
            }
        })
	</script>
@endsection
