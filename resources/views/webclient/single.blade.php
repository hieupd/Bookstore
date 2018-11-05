
@extends('webclient.layout')
@section('css')
	<title>Best Store a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
	<!-- for-mobile-apps -->
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
	<script src="/js/jquery.min.js"></script>
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
    <style>
        .attrríb{
            width: 200px;
        }
        .div-title
        {
            float: left;
            padding-bottom: 5px;
            padding-top: 14px;
            margin-left: 0px;
            margin-right: -100px;
            padding-left: 13px;
            font-size: 19px;
            color: black;
            font-weight: 500;
            font-family: 'Poppins', sans-serif;
            border-bottom: 1px solid #ddd !important;
            width: 100% !important;
        }
        .content
        {
            background-color: #ffffff; padding: 0em 0em 0em 0em;margin-bottom: 1em
        }
        .content-book
        {
            background-color: #ffffff; padding: 1em 0em 0em 0em;margin-bottom: 1em
        }
        .div-content
        {
            padding: 5em 13px 1em 1em;
            color: #999;
            font-size: 16px;
        }
    </style>
@endsection
@if($Book != null)
@section('title')
	{{$Book->book_name}}
@endsection
@section('content')
	<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li >Sản phẩm</li>
                <li class="active">{{$Book->book_name}}</li>
			</ol>
		</div>
	</div>
	<!-- //breadcrumbs -->
	<!-- single -->
	<div class="single" style="background-color: #F7F7F9">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="categories animated wow slideInUp" data-wow-delay=".5s">
					<h3>Categories</h3>
					<ul class="cate">
						<li><a href="productsbycategory.blade.php">Best Selling</a> <span>(15)</span></li>
						<li><a href="productsbycategory.blade.php">Home Collections</a> <span>(16)</span></li>
						<ul>
							<li><a href="productsbycategory.blade.php">Cookware</a> <span>(2)</span></li>
							<li><a href="productsbycategory.blade.php">New Arrivals</a> <span>(0)</span></li>
							<li><a href="productsbycategory.blade.php">Home Decore</a> <span>(1)</span></li>
						</ul>
						<li><a href="productsbycategory.blade.php">Decorations</a> <span>(15)</span></li>
						<ul>
							<li><a href="productsbycategory.blade.php">Wall Clock</a> <span>(2)</span></li>
							<li><a href="productsbycategory.blade.php">New Arrivals</a> <span>(0)</span></li>
							<li><a href="productsbycategory.blade.php">Lighting</a> <span>(1)</span></li>
							<li><a href="productsbycategory.blade.php">Top Brands</a> <span>(0)</span></li>
						</ul>
					</ul>
				</div>
				<div class="men-position animated wow slideInUp" data-wow-delay=".5s">
					<a href="single.blade.php"><img src="/images/29.jpg" alt=" " class="img-responsive" /></a>
					<div class="men-position-pos">
						<h4>Summer collection</h4>
						<h5><span>55%</span> Flat Discount</h5>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right">
                <div class="col-md-12 content-book">
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s" style="margin-left: 0em">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="/upload/book_image/{{$Book->book_image}}">
								<div class="thumb-image"> <img src="/upload/book_image/{{$Book->book_image}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="/upload/book_image/{{$Book->book_image}}">
								<div class="thumb-image"> <img src="/upload/book_image/{{$Book->book_image}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="/upload/book_image/{{$Book->book_image}}">
								<div class="thumb-image"> <img src="/upload/book_image/{{$Book->book_image}}" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
					</div>
					<!-- flixslider -->
					<script defer src="/js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="/css/flexslider.css" type="text/css" media="screen" />
					<script>
                        // Can also be used with $(document).ready()
                        $(window).load(function() {
                            $('.flexslider').flexslider({
                                animation: "slide",
                                controlNav: "thumbnails"
                            });
                        });
					</script>
					<!-- flixslider -->
				</div>
				<div class="col-md-7 single-right-left simpleCart_shelfItem animated wow slideInRight" data-wow-delay=".5s">
					<h3>{{$Book->book_name}}</h3>
					<div class="row">

						<div class="col-md-9">
							<h4>
								<span class="item_price">{{number_format($Book->book_price - ($Book->book_price*$Book->book_sale)/100,0,',','.')}} đ</span>
							</h4>
						</div>
						<div class="col-md-3">
							@if($Book->book_sale > 0)
								<h4><span>-{{$Book->book_sale}} %</span></h4>
							@endif

						</div>
					</div>
					@if($Book->book_sale > 0)
						<h5>
							<span style="color: #D8703F; font-size: 1.0em" >
								<strike id="rootpricespan">{{number_format($Book->book_price,0,',','.')}}</strike>
							</span>
						</h5>
						<br>
					@endif
                    <form>
                        {!! csrf_field() !!}
					    <div class="rating1">
						    <span class="starRating">
							    <input id="rating5" type="radio" name="rating" class="btn_bookrating" value="5"
								@if($Rating == 5)
                                    {{"checked"}}
                                    @endif>
							    <label for="rating5">5</label>
							    <input id="rating4" type="radio" name="rating" class="btn_bookrating" value="4"
                                @if($Rating == 4)
                                    {{"checked"}}
                                        @endif>
							    <label for="rating4">4</label>
							    <input id="rating3" type="radio" name="rating" class="btn_bookrating" value="3"
                                @if($Rating == 3)
                                    {{"checked"}}
                                        @endif>
							    <label for="rating3">3</label>
							    <input id="rating2" type="radio" name="rating" class="btn_bookrating" value="2"
                                @if($Rating == 2)
                                    {{"checked"}}
                                        @endif>
							    <label for="rating2">2</label>
							    <input id="rating1" type="radio" name="rating" class="btn_bookrating" value="1"
                                @if($Rating == 1)
                                    {{"checked"}}
                                        @endif>
							    <label for="rating1">1</label>
						    </span>
					    </div>
                    </form>
					<div class="description">
						<div class="row">
							<div class="col-md-6">
								<h5><i>Tác giả :  </i> {{$Book->book_author}}</h5>
							</div>
							<div class="col-md-6">
								<h5><i>Tình trạng:  </i>
									@if($Book->book_quantity > 0)
										Còn hàng
									@else
										Hết hàng
									@endif
								</h5>
							</div>
						</div>


					</div>
					<div class="description">
						<h5><i>Nhà Xuất bản :  </i> {{$Book->book_publish}}</h5>
					</div>
                    @if($Book->book_quantity > 0)
					<div class="occasion-cart">
						<a class="item_add" href="/Addtocart/{{$Book->book_id}}/{{$Book->book_name}}">Thêm vào giỏ </a>
					</div>
                    @endif
					<div class="social">
						<div class="social-left">
							<p>Share On :</p>
						</div>
						<div class="social-right">
							<ul class="social-icons">
								<li><a href="#" class="facebook"></a></li>
								<li><a href="#" class="twitter"></a></li>
								<li><a href="#" class="g"></a></li>
								<li><a href="#" class="instagram"></a></li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
                </div>
                <div class="clearfix"> </div>
                <div class="col-md-12 content" >
                            <label class="div-title">
                                <h4>Mô tả sách</h4>
                            </label>
                            <div class="book_dsc div-content">
                                {!! $Book->book_dsc !!}
                            </div>
                </div>
                <div class="col-md-12 content" >
                    <label class="div-title">
                        <h4>Thông số</h4>
                    </label>
                    <div class="book_dsc div-content">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr class="rem">
                                    <td class="attrríb">Nhà cung cấp</td>
                                    <td>{{$Book->book_provider}}</td>
                                </tr>
                                <tr class="rem">
                                    <td class="attrríb">Năm xuất bản</td>
                                    <td>{{$Book->book_yearpublish}}</td>
                                </tr>
                                <tr class="rem">
                                    <td class="attrríb">Kích thước</td>
                                    <td>{{$Book->book_size}}</td>
                                </tr>
                                <tr class="rem">
                                    <td class="attrríb">Loại bìa</td>
                                    <td>{{$Book->book_jackettype}}</td>
                                </tr>
                                <tr class="rem">
                                    <td class="attrríb">Số trang</td>
                                    <td>{{$Book->book_page}}</td>
                                </tr>
                                </tbody>
                            <!--quantity-->
                            <!--quantity-->
                            </table>
                        </div>
                </div>
                <div class="col-md-12 content" >
                    <label class="div-title">
                        <h4>Bình luận</h4>
                    </label>
                    <div class="book_dsc div-content">
                    <div class="bootstrap-tab-text-grids">
                        <div class="bootstrap-tab-text-grid">
                            <div id="commentcontent">
                                @foreach($Comments as $cmt)
                                    <div class="bootstrap-tab-text-grid-right">
                                        <ul>
                                            <li><a href="#">{{$cmt->user_fname}}  {{$cmt->book_id}}</a></li>
                                            <li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
                                        </ul>
                                        <hr>
                                        <p >{{$cmt->comment_content}}</p>
                                        <hr>
                                    </div>
                            </div>
                            <div class="clearfix"></div>
                            @endforeach
                            <div class="text-right">
                                {{$Comments->links()}}
                            </div>
                            @if($Memberid !=null)
                                <div class="add-review">
                                    <h4>Thêm đánh giá</h4>
                                    <form>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <textarea type="text" placeholder="Bình luận" id="txt_comment"></textarea>
                                        <input type="button" class="{{$Memberid}}" id="btncomment" value="Bình luận" >
                                    </form>
                                </div>
                            @else
                                <p style="color: #8A3104; font-weight: bold;text-align: center;margin-top: 1em;">Bạn cần <a href="/login">đăng nhập</a> để bình luận.</p>
                            @endif
                        </div>
                    </div>
                    </div>
                </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //single -->
	<!-- single-related-products -->
	<div class="single-related-products">
		<div class="container">
			<h3 class="animated wow slideInUp" data-wow-delay=".5s">Sản phẩm liên quan</h3>
			<p class="est animated wow slideInUp" data-wow-delay=".5s">Các sản phẩm liên quan.</p>
			<div class="new-collections-grids">

				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script>
		$('document').ready(function () {
			$('#btncomment').click(function () {
			    var Memberid = $(this).attr('class');
			    var bookid = "{{$Book->book_id}}";
				var cmtcontent = $('#txt_comment').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
				$.ajax({
					url:"/Product/comment/"+bookid,
					type:"post",
					cache:false,
					data:
						{
                            "cmtcontent":cmtcontent,
							 "Memberid":Memberid
						},
					success: function (data) {
						$.get("/Product/comment/"+bookid,function (data) {
							$('#commentcontent').html(data);
                        });
						$('#txt_comment').text('');
                    }
				});
            });
        });
		$('.btn_bookrating').click(function () {
            var valuerate = $(this).val();
            var Memberid = $("#btncomment").attr('class');
            var bookid = "{{$Book->book_id}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:"/Product/rating/"+bookid,
                type:"post",
                cache:false,
                data:
                    {
                        "valuerating":valuerate,
                        "memberid":Memberid
                    },
                success: function (data) {
                }
            });
        });
	</script>
@endsection
@else
	<h1>Sản phẩm không tồn tại</h1>
@endif
