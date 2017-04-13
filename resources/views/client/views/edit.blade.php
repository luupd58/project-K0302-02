@extends('client.layout.layout_client')

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Thay đổi thông tin
                    </span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="#" method="post" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-8 form-login">
                    <h4>Thay đổi thông tin</h4>
                    <hr>
                    <div class="space20">&nbsp;</div>
                    <div class="form-group form-block">
                        <label for="email">
                        	<i class="glyphicon glyphicon-envelope"></i> 
                        	Email address*</label>
                        <input type="email" id="email" class="form-control" 
                        	placeholder="Nhập địa chỉ email" required>
                    </div> <!-- .form-block -->
                    <div class="form-group form-block">
                        <label for="password">
                        	<i class="glyphicon glyphicon-lock"></i> Password*
                        	</label>
                        <input type="text" id="password" class="form-control" 
                        	placeholder="Nhập mật khẩu" required>
                    </div> <!-- .form-block -->  
                    <div class="form-group form-block">
                        <label for="re-password">
                        	<i class="glyphicon glyphicon-exclamation-sign"></i> 
                        	Re password*</label>
                        <input type="text" id="re-password" class="form-control" 
                        	placeholder="Nhập lại mật khẩu" required>
                    </div> <!-- .form-block -->
                    <div class="form-group form-block">
                        <label for="your_last_name">
                        	<i class="glyphicon glyphicon-user"></i> Fullname*
                        	</label>
                        <input type="text" id="your_last_name" 
                        	class="form-control" placeholder="Nhập tên đầy đủ" 
                        	required>
                    </div> <!-- .form-block -->
                    <div class="form-group form-block">
                        <label for="adress">
                        	<i class="glyphicon glyphicon-home"></i> Address*
                        	</label>
                        <input type="text" id="adress" class="form-control" 
                        	value="" placeholder="Nhập địa chỉ" required>
                    </div> <!-- .form-block -->
                    <div class="form-group form-block">
                        <label for="phone">
                        	<i class="glyphicon glyphicon-earphone"></i> Phone*
                        	</label>
                        <input type="text" id="phone" class="form-control" 
                        	placeholder="Nhập số điện thoại" required>
                    </div> <!-- .form-block -->
                    <div class="form-group form-block">
                        <button type="submit" class="btn btn-primary" 
                        	class="form-control">Change</button>
                    </div> <!-- .form-block -->
                </div>
                <div class="col-sm-3"></div>
            </div> <!-- .row -->
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection