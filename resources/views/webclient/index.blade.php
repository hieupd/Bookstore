@extends('webclient.layout')

@section('title')
    Trang chủ
@endsection
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- js -->
    <script src="/js/jquery.min.js"></script>
    <!-- //js -->
    <!-- cart
    <script src="/js/simpleCart.min.js"></script>-->
    <!-- cart -->
    <!-- for bootstrap working -->
    <script type="text/javascript" src="/js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
          rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic'
          rel='stylesheet' type='text/css'>
    <!-- timer -->
    <link rel="stylesheet" href="/css/jquery.countdown.css"/>
    <!-- //timer -->
    <!-- animation-effect -->
    <link href="/css/animate.min.css" rel="stylesheet">
    <script src="/js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>

@endsection
@section('content')
    <div class="banner">
        <div class="container">
            <div class="banner-info animated wow zoomIn" data-wow-delay=".5s">
                <h3>Bookstore Online</h3>
                <h4>Up to <span>50% <i>Off/-</i></span></h4>
                <div class="wmuSlider example1">
                    <div class="wmuSliderWrapper">
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <div class="banner-info1">
                                    <img src="images/11.jpg"> <img src="images/12.jpg"> <img src="images/18.jpg"> <img
                                            src="images/24.jpg">
                                </div>
                            </div>
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <div class="banner-info1">
                                    <img src="images/11.jpg"> <img src="images/12.jpg"> <img src="images/18.jpg"> <img
                                            src="images/33.jpg">
                                </div>
                            </div>
                        </article>
                        <article style="position: absolute; width: 100%; opacity: 0;">
                            <div class="banner-wrap">
                                <div class="banner-info1">
                                    <img src="images/11.jpg"> <img src="images/si.jpg"> <img src="images/18.jpg"> <img
                                            src="images/24.jpg">
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <script src="js/jquery.wmuSlider.js"></script>
                <script>
                    $('.example1').wmuSlider();
                </script>
            </div>
        </div>
    </div>
    <div class="new-collections">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Sách Bán Chạy Nhất</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Toàn bộ sách mới đã được chúng tôi cập nhật lên website.
                Kính mời quý độc giả có thể tham khảo </p>
            @if($Books!=null)
            <div class="new-collections-grids">
                @for($i = 0 ; $i < 8 ;$i= $i+2)
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s" >
                            <div class="new-collections-grid1-image">
                                <a href="#" class="product-image"><img style="width: 291.4px; height: 388.53px; " src="/upload/book_image/{{$Books[$i]->book_image}}"
                                                                       class="img-responsive"/></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="/Product/singleproduct/{{$Books[$i]->book_id}}">Xem nhanh</a>
                                </div>

                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        @php
                                            $status = 0;
                                        @endphp
                                        @foreach($Rating as $rt)
                                            @if($rt->book_id == $Books[$i]->book_id)
                                                @php
                                                    $temp = $rt->rating;
                                                    $pre = substr($temp,0,1);
                                                    $suff = substr($temp,2,4);
                                                    $status = 1;
                                                @endphp
                                                @for($j = 0 ; $j < $pre; $j++)
                                                    <div class="rating-left">
                                                        <img src="images/2.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                                @if($suff == 0 && $pre != 5)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @elseif($suff > 0)
                                                    <div class="rating-left">
                                                        <img src="images/hjhj.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endif
                                                @for($j = 0 ; $j < 5-($pre+1); $j++)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                            @endif
                                        @endforeach
                                        @if($status == 0)
                                            @for($j = 0 ; $j < 5 ; $j++)
                                                <div class="rating-left">
                                                    <img src="images/1.png" alt=" " class="img-responsive"/>
                                                </div>
                                            @endfor
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    <p>Hot</p>
                                </div>
                            </div>

                            <div class="text-center">
                            <div class="item_name" style="width: 250px; height: 40px;"><h4><a href="single">{{$Books[$i]->book_name}}</a></h4></div>
                            <p>{{$Books[$i]->book_author}}</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem"  >
                                <p>
                                    @if($Books[$i]->book_sale > 0)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="book_price{{$Books[$i]->book_id}}"> {{number_format($Books[$i]->book_price,0,',','.')}}đ </i>
                                    @endif
                                        &nbsp;&nbsp;&nbsp; <span style="padding: 0px;" class="item_price"> {{number_format($Books[$i]->book_price - ($Books[$i]->book_price * $Books[$i]->book_sale)/100,0,',','.')}}đ </span> </br>
                                    <a class="item_add" href="/Addtocart/{{$Books[$i]->book_id}}/{{$Books[$i]->book_name}}">Thêm vào giỏ</a>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="#" class="product-image"><img style="width: 291.4px; height: 388.53px; " src="/upload/book_image/{{$Books[$i+1]->book_image}}"
                                                                       class="img-responsive"/></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="/Product/singleproduct/{{$Books[$i+1]->book_id}}">Xem nhanh</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        @php
                                            $status = 0;
                                        @endphp
                                        @foreach($Rating as $rt)
                                            @if($rt->book_id == $Books[$i+1]->book_id)
                                                @php
                                                    $temp = $rt->rating;
                                                    $pre = substr($temp,0,1);
                                                    $suff = substr($temp,2,4);
                                                    $status = 1;
                                                @endphp
                                                @for($j = 0 ; $j < $pre; $j++)
                                                    <div class="rating-left">
                                                        <img src="images/2.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                                @if($suff == 0 && $pre != 5)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @elseif($suff > 0)
                                                    <div class="rating-left">
                                                        <img src="images/hjhj.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endif
                                                @for($j = 0 ; $j < 5-($pre+1); $j++)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                            @endif
                                        @endforeach
                                        @if($status == 0)
                                            @for($j = 0 ; $j < 5 ; $j++)
                                                <div class="rating-left">
                                                    <img src="images/1.png" alt=" " class="img-responsive"/>
                                                </div>
                                            @endfor
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    <p>Hot</p>
                                </div>
                            </div>
                            <div class="text-center">
                            <div class="item-name"><h4 style="width: 250px; height: 40px;"><a href="single">{{$Books[$i+1]->book_name}}đ</a></h4></div>
                            <p>{{$Books[$i+1]->book_author}}</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p>
                                    @if($Books[$i+1]->book_sale > 0)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="book_price"> {{number_format($Books[$i+1]->book_price,0,',','.')}}</i>
                                    @endif
                                        &nbsp;&nbsp;&nbsp;<span class="item_price">{{number_format($Books[$i+1]->book_price - ($Books[$i+1]->book_price * $Books[$i+1]->book_sale)/100,0,',','.')}}đ</span> </br>
                                    <a class="item_add" href="/Addtocart/{{$Books[$i+1]->book_id}}/{{$Books[$i+1]->book_name}}">Thêm vào giỏ</a>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
            @else
                <br>
                <H2 style="text-align: center">Không có dữ liệu trong cơ sở</H2>
            @endif
        </div>
    </div>
    <div class="new-collections">
        <div class="container">
            <h3 class="animated wow zoomIn" data-wow-delay=".5s">Sách Mới Cập Nhật</h3>
            <p class="est animated wow zoomIn" data-wow-delay=".5s">Toàn bộ sách mới đã được chúng tôi cập nhật lên website.
                Kính mời quý độc giả có thể tham khảo </p>
            @if($LNewsBook != 0)
            <div class="new-collections-grids">
                @for($i = 0 ; $i < 8 ;$i= $i+2)
                    <div class="col-md-3 new-collections-grid">
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="#" class="product-image"><img style="width: 291.4px; height: 388.53px; " src="/upload/book_image/{{$LNewsBook[$i]->book_image}}"
                                                                       class="img-responsive"/></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="/Product/singleproduct/{{$LNewsBook[$i]->book_id}}">Xem nhanh</a>
                                </div>

                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        @php
                                            $status = 0;
                                        @endphp
                                        @foreach($Rating as $rt)
                                            @if($rt->book_id == $LNewsBook[$i]->book_id)
                                                @php
                                                    $temp = $rt->rating;
                                                    $pre = substr($temp,0,1);
                                                    $suff = substr($temp,2,4);
                                                    $status = 1;
                                                @endphp
                                                @for($j = 0 ; $j < $pre; $j++)
                                                        <div class="rating-left">
                                                            <img src="images/2.png" alt=" " class="img-responsive"/>
                                                        </div>
                                                @endfor
                                                @if($suff == 0 && $pre != 5)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @elseif($suff > 0)
                                                    <div class="rating-left">
                                                        <img src="images/hjhj.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endif
                                                @for($j = 0 ; $j < 5-($pre+1); $j++)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                            @endif
                                        @endforeach
                                        @if($status == 0)
                                            @for($j = 0 ; $j < 5 ; $j++)
                                                <div class="rating-left">
                                                    <img src="images/1.png" alt=" " class="img-responsive"/>
                                                </div>
                                            @endfor
                                        @endif
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    <p>New</p>
                                </div>
                            </div>
                            <div class="text-center">
                            <div class="item-name" style="width: 250px; height: 40px;"><h4><a href="single">{{$LNewsBook[$i]->book_name}}</a></h4></div>
                            <p>{{$LNewsBook[$i]->book_author}}</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p>
                                    @if($LNewsBook[$i]->book_sale > 0)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="book_price">{{number_format($LNewsBook[$i]->book_price,0,',','.')}}đ </i>
                                    @endif
                                    &nbsp;&nbsp;&nbsp;<span class="item_price">{{number_format($LNewsBook[$i]->book_price - ($LNewsBook[$i]->book_price * $LNewsBook[$i]->book_sale)/100,0,',','.')}}đ </span> </br>
                                    <a class="item_add" href="/Addtocart/{{$LNewsBook[$i]->book_id}}/{{$LNewsBook[$i]->book_name}}">Thêm vào giỏ</a>
                                </p>
                            </div>
                            </div>
                        </div>
                        <div class="new-collections-grid1 animated wow slideInUp" data-wow-delay=".5s">
                            <div class="new-collections-grid1-image">
                                <a href="#" class="product-image"><img style="width: 291.4px; height: 388.53px; " src="/upload/book_image/{{$LNewsBook[$i+1]->book_image}}"
                                                                       class="img-responsive"/></a>
                                <div class="new-collections-grid1-image-pos">
                                    <a href="/Product/singleproduct/{{$LNewsBook[$i+1]->book_id}}">Xem nhanh</a>
                                </div>
                                <div class="new-collections-grid1-right">
                                    <div class="rating">
                                        @php
                                            $status = 0;
                                        @endphp
                                        @foreach($Rating as $rt)
                                            @if($rt->book_id == $LNewsBook[$i+1]->book_id)
                                                @php
                                                    $temp = $rt->rating;
                                                    $pre = substr($temp,0,1);
                                                    $suff = substr($temp,2,4);
                                                    $status = 1;
                                                @endphp
                                                @for($j = 0 ; $j < $pre; $j++)
                                                    <div class="rating-left">
                                                        <img src="images/2.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                                @if($suff == 0 && $pre != 5)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @elseif($suff > 0)
                                                    <div class="rating-left">
                                                        <img src="images/hjhj.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endif
                                                @for($j = 0 ; $j < 5-($pre+1); $j++)
                                                    <div class="rating-left">
                                                        <img src="images/1.png" alt=" " class="img-responsive"/>
                                                    </div>
                                                @endfor
                                            @endif
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="new-one">
                                    <p>New</p>
                                </div>
                            </div>
                            <div class="text-center">
                            <div class="item-name"><h4 style="width: 250px;height: 40px;"><a href="single">{{$LNewsBook[$i+1]->book_name}}</a></h4></div>
                            <p style="padding: 0px;">{{$LNewsBook[$i+1]->book_author}}</p>
                            <div class="new-collections-grid1-left simpleCart_shelfItem">
                                <p>
                                    @if($LNewsBook[$i+1]->book_sale > 0)
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="book_price">{{number_format($LNewsBook[$i+1]->book_price,0,',','.')}}đ </i>
                                    @endif
                                        &nbsp;&nbsp;&nbsp;<span class="item_price"> {{number_format($LNewsBook[$i+1]->book_price - ($LNewsBook[$i+1]->book_price * $LNewsBook[$i+1]->book_sale)/100,0,',','.')}}đ </span> </br>
                                    <a class="item_add" href="/Addtocart/{{$LNewsBook[$i]->book_id}}/{{$LNewsBook[$i]->book_name}}">Thêm vào giỏ</a>
                                </p>
                            </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>

            @else
                <br>
                <H2 style="text-align: center">Không có dữ liệu trong cơ sở</H2>
            @endif
        </div>
    </div>
    <div class="timer">
        <div class="container">
            <div class="timer-grids">
                <div class="col-md-8 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <h3><a href="products">Hiệp Sĩ Áo Cỏ</a></h3>
                    <div class="rating">
                        <div class="rating-left">
                            <img src="images/2.png" alt=" " class="img-responsive"/>
                        </div>
                        <div class="rating-left">
                            <img src="images/2.png" alt=" " class="img-responsive"/>
                        </div>
                        <div class="rating-left">
                            <img src="images/2.png" alt=" " class="img-responsive"/>
                        </div>
                        <div class="rating-left">
                            <img src="images/2.png" alt=" " class="img-responsive"/>
                        </div>
                        <div class="rating-left">
                            <img src="images/1.png" alt=" " class="img-responsive"/>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">
                        <p><i>34000đ</i> <span class="item_price">27000đ</span></p>
                        <h4>
                            Tác giả: Tạ Duy Anh</br>
                            Nhà xuất bản: NXB Phụ Nữ</br>
                            Nhà phát hành: NXB Phụ Nữ</br>
                            Nội dung:</br>
                            Hiệp sĩ áo cỏ là một truyện đồng thoại hóm hỉnh. Từ cuộc chiến chống lại cái ác (đại diện là bọn
                            Diều hâu bắt cóc trẻ con), tác giả để cao tinh thần hiệp sĩ, can đảm của hai nhân vật chính là
                            Lang Đen và Lang Trắng.
                            Từ những mô tả chi tiết và sinh động sinh hoạt của các con thú ở đồng cỏ, với trí tưởng tượng và
                            liên tưởng tinh tế, tác giả dựng nên một xã hội thu nhỏ trong đó có người tốt kẻ xấu, người thật
                            thà kẻ mưu mẹo, người ngay kẻ gian...
                        </h4>
                        <p><a class="item_add timer_add" href="#">Thêm vào giỏ </a></p>
                    </div>
                    <div id="counter"></div>
                    <script src="js/jquery.countdown.js"></script>
                    <script src="js/script.js"></script>
                </div>
                <div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
                    <div class="timer-grid-right1">
                        <img src="images/17.jpg" alt=" " class="img-responsive"/>
                        <div class="timer-grid-right-pos">
                            <h4>Ưu đãi đặc biệt khi đặt sản phẩm</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>

@endsection