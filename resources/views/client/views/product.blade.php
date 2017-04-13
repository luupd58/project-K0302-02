@extends('client.layout.layout_client')



@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index.html">Trang chủ</a> / <span>Sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- End container -->
    </div> <!-- End inner-header -->
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
                <h2 class="color-full">SẢN PHẨM CHI TIẾT</h2>
                <hr>
                <div class="row">
                    <div class="col-sm-4">
                        <button type="button" class="btn btn-lg" 
                            data-toggle="modal" data-target="#info-img">
                            <img src="{{asset($product->image)}}" 
                            class="img-responsive" alt=""></button>
                        <div id="info-img" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <img src="{{asset($product->image)}}" 
                                            class="img-responsive" alt="">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" 
                                            class="btn btn-default" 
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div> <!-- .model-content -->
                            </div> <!-- .model-dialog -->
                        </div> <!-- .model -->
                    </div> <!-- .col-sm-4 -->
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <h3 class="single-item-title">
                                {{$product->product_name}}</h3>
                            <hr>
                            <h4>
                                Mã sản phẩm: <span>{{ $product -> id }}</span>
                            </h4>
                            <hr>
                            <h3 class="single-item-price">
                                Giá:<span class="price-each"> 
                                    {{$product->price}}</span> VND
                            </h3>
                            <hr>
                        </div>

                        <div class="clearfix"></div>

                        <div class="single-item-desc">
                        </div>
                        <hr>

                        <div class="cart single-item-options form-group" id="cart">
                            <div class="row">
                                <div class="col-xs-3">
                                    <label for="wc-select"><span 
                                        class="product-single-item-span">
                                        Số lượng:</span></label>
                                </div>
                                <div class="col-xs-4">

                                    <div class="row quantityCart">

                                        <form class="form-inline" 
                                            id="add-to-cart-count" method="get" 
                                            action="{{route('add-to-cart-count',
                                            ['productId'=> $product->id])}}">
                                            <input type="text" class="hidden" 
                                                name="id" 
                                                value="{{$product->id}}">
                                            <input type="text" class="hidden" 
                                                name="price" 
                                                value="{{$product->price}}">
                                            <div class="" 
                                                style="display: inline-block">
                                                <input class="hidden resultAjax" >
                                                <input class="subQuantity 
                                                    btn btn-default" 
                                                    type="button" value="-">
                                                <input class="quantity btn 
                                                    btn-default" name="color" 
                                                    type="number" 
                                                    style="width:40%" value="0">
                                                <input class="plusQuantity btn 
                                                    btn-default" type="button" 
                                                    value="+" dataQuantity="
                                                    {{$product ->id}}">
                                            </div>
                                            @if(Session::has('Product'.$product->id))
                                                <input class="hidden productOrder" 
                                                    name="productOrder" 
                                                    value="{{Session::get('Product'.$product->id)}}">
                                                @if(Session::get('Product'.$product->id) != 0)
                                                    <button ><i class="cart-product fa fa-shopping-cart"></i></button>
                                                {{--@else--}}
                                                @else
                                                     <div class="">
                                                         <br><p class="alert 
                                                            alert-danger" 
                                                            style="width:81%">
                                                            Sản phẩm hết hàng
                                                            </p>
                                                     </div>
                                                @endif
                                            @else
                                                <input class="hidden productOrder" name="productOrder" value="{{ $product->quantity }}">
                                                 <button ><i class="cart-product fa fa-shopping-cart"></i></button>
                                            @endif
                                            <br>
                                        </form>
                                    </div>

                                </div>
                                <div class="clearfix"></div>
                            </div> <!-- .row -->
                            <hr>

                            <div class="clearfix"></div>
                        </div> <!-- .single-item-options -->
                    </div> <!-- .col-sm-8 -->
                </div> <!-- .row -->

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description" class="color-full" 
                            style="font-size: 20px;">Mô tả</a></li>
                    </ul>
                    <div class="space15">&nbsp;</div>
                    <div class="panel" id="tab-description">
                        <p>
                            @if($product->description == null)
                                <p> Không có mô tả nào cho sản phẩm này!</p>
                            @else
                               <p> {{$product->description}}</p>
                            @endif
                    </div>
                    <div class="panel" id="tab-reviews">
                        <p>No Reviews</p>
                    </div>
                </div> <!-- .woocommerce-tabs -->
            </div> <!-- .col-sm-9 -->
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h4 class="color-full">SẢN PHẨM CÙNG LOẠI</h4>
                    <hr>
                    <div class="widget-body">
                        <div class="beta-sales beta-lists row">
                            @foreach($product_same_type as $productSame)
                            <div class="each-list">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <div class="products">

                                                <img src="{{asset($productSame
                                                    ->image)}}"/>
                                                <div class="products-details
                                                	animate">
                                                    <div class="products-header">
                                                    </div>
                                                    <div class="products-detail">
                                                        <p>{{$productSame
                                                            ->product_name}}
                                                        </p>
                                                        <div class="social">

                                                        </div>
                                                    </div>  <!-- .products-header -->
                                                </div> <!-- .products-details -->
                                            </div> <!-- .products -->
                                        </div> <!-- End single-item-header -->

                                        <div class="single-item-body">
                                            <p class="single-item-title">
                                                {{str_limit($productSame
                                                    ->product_name, 14)}} </p>
                                            <p class="single-item-price">
                                                Giá: <span>{{$productSame
                                                    ->price}}</span> VND
                                            </p>
                                        </div> <!-- End single-item-body -->

                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('add-to-cart',
                                                $productSame->id)}}">
                                            	<i class="fa fa-shopping-cart">
                                            	</i></a>
                                            <a class="beta-btn primary"
                                            href="{{ route('product',
                                            ['id'=>$productSame->id]) }}">
                                            Details <i
                                            class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div> <!-- End single-item-caption -->
                                    </div> <!-- End single-item -->
                                </div> <!-- .col-xs-10 -->
                                <div class="clearfix"></div>
                            </div> <!-- .each-list -->
                            @endforeach

                        </div> <!-- .beta-lists -->
                    </div> <!-- .widget-body -->
                </div> <!-- best sellers widget -->
            </div> <!-- .aside .col-sm-3 -->
            <div class="clearfix"></div>
        </div> <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
	            <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h3 class="color-full">SẢN PHẨM ĐANG BÁN CHẠY</h3>
                    <hr>
                    <div class="row">
                        @foreach($product_hot_sale as $productHotSale)
                        <div class="col-sm-3">
                            <div class="single-item">
                                <div class="single-item-header">
                                    <div class="products">
                                        <img src="{{asset($productHotSale 
                                            ->image)}}"/>
                                        <div class="products-details animate">
                                            <div class="products-header">
                                            </div>
                                            <div class="products-detail">
                                            	<p>{{$productHotSale
                                                    ->description}}</p>
                                            	<div class="social">
	                                                <a href="" class="social-icon
	                                                facebook animate"><span
	                                                class="fa fa-facebook">
	                                                </span></a>
	                                                <a href="" class="social-icon
	                                                twitter animate"><span
	                                                class="fa fa-twitter"></span>
	                                                </a> <a href=""
	                                                class="social-icon
	                                                google-plus animate"><span
	                                                class="fa fa-google-plus">
	                                                </span></a>
                                            	</div>
                                        	</div> <!-- .products-detail -->
                                    	</div> <!-- .products -->
                                	</div> <!-- End single-item-header -->
                            	</div> <!-- .single-item -->

	                            <div class="single-item-body">
	                                <p class="single-item-title">{{ 
                                        str_limit($productHotSale
                                        ->product_name, 14)}}
                                    </p>
	                                <p class="single-item-price">
	                                    Giá: <span>{{$productHotSale->price}}
                                            </span> VND
	                                </p>
	                            </div> <!-- End single-item-body -->

                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left"
                                       href="{{route('add-to-cart',
                                        $productHotSale->id)}}"><i
                                    	class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary"
                                    	href="{{ route('product',
                                        ['id'=>$productHotSale->id]) }}">
                                        Details <i class="fa
                                    	fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div> <!-- End single-item-caption -->
                            </div> <!-- End single-item -->
                        </div> <!-- End col-sm-3 -->
                        @endforeach


                    </div> <!-- End row -->
                </div> <!-- End beta-products-list -->
            </div> <!-- .col-sm-12 -->
        </div> <!-- .row-->
    </div> <!-- #content -->
</div> <!-- .container -->
<!-- End content -->

@endsection