@extends('webclient.layout')
@section('css')
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //for-mobile-apps -->
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <!-- //js -->

    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
    <!-- for bootstrap working -->
    <script type="text/javascript" src="/js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <!-- animation-effect -->
    <link href="/css/animate.min.css" rel="stylesheet">
    <script src="/js/wow.min.js"></script>
@endsection
@section('content')
    <div class="container">
        <form action="/admin/dashboard/bookmanager/addbook" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tên Sách</label>
                        <input class="form-control" style="width: 450px" name="txtbook_name"
                               placeholder="Nhập tên sách"/>
                    </div>
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
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Năm xuất bản</label>
                        <select class="form-control form-control-lg" name="slcbook_yearpublish" style="width: 100px;">
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
                        <label>Tác giả</label>
                        <input class="form-control" style="width: 450px" name="txtbook_author"
                               placeholder="Nhập tác giả"/>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label>Nhà xuất bản</label>
                        <input class="form-control" style="width: 430px" name="txtbook_publish"
                               placeholder="Nhập nhà xuất bản"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Nhà cung cấp</label>
                            <input class="form-control" style="width: 450px" name="txtbook_provider"
                                   placeholder="Nhập nhà cung cấp"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Loại bìa</label>
                            <input class="form-control" name="txtbook_jackettype" placeholder="Nhập loại bìa"
                                   style="width: 250px"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input class="form-control" name="txtbook_quantity" value="0" placeholder="Số lượng "
                                   style="width: 100px"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Kích thước</label>
                        <select class="form-control form-control-lg" name="slcbook_size" style="width: 150px;">
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
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Số trang</label>
                            <input class="form-control" name="txtbook_page" placeholder="Số trang"
                                   style="width: 100px"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Đơn giá</label>
                            <input class="form-control" name="txtbook_price" placeholder="Đơn giá "
                                   style="width: 200px"/>
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
    </div>
    <script type="text/javascript" language="javascript" src="/ckeditor/ckeditor.js" ></script>
@endsection
