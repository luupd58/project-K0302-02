@extends('client.layout.layout_client')
@section('content')
    {{--{{dd($customer)}}--}}
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Trang chủ</a> / <span>Loại sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- End container -->
</div> <!-- inner-header -->
<div class="name-product_type">
    <h2 class="color-full">TÊN CỦA LOẠI SẢN PHẨM</h2>
</div>
<br>
<div class="content-product_type">
    <div class="container">
        <div class="row">          
            <div class="filter-content">
                <a href="{{route('product-type')}}" ><button 
                    class="margin-btn all-product">Tất cả</button></a>
                <a href="{{route('hot')}}" ><button 
                    class="margin-btn hot-product">Hot</button></a>
                <a href="{{route('promotion')}}" ><button 
                    class="margin-btn promotion-product">Khuyến mại</button></a>
            </div>
        </div> <!-- .row -->
        <hr>
        <div class="content">
            <div class="col-sm-12">
                <div class="beta-products-details">
                    <p class="pull-left">Tìm thấy
                        {{ $count_product}} sản phẩm</p>

                    <div class="clearfix"></div>
                </div> <!-- End beta-products-details -->
                <div class="row">
                    @if(isset($product))
                    @foreach($product as $pr)
                    <div class="col-sm-3">
                        <div class="each-list">
                            <div class="row">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <div class="products">
                                                <img src="{{ 
                                                    asset($pr['image']) }}" 
                                                    alt=""/>
                                                <div class="products-details 
                                                	animate">
                                                    <div class="products-header">
                                                    </div>
                                                    <div class="products-detail">
                                                        <p>{{ 
                                                            $pr['product_name'] 
                                                            }}</p>
                                                        <div class="social">
                                                            {{ 
                                                                $pr['description'] 
                                                                }}
                                                        </div>
                                                    </div> <!-- .products-detai -->
                                                </div> <!-- animate -->
                                            </div> <!-- .products -->
                                        </div> <!-- End single-item-header -->

                                        <div class="single-item-body">
                                            <p class="single-item-title">
                                            	{{ str_limit(
                                                    $pr['product_name'],14)}}
                                            </p>
                                            <p class="single-item-price">
                                                Giá: <span>{{ $pr['price'] }}
                                                    </span> VND
                                            </p>
                                        </div> <!-- End single-item-body -->

                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('add-to-cart',
                                                $pr->id)}}">
                                            	<i class="fa fa-shopping-cart">
                                            	</i></a>
                                            <a class="beta-btn primary"
                                               href="{{ route('product',
                                                ['id'=>$pr->id]) }}">Details
                                            	<i class="fa fa-chevron-right">
                                            	</i></a>
                                            <div class="clearfix"></div>
                                        </div> <!-- End single-item-caption -->
                                    </div> <!-- End single-item -->
                                </div> <!-- .col-xs-10 -->
                            </div> <!-- .row -->
                            <div class="clearfix"></div>
                        </div> <!-- .each-list -->
                    </div> <!-- .col-sm-3 -->
                    @endforeach
                    @endif

                    <div class="row">
                         @if(isset($product))
                                {{$product->links()}}
                          @endif
                    </div>

                    @if(isset($product_hot))
                         @foreach($product_hot as $pr)
                                <div class="col-sm-3">
                                    <div class="each-list">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="single-item">
                                                    <div class="single-item-header">
                                                        <div class="products">
                                                            <img src="{{ 
                                                                asset($pr['image']) 
                                                                }}" alt=""/>
                                                            <div class="products-details
                                                	animate">
                                                                <div class="products-header">
                                                                </div>
                                                                <div class="products-detail">
                                                                    <p>{{ $pr['product_name'] }}</p>
                                                                    <div class="social">
                                                                        {{ $pr['description'] }}
                                                                    </div>
                                                                </div> <!-- .products-detai -->
                                                            </div> <!-- animate -->
                                                        </div> <!-- .products -->
                                                    </div> <!-- End single-item-header -->

                                                    <div class="single-item-body">
                                                        <p class="single-item-title">
                                                            {{ str_limit(
                                                                $pr['product_name'],14
                                                                )}}
                                                        </p>
                                                        <p class="single-item-price">
                                                            Giá: <span>{{ $pr['price'] 
                                                                }}</span> VND
                                                        </p>
                                                    </div> <!-- End single-item-body -->

                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left"
                                                           href="{{route('add-to-cart',
                                                            $pr->id)}}">
                                                            <i class="fa fa-shopping-cart">
                                                            </i></a>
                                                        <a class="beta-btn primary"
                                                           href="{{ route('product',
                                                            ['id'=>$pr->id]) }}">
                                                            Details
                                                            <i class="fa 
                                                                fa-chevron-right">
                                                            </i></a>
                                                        <div class="clearfix"></div>
                                                    </div> <!-- End single-item-caption -->
                                                </div> <!-- End single-item -->
                                            </div> <!-- .col-xs-10 -->
                                        </div> <!-- .row -->
                                        <div class="clearfix"></div>
                                    </div> <!-- .each-list -->
                                </div> <!-- .col-sm-3 -->
                         @endforeach
                    @endif

                    <div class="row">
                         @if(isset($product_hot))
                                {{$product_hot->links()}}
                        @endif
                    </div>

                    @if(isset($product_promotion))
                            @foreach($product_promotion as $pr)
                                <div class="col-sm-3">
                                    <div class="each-list">
                                        <div class="row">
                                            <div class="col-xs-10 col-xs-offset-1">
                                                <div class="single-item">
                                                    <div class="single-item-header">
                                                        <div class="products">
                                                            <img src="{{ asset($pr->product->image) }}" alt=""/>
                                                            <div class="products-details
                                                	animate">
                                                                <div class="products-header">
                                                                </div>
                                                                <div class="products-detail">
                                                                    <p>{{ $pr->product->product_name }}</p>
                                                                    <div class="social">
                                                                        {{ $pr->product->description }}
                                                                    </div>
                                                                </div> <!-- .products-detai -->
                                                            </div> <!-- animate -->
                                                        </div> <!-- .products -->
                                                    </div> <!-- End single-item-header -->

                                                    <div class="single-item-body">
                                                        <p class="single-item-title">
                                                            {{ str_limit($pr->product->product_name,14)}}
                                                        </p>
                                                        <p class="single-item-price">
                                                            Giá: <span>{{ $pr
                                                                ->product->price }}
                                                                </span> VND
                                                        </p>
                                                    </div> <!-- End single-item-body -->

                                                    <div class="single-item-caption">
                                                        <a class="add-to-cart pull-left"
                                                           href="{{route('add-to-cart',
                                                            $pr->id)}}">
                                                            <i class="fa fa-shopping-cart">
                                                            </i></a>
                                                        <a class="beta-btn primary"
                                                           href="{{ route('product',
                                                            ['id'=>$pr->id]) }}">
                                                            Details
                                                            <i class="fa 
                                                            fa-chevron-right">
                                                            </i></a>
                                                        <div class="clearfix"></div>
                                                    </div> <!-- End single-item-caption -->
                                                </div> <!-- End single-item -->
                                            </div> <!-- .col-xs-10 -->
                                        </div> <!-- .row -->
                                        <div class="clearfix"></div>
                                    </div> <!-- .each-list -->
                                </div> <!-- .col-sm-3 -->
                            @endforeach
                    @endif
                    <div class="row">
                         @if(isset($product_promotion))
                             {{$product_promotion->links()}}
                         @endif
                    </div>

                    <!-- <div class="clearfix"></div> -->

                </div> <!-- .row -->
            </div> <!-- .col-sm-12 -->
        </div> <!-- .content -->
        <div class="col-sm-12">
        	<div class="pull-right">
	        </div> <!-- .pull-right -->
        </div> <!-- .row -->
    </div> <!-- End container -->
</div> <!-- End content-product_type-->

@endsection