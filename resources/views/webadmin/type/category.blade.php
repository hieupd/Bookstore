@extends('webadmin.Layout.Layout')
@section('title')
	Quản Lý Danh Mục Sách
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
				<a href="/admin/dashboard">Trang Chủ</a>
			</li>

			<li>
				<a href="#">Quản Lý</a>
			</li>
			<li class="active">Quản lý danh mục sách</li>
		</ul><!-- /.breadcrumb -->
	</div>
@endsection
@section('contentname')
	<div class="page-header">

		<h1>
			Quản lý danh mục sách
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				Bảng quản lý danh mục sách
			</small>
            <div style="float: right;">
                <small>
                    <a href="/CrawlCate"><button type="button" id="AddSlide" onclick="" class="btn btn-success"><li class="fa fa-plus"></li> Cập nhập danh mục</button></a>
                </small>
            </div>

            <!-- /.nav-search -->
		</h1>
	</div>
@endsection
@section('Content')
	<div class="row">
		@if(session('Thongbao'))
			<div class="alert alert-success">
				{{session('Thongbao')}} </br>
			</div>
		@endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors -> all() as $err)
                    {{$err}} </br>
                    @endforeach
                </div>
            @endif
		<table class="table table-striped table-bordered table-hover" id="dataTables-example1">
			<thead>
			<tr align="center">
				<th style="width: 50px ;">Mã Danh Mục</th>
				<th style="width: 300px ;"> Tên Danh Mục</th>
				<th style="width: 50px ">Xóa</th>
				<th style="width: 50px ">Sửa</th>
			</thead>
			<tbody>
			@foreach($Category as $ct)
				    <tr class="odd gradeX" align="center" style="height: 34px;">
					    <td>{{$ct->category_id}}</td>
                        <form action="/admin/dashboard/typemanager/updatebooklist/{{$ct->category_id}}" method="POST">
                            {{csrf_field()}}
					        <td><span id="list_name{{$ct->category_id}}">{{$ct->category_name}}</span>
                                <input type="text" class="form-control" id="txt_listname{{$ct->category_id}}" name="txt_listname"  style="display: none;width: 500px;">
                             </td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="/admin/dashboard/typemanager/deletebooklist/{{$ct->category_id}}"> Xóa</a></td>
					         <td class="center">
                                <i class="fa fa-pencil fa-fw" id="iconlist{{$ct->category_id}}"></i> <button type="button" id="{{$ct->category_id}}" class="btn-link Edit_rL">Sửa</button>
                                <button type="submit" id="Save{{$ct->category_id}}" class="btn btn-link" style="color: #337ab7; margin-top: -5px; font-size: 13px; display: none" >Lưu</button>
                                <button type="button" id="Cancel{{$ct->category_id}}" class="btn btn-link " style="color: #337ab7; margin-top: -5px; font-size: 13px ;display: none">Hủy</button>
                            </td>
                        </form>
                    </tr>
			@endforeach
			</tbody>
		</table>
	</div>
    <div class="row">
        <div class="page-header">
            <h1>
                Quản lý thể loại sách
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    Bảng quản lý thể loại sách
                </small>
                <div style="float: right;">
                    <small>
                        <a href="/CrawlAllBook"><button type="button" id="AddSlide" onclick="" class="btn btn-success"><li class="fa fa-plus"></li> Cập nhập sách</button></a>
                    </small>
                </div>
                <!-- /.nav-search -->
            </h1>
        </div>
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
            <tr align="center">
                <th style="width: 50px ;">Mã Loại Sách</th>
                <th style="width: 150px ;">Danh Mục</th>
                <th style="width: 150px ;">Tên loại Sách</th>
                <th style="width: 50px ">Cập nhập Sách</th>
                <th style="width: 50px ">Xóa</th>
                <th style="width: 50px ">Sửa</th>
            </thead>
            <tbody>
            @foreach($Types as $tp)
                <tr class="odd gradeX" align="center">
                    <td>{{$tp->type_id}}</td>
                    <form action="/admin/dashboard/typemanager/updatebooktype/{{$tp->type_id}}" method="POST">
                        {{csrf_field()}}
                    <td>
                        <span id="Tlist_name{{$tp->type_id}}">{{$tp->category_name}}</span>
                            <select class="form-control" name="slc_listname" id="slt_type{{$tp->type_id}}" style="display: none; width: 250px">
                                @foreach($Category as $ct)
                                    <option
                                            @if($tp->category_name ==$ct->category_name)
                                                {{"selected"}}
                                            @endif
                                            value="{{$ct->category_id}}">{{$ct->category_name}}</option>
                                @endforeach
                            </select>
                    </td>
                    <td>
                        <span id="type_name{{$tp->type_id}}">{{$tp->type_name}} </span>
                            <input type="text" class="form-control" id="txt_typename{{$tp->type_id}}" value="{{$tp->type_name}}" name="txt_typename"  style="display: none;width: 250px;">

                    </td>
                        <td class="center"><i class="fa fa-upload  fa-fw"></i><a href="/CrawlBook/{{$tp->type_id}}"> Cập nhập</a></td>
                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="/admin/dashboard/typemanager/deletebooktype/{{$tp->type_id}}"> Xóa</a></td>
                    <td class="center">
                        <i class="fa fa-pencil fa-fw" id="icontype{{$tp->type_id}}"></i> <button type="button" id="{{$tp->type_id}}" class="btn-link Edit_rT">Sửa</button>
                        <button type="submit" id="SaveT{{$tp->type_id}}" class="btn btn-link " style="color: #337ab7; margin-top: -5px; font-size: 13px; display: none" >Lưu</button>
                        <button type="button" id="CancelT{{$tp->type_id}}" class="btn btn-link " style="color: #337ab7; margin-top: -5px; font-size: 13px ;display: none">Hủy</button>
                    </td>
                    </form>
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
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js" ></script>
			<script>
                $(document).ready(function() {
                    $('#dataTables-example').DataTable({
                        responsive: true
                    });
                });
			</script>

			<script>
                $(document).ready(function() {
                    $('#dataTables-example1').DataTable({
                        responsive: true
                    });
                });
			</script>
            <script>
                $(document).ready(function() {
                    $("#dataTables-example1").on("click",'.Edit_rL',function () {
                        var id =$(this).attr('id');
                        $("#txt_listname"+id).val($("#list_name"+id).text());
                        $("#txt_listname"+id).show();
                        $("#list_name"+id).hide();
                        $("#Save"+id).show();
                        $("#Cancel"+id).show();
                        $("#iconlist"+id).hide();
                        $("#"+id).hide();
                        $("#Cancel"+id).on("click",function () {
                            $("#txt_listname"+id).hide();
                            $("#list_name"+id).show();
                            $("#Save"+id).hide();
                            $("#Cancel"+id).hide();
                            $("#iconlist"+id).show();
                            $("#"+id).show();
                        });
                    });
                    $("#dataTables-example").on("click",'.Edit_rT',function () {
                        var idT = $(this).attr('id');
                        $("#slt_type"+idT).show();
                        $("#txt_typename"+idT).show();
                        $("#icontype"+idT).hide();
                        $("#Tlist_name"+idT).hide();
                        $("#type_name"+idT).hide();
                        $(this).hide();
                        $("#SaveT"+idT).show();
                        $("#CancelT"+idT).show();
                        $("#CancelT"+idT).on("click",function () {
                            $("#slt_type"+idT).hide();
                            $("#txt_typename"+idT).hide();
                            $("#icontype"+idT).show();
                            $("#Tlist_name"+idT).show();
                            $("#type_name"+idT).show();
                            $(".Edit_rT").show();
                            $(this).hide();
                            $("#SaveT"+idT).hide();
                        });
                    });

                });
            </script>

@endsection
