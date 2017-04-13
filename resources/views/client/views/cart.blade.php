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

<!-- Content -->
<div class="container">
    <div id="content">
        <div class="table-responsive">
            <table id="cart" class="table table-hover table-condensed 
            	shop_table beta-shopping-cart-table" cellspacing="0">
                <thead style="background-color: #f5f5f0">
                    <tr>
                        <th class="product-name" style="width:40%">
                        	Tên sản phẩm</th>
                        <th class="product-price" style="width:15%">
                        	Giá</th>
                        <th class="product-quantity" style="width:15%">
                        	Số lượng</th>
                        <th class="product-subtotal text-center" 
                        	style="width:20%">Thành tiền</th>
                        <th style="width:10%"> </th>
                    </tr>
                </thead>
                <tbody>
                <tr class="cart_item">
                    <td data-th="Product" class="product-name">
                        <div class="row media">
                            <div class="col-sm-2 hidden-xs"><img src="{{ asset(
                            	'customer\images\products\banh-kem-01.jpg'
                            	) }}" alt="Sản phẩm 1" class="img-responsive" 
                            	width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">Sản phẩm 1</h4>
                                <p>Mô tả của sản phẩm 1</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price" class="product-price">200.000 đ</td>
                    <td data-th="Quantity" class="product-quantity">1
                    </td>
                    <td data-th="Subtotal" class="text-center">200.000 đ</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm">
                        	<i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
                <tr>
                    <td data-th="Product">
                        <div class="row">
                            <div class="col-sm-2 hidden-xs"><img src="{{ asset(
                            	'customer\images\products\banh-kem-01.jpg
                            	') }}" alt="Sản phẩm 1" class="img-responsive" 
                            	width="100">
                            </div>
                            <div class="col-sm-10">
                                <h4 class="nomargin">Sản phẩm 2</h4>
                                <p>Mô tả của sản phẩm 2</p>
                            </div>
                        </div>
                    </td>
                    <td data-th="Price">300.000 đ</td>
                    <td data-th="Quantity" class="product-quantity">1
                    </td>
                    <td data-th="Subtotal" class="text-center">300.000 đ</td>
                    <td class="actions" data-th="">
                        <button class="btn btn-danger btn-sm">
                        	<i class="fa fa-trash-o"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                    <tr class="visible-xs">
                        <td class="text-center"><strong>Tổng 200.000 đ</strong>
                        </td>
                    </tr>
                    <tr style="background-color: #f5f5f0">
                        <td>
                        </td>
                        <td colspan="2" class="hidden-xs"> </td>
                        <td class="hidden-xs text-center">
                        	<strong>Tổng tiền 500.000 đ</strong>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="" class="btn btn-warning pull-left">
                        	<i class="fa fa-angle-left"></i> Tiếp tục mua hàng
                        	</a></td>
                        <td colspan="3" class="hidden-xs"> </td>
                        <td><a href="" class="btn btn-success 
                        	btn-block pull-right">Thanh toán 
                        	<i class="fa fa-angle-right"></i></a></td>
                    </tr>
                </tfoot>
            </table>
        </div> <!-- .table-responsive -->
    </div> <!-- #content -->
</div> <!-- .container -->

@endsection