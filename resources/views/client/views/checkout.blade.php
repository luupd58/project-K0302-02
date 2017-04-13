@extends('client.layout.layout_client')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Trang chủ</a> / <span>Đặt hàng</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- .container -->
</div> <!-- End inner-header -->


<div class="container">
    <div class="row">
        <div class="col-md-12" style="text-align: center;">
            <h2 class="color-full">ĐẶT HÀNG</h2>
            <hr>
            <form action="{{route('checkout')}}" method="post" 
                class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">@if(isset($thongbao)){{$thongbao}}@endif</div>
                <div class="row">
                    <div class="col-sm-6 form-left">
                        <div class="your-order-head">
                        	<h4>Thông tin</h4>
                        </div>
                        <div class="space20">&nbsp;</div>

                        <div class="form-block form-group">
                            <div class="col-md-3">
                                <label for="name">Họ tên*</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="name" 
                                	name="name" placeholder="Họ tên" 
                                	class="form-control" required>
                            </div>                                        
                        </div> <!-- .form-block -->

                        <div class="form-block form-group">
                            <div class="col-md-3">
                                <label for="sex">Giới tính </label>
                            </div>
                            <div class="col-md-9" 
                            	style="text-align: center;">
                                <input id="sex" type="radio"
                                	class="input-radio" name="sex"
                                	value="nam" checked="checked" 
                                	style="width: 10%">
                                	<span style="margin-right:5%">Nam</span>
                                <input id="sex" type="radio"
                                	class="input-radio" name="sex"
                                	value="nữ" style="width: 10%">
                                	<span>Nữ</span>
                            </div>                    
                        </div> <!-- .form-block -->

                        <div class="form-block form-group">
                            <div class="col-md-3">
                                <label for="email">Email*</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" id="email" name="email" 
                                	placeholder="expample@gmail.com" 
                                	class="form-control" required>
                            </div>
                            <div class="col-sm-12 error-div">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div> <!-- .form-block -->

                        <div class="form-block form-group">
                            <div class="col-md-3">
                                <label for="phone">Điện thoại*</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="phone"  name="phone"
                                	placeholder="Số điện thoại" 
                                	class="form-control" required>
                            </div>                                        
                        </div> <!-- .form-block -->

                        <div class="form-block form-group">
                            <div class="col-md-3">
                                <label for="phone">Điạ chỉ*</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" id="address"  name="address"
                                       placeholder="Nhập địa chỉ"
                                       class="form-control" required>
                            </div>
                        </div> <!-- .form-block -->
                    </div> <!-- .form-left -->
                    <div class="col-sm-6 in-order">
                        <div class="your-order">
                            <div class="your-order-head">
                            	<h4>Đơn hàng của bạn</h4></div>
                            {{--{{dd($cart)}};--}}
                            @if(Session::has('cart'))
                            <div class="your-order-body">
                                <div class="your-order-item">
                                    <div>


                                        @foreach($cart as $key => $value)
                                        @if($key == 'items')
                                            @foreach($value as $k => 
                                                $cart_product)
                                    <!--  one item   -->
                                        <div class="media">
                                            {{--{{dd($cart_product)}}--}}
                                            <img width="25%" src="{{ asset($cart_product['item']->image)}}" alt="" 
                                                class="pull-left"
                                            	style="margin-top: 13px;">
                                            <div class="media-body-checkout">
                                                <h3 class="font-large">
                                                    {{ $cart_product['item']->product_name}}
                                                    </h3>

                                                <span class="your-order-info"
                                                	style="color: grey">
                                                	Số lượng:
                                                    {{ $cart_product['qty']}}
                                                    </span> <br>
                                                <span class="your-order-info"
                                                	style="color: grey">
                                                	Giá:
                                                    {{ $cart_product['price']}} 
                                                    VND</span>
                                            </div>
                                        </div> <!-- .media -->
                                        <hr>

                                    <!-- end one item -->
                                                @endforeach
                                    @endif
                                        @endforeach

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="your-order-item">
                                    <div class="pull-left">
                                    	<p class="your-order-f18">Tổng tiền:
                                    	</p></div>
                                    <div class="pull-right">
                                    	<h5 class="color-black">
                                            {{ $cart ->totalPrice}}  
                                            VND</h5>
                                    </div>
                                    <div class="clearfix"></div>
                                </div> <!-- .your-order-item -->
                            </div>
                            @endif

                            <div class="your-order-head">
                            	<h4>Hình thức thanh toán</h4></div>           
                            <div class="your-order-body">
                                <div class="payment_methods methods">
                                    <div class="payment_method_bacs">
                                        <input id="payment_method_bacs" 
                                        	type="radio" class="input-radio" 
                                        	name="payment_method" value="0"
                                        	checked="checked" 
                                        	data-order_button_text="">
                                        <label for="payment_method_bacs">
                                        	Thanh toán khi nhận hàng </label>
                                        <div class="clearfix"></div>
                                        <div class="payment_box 
                                        	payment_method_bacs_model" 
                                        	style="display: block;"
                                        >
                                            Cửa hàng sẽ gửi hàng đến địa chỉ của 
                                            bạn, bạn xem hàng rồi thanh toán 
                                            tiền cho nhân viên giao hàng
                                        </div>                   
                                    </div> <!-- .payment_method_bacs -->

                                    <div class="payment_method_cheque">
                                        <input id="payment_method_cheque" 
                                        	type="radio" class="input-radio" 
                                        	name="payment_method" 
                                        	value="1"
                                        	data-order_button_text="">
                                        <label for="payment_method_cheque">
                                        	Chuyển khoản </label>
                                        <div class="clearfix"></div>
                                        <div class="payment_box 
                                        	payment_method_cheque_model" 
                                            name="payment_card"
                                        	style="display: none;">
                                            Chuyển tiền đến tài khoản sau:
                                            <input type="text" name="card"
                                            value="" class="form-control" 
                                            placeholder="">
                                        </div>                   
                                    </div> <!-- .payment_method_cheque -->
                                </div> <!-- .payment_method_methods -->
                            </div> <!-- .your-order-body -->

                            <div class="btn-order">
                                <button type="submit" class="beta-btn primary" 
                                    href="#">Đặt hàng
                                    <i class="fa fa-chevron-right"></i>
                                </button>
                            </div>
                        </div> <!-- .your-order -->
                    </div> <!-- .in-order -->
                </div> <!-- .row -->
            </form>
        </div> <!-- .col-md-12 -->
    </div> <!-- .row -->
</div> <!-- End container -->

@endsection