<!-- HEADER  -->
<div id="header">
    {{--{{    session()->flush()}}--}}
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href=""><i class="fa fa-home"></i> 
                        số 3, Duy Tân, Cầu Giấy, Hà Nội</a></li>
                    <li><a href=""><i class="fa fa-phone"></i> 
                        0979097909</a></li>
                </ul>
            </div> <!-- End auto-width-left-->

            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">

                    @if(Session::has('customer'))

                        <li><a href="#">Chào bạn {{$customer['customer_name']}}
                            </a></li>
                        <li><a class="logout" href="{{route('logout')}}">
                            Đăng xuất</a></li>
                    @else
                        <li><a href="#"><i class="fa fa-user"></i>
                            Tài khoản</a></li>
                        <li><a href="{{route('signup')}}">Đăng kí</a></li>
                        <li><a href="{{route('loginCustomer')}}">
                            Đăng nhập</a></li>
                    @endif
                </ul>
            </div> <!-- End auto-width-right -->
            <div class="clearfix"></div>
        </div> <!-- End container -->
    </div> <!-- End header-top -->
    <div class="clearfix"></div>
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{ route('index') }}" id="logo"><img
                    src="{{asset('lib/images/logo-Copy.png')}}" width="180px" 
                        alt=""></a>
            </div> <!-- End pull-lef -->

            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form class="navbar-form" role="search" method="get"  
                        name="searchForm"
                        id="searchform" action="{{ route('search-a') }}" >

                        <div class="input-group">
                            <input type="text" class="form-control" value="" 
                                name="key" id="search" placeholder="Search">
                            <div class="input-group-btn">
                                <button class="btn btn-default" 
                                    id="searchsubmit" 
                                    type="submit">
                                    <i class="glyphicon glyphicon-search"></i>
                                </button>
                            </div> <!-- .input-group-btn -->
                        </div> <!-- .input-group -->
                    </form> <!-- End form -->
                </div> <!-- End beta-comp -->
                {{--{{ Session::flush()}}--}}

                <div class="beta-comp">
                    {{--@if(Session::has('cart'))--}}
                    <div class="beta-select"><i class="fa fa-shopping-cart"></i> 
                        Giỏ hàng
                        (@if(Session::has('cart')){{ Session('cart')
                            ->totalQty}}
                        @else Trống @endif)
                        <i class="fa fa-chevron-down"></i>
                    </div>
                    @if(Session::has('cart') && $product_cart != null)
                    <div class="beta-dropdown cart-body">
                        {{--Kiểm tra có giỏ hàng hay k--}}
                        @foreach($product_cart as $product)
                        <div class="cart-item">
                            <a class="cart-item-delete" 
                                href="{{route('del-cart',
                                $product['item']['id'])}}">One
                                <i class="fa fa-times"></i></a>
                            <a class="cart-item-delete-all" 
                                href="{{route('del-cart-all',
                                $product['item']['id'])}}">All
                                <i class="fa fa-times"></i></a>
                            <div class="media">

                                <a class="pull-left" href="#"><img
                                    src="{{asset($product['item']['image'])}}" 
                                        alt="">
                                </a>
                                <div class="media-body">
                                    <span class="cart-item-title">
                                        {{$product['item']['product_name']}}
                                        </span>
                                    <span class="cart-item-amount">
                                        {{$product['qty']}}*<span>
                                            {{number_format(
                                            $product['item']['price'])}}</span>
                                    </span>
                                </div>
                            </div> <!-- .media -->
                        </div> <!-- End cart-item -->
                        @endforeach
                        {{--@endif--}}
                        <div class="cart-caption">
                            {{--{{var_dump($totalPrice)}}--}}
                            <div class="cart-total text-right">Tổng tiền: <span
                                class="cart-total-value">
                                    @if(Session::has('cart'))
                                        {{number_format($totalPrice)}}
                                    @else 0 @endif đồng</span></div>

                            <div class="clearfix"></div>
                            {{--{{dd(Session('cart')->totalPrice)}}--}}
                            <div class="center">
                                <div class="space10">&nbsp;</div>
                                @if(Session::has('customer'))
                                    {{--{{dd($customer['custome_name'])}}--}}
                                    <a href="{{ route('checkout2') }}"
                                       class="beta-btn primary text-center">
                                        Đặt hàng
                                        <i class="fa fa-chevron-right"></i></a>
                                @else
                                    <a href="{{ route('checkout') }}"
                                       class="beta-btn primary text-center">
                                       Đặt hàng
                                        <i class="fa fa-chevron-right"></i></a>
                                @endif
                            </div>

                        </div> <!-- End cart-caption -->
                    </div> <!-- End cart-body -->

                </div> <!-- End beta-comp -->
                @endif
                    {{--@endif--}}
            </div> <!-- End beta-components -->
            <div class="clearfix"></div>
        </div> <!-- End beta-relative -->
    </div> <!-- End header-body -->

    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <nav class="navbar navbar-inverse">
                <div class="container" style="background-color: #0277b8;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" 
                            data-toggle="collapse" data-target="#menu" 
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="collapse navbar-collapse" id="menu">
                        <ul class="nav navbar-nav">
                            <li class="active"><a 
                                href="{{route('index')}}">Trang chủ
                                <span class="sr-only">(current)</span></a></li>
                            <li class="dropdown">
                                <a href="{{route('product-type')}}" 
                                    class="dropdown-togglte">
                                    Sản phẩm <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach($product_type as $pt)
                                    <li><a href="{{route('product-type-detail',
                                        $pt->id)}}">{{$pt->product_type_name}}
                                        </a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="#">Giới thiệu</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div><!-- .navbar-collapse -->
                </div><!-- .container -->
            </nav>
        </div> <!-- .container -->
    </div><!-- header-bottom -->
    <div class="hidden">
        @if(Session::has('hethang'))
            <div class="getNotifyProduct" dataValue="1"></div>
            {{ Session::forget('hethang') }}
        @else
            <div class="getNotifyProduct" dataValue="0"></div>
        @endif
    </div>
</div> <!-- End id header -->
<!-- End HEADER  -->