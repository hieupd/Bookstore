@extends('webclient.layout')

@section('title')
	Thanh toán
@endsection
@section('css')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Best Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!-- //for-mobile-apps -->
	<link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- js -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- //js -->

	<link rel="stylesheet" type="text/css" href="/css/jquery-ui.css">
	<!-- for bootstrap working -->
	<script type="text/javascript" src="/js/bootstrap-3.1.1.min.js"></script>
	<!-- //for bootstrap working -->
	<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
	<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
	<!-- animation-effect -->
	<link href="/css/animate.min.css" rel="stylesheet">
	<script src="/js/wow.min.js"></script>
@endsection
@section('content')
	<div class="breadcrumbs">
		<div class="container">
            <div class="row"    >
                <div class="col-md-6">

                </div>
            </div>
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active" >Thanh toán</li>
			</ol>
		</div>
	</div>
	<div class="checkout">
		<div class="container">
			<h3 class="animated wow slideInLeft" data-wow-delay=".5s">Giỏ hàng gồm: <span>{{$Cart_qty}} sản phẩm</span></h3>
			<div class="checkout-right animated wow slideInUp" data-wow-delay=".5s">
				<div class="simpleCart_items"></div>
                <form action="/Updatecart" method="POST">
                    {{csrf_field()}}
				<table class="timetable_sub">
					<thead>
					<tr>
						<th style="width: 378.4px">Sản Phẩm</th>
						<th>Số lượng</th>
						<th>Tên Sản Phẩm</th>
						<th>Khuyễn Mãi</th>
						<th>Thành Tiền</th>
						<th>Xóa</th>
					</tr>
					</thead>
					@foreach($Cart_content as $item)
					<tr class="rem{{$item->id}}">
						<td class="invert-image"><a href="/Product/singleproduct/{{$item->id}}"><img style="width: 109px; height: 146px;" src="/upload/book_image/{{$item->attributes->img}}" alt=" " class="img-responsive" /></a></td>
						<td class="invert">
							<div class="quantity">
								<div class="quantity-select">
									<input class="form-control" type="text" style="margin-left: 70px;margin-right: -5px;width: 40px;height: 40px;text-align: center; "value="{{$item->quantity}}" name="{{$item->id}}"  id="imputqty{{$item->id}}">
								</div>
							</div>
						</td>
						<td class="invert">{{$item->name}}</td>
						<td class="invert">{{$item->attributes->sale}} %</td>
						<input type="hidden" value="{{$item->price * $item->quantity}}"  id="imputttp{{$item->id}}">
						<td class="invert" id="ttprice{{$item->id}}">
							<div>{{number_format($item->price * $item->quantity,0,',','.') }} đ</div>
						</td>
						<td class="invert">
							<div class="rem">
								<div style="cursor: pointer; width: 28px; height: 28px;   position: absolute;  right: 15px;   top: -13px;   -webkit-transition: color 0.2s ease-in-out;   -moz-transition: color 0.2s ease-in-out;    -o-transition: color 0.2s ease-in-out;   transition: color 0.2s ease-in-out;"><a href="/RemoveCart/{{$item->id}}"><img src="/images/close_1.png"></a></div>
							</div>
						</td>
					</tr>
					@endforeach
				<!--quantity-->
					<!--quantity-->
				</table>
                    <button type="submit" class=" checkoutbtn " style="width: 207.45px; height: 41.6px;" > Cập nhập giỏ hàng </button>
                </form>
            </div>
			<div class="row">
			<div class="checkout-left">
				<div class="col-md-9">
					<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s" style="width: 310px;">
						<h4>Thanh Toán</h4>

						<ul>
							@foreach($Cart_content as $item)
								<li>{{$item->name}} <i>:</i> <span>{{number_format($item->price*$item->quantity,0,',','.')}} VNĐ </span></li>
							@endforeach
								<hr>
							<li>Tổng Tiền <i>:</i> <span>{{number_format($Cart_Total,0,',','.')}} VNĐ</span></li>
						</ul>

						<a href="/"><span class="" aria-hidden="true"></span><button type="submit" class="checkoutbtn" >Thanh toán</button> </a>
					</div>

				</div>
				<div class="col-md-3">
                    <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
                        <a href="/"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Tiếp tục mua sắm</a>
                    </div>
				</div>
				<div class="clearfix"> </div>

			</div>
		</div>
        </div>
	</div>
@endsection
