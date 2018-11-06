@extends('webclient.layout')

@section('title')
    {{$Type_name->type_name}}
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
            <ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
                <li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Trang Chủ</a></li>
                <li class="active">Sản phẩm</li>
                <li class="active">{{$Type_name->type_name}}</li>
            </ol>
        </div>
    </div>
    <div class="products">
        <div class="container">
            <div class="col-md-4 products-left">
                <div class="filter-price animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Lọc theo giá</h3>
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
                                max: 500000,
                                values: [ 40000, 100000 ],
                                slide: function( event, ui ) {  $( "#amount" ).val( ui.values[ 0 ] + "đ -" + ui.values[ 1 ] + "đ" );
                                }
                            });
                            $( "#amount" ).val( $( "#slider-range" ).slider( "values", 0 ) + "đ -" + $( "#slider-range" ).slider( "values", 1 )+ "đ" );


                        });//]]>
                    </script>
                    <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
                    <!---->
                </div>
                <div class="categories animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Danh mục</h3>
                    <ul class="cate">
                        <li><a href="productsbycategory.blade.php">Cấp I</a> <span>(15)</span></li>
                        <li><a href="productsbycategory.blade.php">Cấp II</a> <span>(16)</span></li>
                        <li><a href="productsbycategory.blade.php">Cấp III</a> <span>(15)</span></li>
                    </ul>
                </div>
                <div class="new-products animated wow slideInUp" data-wow-delay=".5s">
                    <h3>Sách mới phát hành</h3>
                    <div class="new-products-grids">
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="single.blade.php"><img src="/images/3.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4><a href="single.blade.php">Tiếng Việt 1 - Tập 2</a></h4><div class="rating">
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">30000đ</span><a class="item_add" href="#">Thêm vào giỏ</a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="single.blade.php"><img src="/images/18.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4><a href="single.blade.php">eum fugiat quo</a></h4>
                                <div class="rating">
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">$250</span><a class="item_add" href="#">Thêm vào giỏ </a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                        <div class="new-products-grid">
                            <div class="new-products-grid-left">
                                <a href="single.blade.php"><img src="/images/6.jpg" alt=" " class="img-responsive" /></a>
                            </div>
                            <div class="new-products-grid-right">
                                <h4><a href="single.blade.php">officia deserunt</a></h4>
                                <div class="rating">
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/2.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="rating-left">
                                        <img src="/images/1.png" alt=" " class="img-responsive">
                                    </div>
                                    <div class="clearfix"> </div>
                                </div>
                                <div class="simpleCart_shelfItem new-products-grid-right-add-cart">
                                    <p> <span class="item_price">$259</span><a class="item_add" href="#">Thêm vào giỏ </a></p>
                                </div>
                            </div>
                            <div class="clearfix"> </div>
                        </div>
                    </div>
                </div>
                <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                    <a href="single.blade.php"><img src="/images/4.jpg" alt=" " class="img-responsive" /></a>
                    <div class="men-position-pos">

                    </div>
                </div>
            </div>
            <div class="col-md-8 products-right">
                <div class="products-right-grid">
                    <div class="products-right-grids animated wow slideInRight" data-wow-delay=".5s">
                        <div class="sorting">
                            <select id="country" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null">Sắp xếp mặc định</option>
                                <option value="null">Sắp xếp theo độ phổ biến</option>
                                <option value="null">Sắp xếp theo độ yêu thích</option>
                                <option value="null">Sắp xếp theo giá</option>
                            </select>
                        </div>
                        <div class="sorting-left">
                            <select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
                                <option value="null">Sản phẩm trang 9</option>
                                <option value="null">Sản phẩm trang 18</option>
                                <option value="null">Sản phẩm trang 32</option>
                                <option value="null">All</option>
                            </select>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="products-right-grids-position animated wow slideInRight" data-wow-delay=".5s">
                        <img src="/images/SGK.jpg" alt=" " class="img-responsive" />
                    </div>
                </div>

                <div class="products-right-grids-bottom">
                    @foreach($Books as $book)
                    <div class="col-md-4">
                        <div class="new-collections-grid123 products-right-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid123-image">
                                <a href="single.blade.php" class="product-image"><img style=" width:175.99px; height: 252.14px;" src="/upload/book_image/{{$book->book_image}}" alt=" " class="img-responsive"></a>
                                <div class="new-collections-grid123-image-pos products-right-grids-pos">
                                    <a href="/Product/singleproduct/{{$book->book_id}}">Xem nhanh</a>
                                </div>
                                <div class="new-collections-grid123-right">
                                    <div class="rating">
                                        @php
                                            $status = 0;
                                        @endphp
                                        @foreach($Rating as $rt)
                                            @if($rt->book_id == $book->book_id)
                                                @php
                                                    $temp = $rt->rating;
                                                    $pre = substr($temp,0,1);
                                                    $suff = substr($temp,2,4);
                                                    $status = 1;
                                                @endphp
                                                @for($j = 0 ; $j < $pre; $j++)
                                                    <div class="rating-left">
                                                        <img src="/images/2.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                                @if($suff == 0 && $pre != 5)
                                                    <div class="rating-left">
                                                        <img src="/images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @elseif($suff > 0)
                                                    <div class="rating-left">
                                                        <img src="/images/hjhj.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endif
                                                @for($j = 0 ; $j < 5-($pre+1); $j++)
                                                    <div class="rating-left">
                                                        <img src="/images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                            @endif
                                        @endforeach
                                        @if($status == 0)
                                            @for($j = 0 ; $j < 5 ; $j++)
                                                <div class="rating-left">
                                                    <img src="/images/1.png" alt=" " class="img-responsive"/>
                                                </div>
                                            @endfor
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    @if($book->book_sale > 0)
                                    <p>{{$book->book_sale}} %</p>
                                    @endif
                                </div>
                            </div>
                            <h4><a href="single.blade.php" style="height: 28px;">{{$book->book_name}}</a></h4>
                            <p>{{$book->book_author}}</p>
                            <div class="simpleCart_shelfItem products-right-grid1-add-cart">
                                <p>
                                    <span style="padding: 0px;font-size: 17px" class="item_price" > {{number_format($book->book_price - ($book->book_price * $book->book_sale)/100,0,',','.')}}đ </span> </br>
                                    <a class="item_add" href="/Addtocart/{{$book->book_id}}/{{$book->book_name}}">Thêm vào giỏ </a>
                                </p>
                            </div>
                        </div>
                        <br>
                    </div>

                    @endforeach
                    <div class="clearfix"> </div>
                </div>

                <nav class="numbering animated wow slideInRight" data-wow-delay=".5s">
                    {{$Books->links()}}
                </nav>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
@endsection
