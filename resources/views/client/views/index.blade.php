@extends('client.layout.layout_client')

@section('content')
    <!-- Content -->
    <!-- Slider -->
    {{--{{dd($customer)}}--}}
    <div class="rev-slider">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="carousel-example-generic" class="carousel slide"
                         data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($slide as $key => $image)
                                @if ($key == 0)
                                    <div class="item active">
                                        <img src="{{ asset($image->image_slider) }}" 
                                            class="img-product">
                                        <div class="carousel-caption"></div>
                                    </div>
                                @else
                                    <div class="item">
                                        <img src="{{ asset($image->image_slider) }}" 
                                            class="img-product">
                                        <div class="carousel-caption"></div>
                                    </div>
                                @endif
                            @endforeach
                        </div> <!-- .carousel-inner -->
                        <a class="left carousel-control"
                           href="#carousel-example-generic"
                           data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left">
                                </span> </a>
                        <a class="right carousel-control"
                           href="#carousel-example-generic"
                           data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right">
                                </span> </a>
                        <ol class="carousel-indicators">
                            @foreach ($slide as $key => $image)
                                @if ($key == 0)
                                    <li data-target="#carousel-example-generic" 
                                        data-slide-to="{{ $key }}" 
                                        class="active"></li>
                                @else
                                    <li data-target="#carousel-example-generic" 
                                        data-slide-to="{{ $key }}"></li>
                                @endif
                            @endforeach
                        </ol>
                    </div> <!-- .slide -->
                </div> <!-- .col-md-12 -->
            </div> <!-- .row -->
        </div> <!-- End container -->
    </div> <!-- End rev-slider -->
    <!-- End Slider -->
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div> <!-- End beta-products-details -->

                            <div class="row">
                                @foreach($new_product as $value)
                                <div class="col-sm-3">
                                    <div class="single-item">

                                        <div class="single-item-header">
                                            <div class="products">
                                                <a><img 
                                                    src="{{$value -> image }}" 
                                                    alt=""></a>
                                                <div class="products-details 
                                                    animate">
                                                    <div class="
                                                        products-header">
                                                    </div>
                                                    <div class="
                                                        products-detail">
                                                        <p>{{ $value -> 
                                                            description }}</p>
                                                    </div> <!-- .products-detail -->
                                                </div> <!-- .product-detail animate -->
                                            </div> <!-- .products -->
                                        </div> <!-- End single-item-header -->

                                        <div class="single-item-body">
                                            <p class="single-item-title">
                                                {{ str_limit($value -> 
                                                    product_name,14) }} </p>
                                            <p class="single-item-price">
                                                <span>Giá: {{ $value -> 
                                                    price }} VND</span>
                                            </p>
                                        </div> <!-- End single-item-body -->

                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('add-to-cart',
                                                $value->id)}}">
                                                <i class="fa fa-shopping-cart"> 
                                                </i>
                                            </a>
                                            <a class="beta-btn primary"
                                               href="{{ route('product',['id'=>
                                                $value->id]) }}">Details
                                                <i class="fa fa-chevron-right">
                                                </i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div> <!-- End single-item-caption -->
                                    </div> <!-- End single-item -->
                                </div> <!-- End col-sm-3 -->
                                @endforeach
                            </div> <!-- End row -->
                        </div> <!-- End beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">

                            <h4>Promotion Products</h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div> <!-- End beta-products-details -->
                            <div class="row">
                                @foreach($product_promotion as $key => $value)

                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <div class="products">
                                                    <a><img src="
                                                        {{$value->product->image}}" 
                                                        alt=""></a>
                                                    <div class="products-details 
                                                        animate">
                                                        <div class="
                                                            products-header">
                                                        </div>
                                                        <div class="
                                                            products-detail">
                                                            <p>{{ $value ->
                                                                product-> 
                                                                description }}
                                                                </p>
                                                        </div> <!-- .products-detail -->
                                                    </div> <!-- .product-detail animate -->
                                                </div> <!-- .products -->
                                            </div> <!-- End single-item-header -->

                                            <div class="single-item-body">
                                                <p class="single-item-title">
                                                    {{ str_limit($value 
                                                        ->product
                                                        ->product_name,14) }}
                                                        </p>
                                                <p class="single-item-price">
                                                    <span>Giá: {{ $value 
                                                        ->product
                                                        ->price }} VND</span>
                                                </p>
                                            </div> <!-- End single-item-body -->

                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('add-to-cart',
                                                    $value->id)}}">
                                                    <i class="fa 
                                                        fa-shopping-cart"></i>
                                                </a>
                                                <a class="beta-btn primary"
                                                   href="{{ route('product',
                                                   ['id'=>$value->id]) }}">
                                                   Chi tiết
                                                    <i class="fa 
                                                    fa-chevron-right"></i>
                                                </a>
                                                <div class="clearfix"></div>
                                            </div> <!-- End single-item-caption -->
                                        </div> <!-- End single-item -->
                                    </div> <!-- End col-sm-3 -->
                                @endforeach
                            </div> <!-- End row -->
                        </div> <!-- End beta-products-list -->

                        <div class="beta-products-list">

                            <h4>Hot Products</h4>
                            <div class="beta-products-details">
                                <div class="clearfix"></div>
                            </div> <!-- End beta-products-details -->

                            <div class="row">
                                @foreach($product_hot_sale as $value)
                                    <div class="col-sm-3">
                                        <div class="single-item">

                                            <div class="single-item-header">
                                                <div class="products">
                                                    <a><img src="
                                                        {{$value->image}}" 
                                                        alt=""></a>
                                                    <div class="products-details 
                                                        animate">
                                                        <div class="
                                                            products-header">
                                                        </div>
                                                        <div class="
                                                            products-detail">
                                                            <p>{{ $value 
                                                                -> description }}
                                                                </p>
                                                        </div> <!-- .products-detail -->
                                                    </div> <!-- .product-detail animate -->
                                                </div> <!-- .products -->
                                            </div> <!-- End single-item-header -->

                                            <div class="single-item-body">
                                                <p class="single-item-title">
                                                    {{ str_limit($value
                                                        ->product_name,14) }} 
                                                        </p>
                                                <p class="single-item-price">
                                                    <span>Giá: 
                                                    {{ $value->price }} VND
                                                    </span>
                                                </p>
                                            </div> <!-- End single-item-body -->

                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"
                                                   href="{{route('add-to-cart',
                                                   $value->id)}}">
                                                    <i class="fa 
                                                    fa-shopping-cart"></i>
                                                </a>
                                                <a class="beta-btn primary"
                                                   href="{{ route('product',
                                                   ['id'=>$value->id]) }}">
                                                   Chi tiết
                                                    <i class="fa 
                                                    fa-chevron-right"></i>
                                                </a>
                                                <div class="clearfix"></div>
                                            </div> <!-- End single-item-caption -->
                                        </div> <!-- End single-item -->
                                    </div> <!-- End col-sm-3 -->
                                @endforeach
                            </div> <!-- End row -->
                        </div> <!-- End beta-products-list -->
                    </div> <!-- End col-sm-12 -->
                </div> <!-- End row -->
            </div> <!-- End main-content-->
        </div> <!-- End content-->
    </div> <!-- End container -->
    <!-- End content -->
@endsection