@extends('webadmin.Layout.Layout')
@section('title')
    Quản Lý Tài Khoản
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
            <li class="active">Quản lý tài khoản</li>
        </ul><!-- /.breadcrumb -->
    </div>
@endsection
@section('contentname')
    <div class="page-header">
        <h1>
            Quản lý tài khoản
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                Bảng quản lý tài khoản
            </small>
            <!-- /.nav-search -->
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
    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
        <thead>
        <tr align="center">
            <th>ID</th>
            <th>Tên thành viên</th>
            <th>Tài khoản</th>
            <th style="width: 250px">Mật Khẩu</th>
            <th>Quyền</th>
            <th>Delete</th>
            <th style="width: 100px">Edit</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Accounts as $account)
        <tr class="odd gradeX" align="center">
            <td>{{$account->id}}</td>
            <td>{{$account->user_fname}}</td>
            <td>{{$account->user_name}}</td>
            <td>{{$account->password}}</td>
            <form>
                <meta name="csrf-token" content="{{ csrf_token() }}">
            <td>
                <select class="form-control" style="display:none" id="select1{{$account->id}}">
                    @foreach($Roles as $role)
                        <option value="{{$role->role_id}}">
                            {{$role->role_name}}
                        </option>
                    @endforeach
                </select>
                <span class="role{{$account->id}}">{{$account->role_name}}</span>
            </td>
            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="/admin/dashboard/accountmanager/delete/{{$account->id}}"> Delete</a></td>
            <td class="center"><i class="fa fa-pencil fa-fw" id="icon1{{$account->id}}"></i> <a href="#" id="{{$account->id}}" class="Edit_r">Edit</a>
                <i class="fa fa-trash-o  fa-fw" style="display: none"></i><a href="#" id="Save{{$account->id}}" style="display: none"> Save</a>&nbsp
                <i class="fa fa-pencil fa-fw" style="display: none"></i> <a href="#" id="Cancel{{$account->id}}" style="display: none">Cancel</a>
            </td>
            </form>
        </tr>
        @endforeach
        </tbody>
    </table>
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
    <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        $(document).ready(function() {
            var id ;
            $(".Edit_r").on("click",function () {
                id =$(this).attr('id');
                $("#select1"+id).show();
                $(".role"+id).hide();
                $("#Save"+id).show();
                $("#Cancel"+id).show();
                $("#icon1"+id).hide();
                $(this).hide();
                $("#Cancel"+id).on("click",function () {
                    $("#select1"+id).hide();
                    $(".role"+id).show();
                    $("#Save"+id).hide();
                    $("#Cancel"+id).hide();
                    $("#icon1"+id).show();
                    $("#"+id).show();
                });
                $("#Save"+id).click(function () {
                    var role = $("#select1"+id).val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url:"/admin/dashboard/accountmanager/update/"+id,
                        type:"post",
                        cache:false,
                        data:
                            {
                                "role_id":role
                            },
                        success: function (data) {
                            if(data == "Success")
                            {
                                $("#select1"+id).hide();
                                $(".role"+id).show();
                                $("#Save"+id).hide();
                                $("#Cancel"+id).hide();
                                $("#icon1"+id).show();
                                $("#"+id).show();
                            }
                            else
                            {
                                alert("đã có lỗi xảy ra !");
                                $("#select1"+id).hide();
                                $(".role"+id).show();
                                $("#Save"+id).hide();
                                $("#Cancel"+id).hide();
                                $("#icon1"+id).show();
                                $("#"+id).show();
                            }

                        }

                    });
                });
            });

        });
    </script>
@endsection