@extends('client.layout.layout_client')

@section('content')
{{--{{dd($slide)}}--}}
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Trang chủ</a> / <span>Tìm kiếm</span> / 
                	<span>Từ tìm kiếm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- End container -->
</div> <!-- End inner-header-->
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-md-12 text-search">
                <p>"Kết quả tìm kiếm<span>
                	<b>Từ khóa tìm kiếm</b></span>"</p>
                <hr>
            </div>
            <div class="col-sm-12 aside">
                <div class="widget">
                    <div class="widget-body">
                        <div class="beta-sales beta-lists row">
                            @foreach($product as $pr)
                            <div class="each-list col-xs-3">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="single-item">
                                        <div class="single-item-header">
                                            <div class="products">
                                            	<img 
                                                	style="width: 100%" 
                                                	src="{{ asset($pr ->image)}}" 
                                                        alt="">
                                                <div class="products-details 
                                                	animate">
                                                    <div class="products-header">
                                                    </div>
                                                    <div class="products-detail">
                                                        <p>{{$pr ->product_name}}
                                                        	</p>
                                                        <div class="social">
                                                            <a href="" 
                                                            class="social-icon 
                                                            facebook animate">
                                                            <span class="fa 
                                                            fa-facebook"></span>
                                                            </a>
                                                            <a href="" 
                                                            class="social-icon 
                                                            twitter animate">
                                                            <span class="fa 
                                                            fa-twitter">
                                                            </span></a> 
                                                            <a href="" 
                                                            class="social-icon 
                                                            google-plus 
                                                            animate"><span 
                                                            class="fa 
                                                            fa-google-plus">
                                                            </span></a>
                                                        </div>
                                                    </div> <!-- .products-detail-->
                                                </div> <!-- .animate-->
                                            </div> <!-- .products-->
                                        </div> <!-- End single-item-header -->

                                        <div class="single-item-body">
                                            <p class="single-item-title">
                                                {{$pr ->product_name}}</p>
                                            <p class="single-item-price">
                                                Giá: <span>{{$pr ->price}}</span>
                                                VND
                                            </p>
                                        </div> <!-- End single-item-body -->

                                        <div class="single-item-caption">
                                            <a class="add-to-cart pull-left"
                                               href="{{route('add-to-cart',
                                                $pr->id)}}">
                                                <i class="fa fa-shopping-cart"></i>
                                            </a>
                                            <a class="beta-btn primary"
                                               href="{{ route('product',
                                                ['id'=>$pr->id]) }}">Chi tiết
                                                <i class="fa fa-chevron-right"></i>
                                            </a>
                                            <div class="clearfix"></div>
                                        </div> <!-- End single-item-caption -->
                                    </div> <!-- End single-item -->
                                </div> <!-- .col-xs-10-->
                                <div class="clearfix"></div>
                            </div> <!-- .each-list-->
                            @endforeach
                        </div> <!-- .beta-lists -->
                        <div class="row">
                            @if(isset($product))
                                {{$product->links()}}
                            @endif
                        </div>
                    </div> <!-- .widget-body -->
                </div> <!-- .widget -->
            </div> <!-- .col-sm-12 -->
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
        </div> <!-- .row -->
    </div> <!-- #content -->
</div> <!-- End container -->

@endsection