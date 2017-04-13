@extends("client.layout.layout_client")

@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-right">
            <div class="beta-breadcrumb">
                <a href="index.html">Trang chủ</a> / <span>Đăng nhập</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<!-- Container -->
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 form-login">
            <br>
                <fieldset>
                    <legend>Đăng nhập</legend>
                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors -> all()  as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="post" 
                        class="beta-form-checkout">
                        <input type="hidden" name="_token" 
                            value="{{csrf_token()}}"/>
                            <div class="row">
                                <div class="space20">&nbsp;</div>
                                <div class="col-sm-1"></div>
                                {{--{{dd($customer)}}--}}
                                @if(isset($flag))
                                    <div class="alert alert"><span>
                                        Tài khoản chưa kích hoạt</span></div>
                                @endif

                                <div class="form-group form-block">
                                    <label for="email">
                                        <i class="glyphicon glyphicon-envelope">
                                        </i> Email address</label>
                                    <input type="email" class="form-control" 
                                        id="email" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group form-block">
                                    <label for="phone">
                                        <i class="glyphicon glyphicon-lock"></i> 
                                            Password
                                    </label>
                                    <input type="password" class="form-control"
                                        id="phone" name="password" 
                                        placeholder="Password" required>
                                </div>
                                <button type="submit"
                                    class="btn btn-default 
                                        submit-beta-form-checkout" 
                                        value="Login">
                                    Login</button>
                            </div>
                    </form>
                </fieldset>
                <br>
            </div> 
        </div> <!-- .form-login -->
    </div> <!-- #content -->
</div> <!-- .container -->
<!-- End container -->
@endsection