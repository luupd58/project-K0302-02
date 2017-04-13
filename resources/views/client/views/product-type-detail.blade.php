@extends('client.layout.layout_client')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                {{--<h6 class="inner-title">Sản phẩm {{$product_type->product_type_name}}</h6>--}}
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="{{route('index')}}">Home</a> / <span>Loại sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-3">
                        <ul class="aside-menu">
                            @foreach($product_type as $pt)
                                <li><a href="{{route('product-type-detail',
                                    $pt->id)}}">{{$pt->product_type_name}}
                                    </a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-9">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">438 styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                {{--{{dd($sp_theoloai)}}--}}
                                @foreach($sp_theoloai as $s => $sp)
                                    {{--@foreach($value as $k => $sp)--}}
                                    <div class="col-sm-4">

                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href=""><img src="
                                                    {{asset($sp['image'])}}" 
                                                    alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">
                                                    {{$sp['product_name']}}</p>
                                                <p class="single-item-price" 
                                                    style="font-size: 18px">
                                                        <span class="flash-del">
                                                        {{number_format(
                                                        $sp['price'])}} 
                                                        đồng</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left"  
                                                    href="{{route('add-to-cart',
                                                    $sp['id'])}}"><i 
                                                    class="fa fa-shopping-cart"> 
                                                    </i></a>
                                                <a class="beta-btn primary" 
                                                    href="{{ route('product',
                                                    ['id'=>$sp['id']]) }}">
                                                    Chi tiết<i 
                                                    class="fa fa-chevron-right">
                                                    </i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach
                            
                            </div>
                            <div class="row">
                                @if(isset($sp_theoloai))
                                    {{$sp_theoloai->links()}}
                                @endif
                            </div>
                        </div> <!-- .beta-products-list -->

                        <div class="space50">&nbsp;</div>

                        <div class="beta-products-list">
                            <h4>Sản phẩm khác</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy 
                                    {{count($sp_khac)}} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($sp_khac as $sp_k)
                                    <div class="col-sm-4">
                                        <div class="single-item">
                                            @if($sp_k->promotion_price!=0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">
                                                    Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="product.html"><img 
                                                    src="{{asset($sp_k->image)}}" 
                                                    alt="" height="250px"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-price" 
                                                    style="font-size: 18px">
                                                </p>
                                                <p class="single-item-title">
                                                    {{ str_limit(
                                                        $sp_k ->product_name,14) 
                                                        }} </p>
                                                <p class="single-item-price">
                                                    <span>Giá: 
                                                        {{ $sp_k ->price }} 
                                                        VND</span>
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" 
                                                    href="{{route('add-to-cart',
                                                    $sp_k['id'])}}"><i 
                                                    class="fa fa-shopping-cart">
                                                    </i></a>
                                                <a class="beta-btn primary" 
                                                    href="{{ route('product',
                                                    ['id'=>$sp_k->id]) }}">
                                                    Details <i class="fa 
                                                    fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">
                                @if(isset($sp_khac))
                                    {{$sp_khac->links()}}
                                @endif
                            </div>
                            <div class="space40">&nbsp;</div>
                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
        <div class="col-sm-12">
            <div class="pull-right">
                @if(isset($sp_theoloai))
                    <div class="row">{{$sp_theoloai->links()}}</div>
                @endif
            </div> <!-- .pull-right -->
        </div> <!-- .row -->
    </div> <!-- .container -->
@endsection