@extends('client.layout.layout_client')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="{{route('index')}}">Trang chủ</a> / <span>Đăng kí</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="container">
    <div id="content">
        <form action="{{route('signup')}}" method="post" 
            class="beta-form-checkout">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="row">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}
                                @endforeach
                            </div>
                        @endif
                        @if(Session::has('thanhcong'))
                            <div class="alert alert-success">
                                {{Session::get('thanhcong')}}</div>
                            <div class="clearfix"></div>
                        @endif
                    </div>
                </div>
                <div class="clearfix"></div>

                {{--<div class="row">--}}
                    <div class="col-sm-2"></div>

                    <div class="col-sm-8 form-login">
                        <h4>Đăng kí</h4>
                        <hr>
                        <div class="space20">&nbsp;</div>
                        <div class="form-group form-block">
                            <label for="username">
                                <i class="glyphicon glyphicon-envelope"></i>
                                User name*</label>
                            <input type="text" id="username" name="username" 
                                class="form-control"
                                placeholder="Nhập tên username" required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <label for="email">
                                <i class="glyphicon glyphicon-envelope"></i>
                                Email address*</label>
                            <input type="email" id="email" name="email" 
                                class="form-control"
                                   placeholder="Nhập địa chỉ email" required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <label for="password">
                                <i class="glyphicon glyphicon-lock"></i> 
                                    Password*
                                </label>
                            <input type="password" id="password" name="password" 
                                class="form-control"
                                placeholder="Nhập mật khẩu" required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <label for="re-password">
                                <i class="glyphicon glyphicon-exclamation-sign"></i>
                                Re password*</label>
                            <input type="password" id="re-password" 
                                name="re_password" class="form-control"
                                placeholder="Nhập lại mật khẩu" required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <label for="your_last_name">
                                <i class="glyphicon glyphicon-user"></i> Fullname*
                                </label>
                            <input type="text" id="your_last_name"  name="fullname"
                                class="form-control" placeholder="Nhập tên đầy đủ"
                                required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <label for="address">
                                <i class="glyphicon glyphicon-home"></i> Address*
                                </label>
                            <input type="text" id="address" name="address" 
                                class="form-control"
                                value="" placeholder="Nhập địa chỉ" required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <label for="phone">
                                <i class="glyphicon glyphicon-earphone"></i> Phone*
                                </label>
                            <input type="text" id="phone" name="phone" 
                                class="form-control"
                                placeholder="Nhập số điện thoại" required>
                        </div> <!-- .form-block -->
                        <div class="form-group form-block">
                            <button type="submit" name="signup" 
                                class="btn btn-primary">Register</button>
                        </div> <!-- .form-block -->
                    </div>
                    <div class="col-sm-2"></div>
                {{--</div>--}}
            </div> <!-- .row -->
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection