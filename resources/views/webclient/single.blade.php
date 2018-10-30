
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
	<div class="single">
		<div class="container">
			<div class="col-md-4 products-left">
				<div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
					<h3>Filter By Price</h3>
					<ul class="dropdown-menu1">
						<li><a href="">
								<div id="slider-range"></div>
								<input type="text" id="amount" style="border: 0" />
							</a></li>
					</ul>
					<script type='text/javascript'>//<![CDATA[
                        $(window).load(function(){
                            $( "#slider-range" ).slider({
                                range: true,
                                min: 0,
                                max: 100000,
                                values: [ 10000, 60000 ],
                                slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
                                }
                            });
                            $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );


                        });//]]>
					</script>
					<script type="text/javascript" src="/js/jquery-ui.min.js"></script>
					<!---->
				</div>
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
				<div class="col-md-5 single-right-left animated wow slideInUp" data-wow-delay=".5s">
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
								<span class="item_price">{{number_format($Book->book_price - ($Book->book_price*$Book->book_sale)/100,0,',','.')}}</span>
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

					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked>
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>
					</div>
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

					<div class="description">
						<h5><i>Mô tả:</i></h5>
                        <div>
                            @php
                                echo htmlspecialchars_decode( $Book->book_dsc ,ENT_HTML401);
                            @endphp
                        </div>
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
				<div class="clearfix"> </div>
				<div class="bootstrap-tab animated wow slideInUp" data-wow-delay=".5s">
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Reviews</a></li>
							<li role="presentation"><a href="#infomation" role="tab" id="infomation-tab" data-toggle="tab" aria-controls="infomation">Infomation</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
									@php
										echo htmlspecialchars_decode( $Book->book_dsc ,ENT_HTML401);
									@endphp
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="/images/avatars/avatar3.png" alt=" " class="img-responsive" style="width: 100px;height: 100px;" />
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><span class="glyphicon glyphicon-share" aria-hidden="true"></span>Reply</a></li>
											</ul>
											<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
									</div>
									<div class="add-review">
										<h4>add a review</h4>
										<form>
											<input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
											<input type="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
											<input type="text" value="Subject" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Subject';}" required="">
											<textarea type="text"  onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
											<input type="submit" value="Send" >
										</form>
									</div>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="infomation" aria-labelledby="infomation-tab">
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
@endsection
@else
	<h1>Sản phẩm không tồn tại</h1>
@endif