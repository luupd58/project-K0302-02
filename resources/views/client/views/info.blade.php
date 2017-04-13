extends('client.layout.layout_client')

@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Trang chủ</a> / 
                	<span>Thông tin cá nhân</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div> <!-- End container -->
</div> <!-- End inner-header -->


<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="color-full">QUẢN LÝ CÁ NHÂN</h3>
        </div>
    </div> <!-- .row -->
    <div class="space10">&nbsp;</div>
    <div class="row">
        <div class="col-md-3 custumer-main">
            <div class="info-customer customer active-info">
                <i class="glyphicon glyphicon-user"></i> Thông tin cá nhân
            </div>
            <div class="clearfix"></div>
            <div class="order-customer customer">
                <i class="fa fa-shopping-cart"></i> Thông tin đơn hàng
            </div>
            <div class="clearfix"></div>
            <div class="out-customer customer">
                <i class="glyphicon glyphicon-off"></i> Thoát
            </div>
            <div class="clearfix"></div>
        </div> <!-- .customer-main -->
        <div class="col-md-9">
            <div class="span-customer" style="display: block">
                <span>Họ tên: Nguyễn Văn Hoàng</span><br>
                <span>Ngày sinh: 09/01/1994</span><br>
                <span>Số điện thoại: ádasd</span><br>
                <span>Địa chỉ: ádaád</span><br>
                <span>Email: ádasdas</span><br>
                <a href="" title=""><i class="glyphicon glyphicon-pencil">
                	</i> Thay đổi</a>
            </div>
            <div class="order-detail-customer" style="display: none">
                <table class="table table-hover">
                    <thead style="background-color: #0099cc">
                        <tr>
                            <th>Mã đơn hàng</th>
                            <th>Ngày đặt</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Hình thức thanh toán</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>11/11/1999</td>
                            <td>100000</td>
                            <td>Đã chuyển</td>
                            <th>Tiền mặt</th>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>11/11/1999</td>
                            <td>100000</td>
                            <td>Đang đợi</td>
                            <th>Tiền mặt</th>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>11/11/1999</td>
                            <td>100000</td>
                            <td>Đã chuyển</td>
                            <th>Thẻ</th>
                        </tr>
                    </tbody>
                </table>
            </div> <!-- .order-detail-customer -->
        </div> <!-- .col-md-9 -->
        <div class="clearfix"></div>
    </div> <!-- .row -->
</div> <!-- End container -->

@endsection