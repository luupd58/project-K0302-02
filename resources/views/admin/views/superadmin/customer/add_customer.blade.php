@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Add Customer</span>
		<br>
		<hr>
	</div>
	<?php
	?>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" action="{{ route('admin.customer.store') }}" method="post" enctype="multipart/form-data" id="form-customer">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" value="{{$customer->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-customer {{ $errors->has('customer_name') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="name-customer">Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" name="customer_name" id="name-customer" placeholder="Enter Name" maxlength="191" value="{{$customer->customer_name}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('customer_name'))
          						<span class="help-block">
         							<strong>{{ $errors->first('customer_name') }}</strong>
              					</span>
              				@elseif ($customer->customer_name == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group namecustomer {{ $errors->has('username') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="namecustomer">User Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" name="username" id="namecustomer" placeholder="Enter Username" maxlength="191" value="{{$customer->customer_name}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('username'))
          						<span class="help-block">
         							<strong>{{ $errors->first('username') }}</strong>
              					</span>
              				@elseif ($customer->username == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group password-customer {{ $errors->has('password') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="password">Password:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" name="password" id="password" placeholder="Enter Password" value="{{$customer->password}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('password'))
          						<span class="help-block">
         							<strong>{{ $errors->first('password') }}</strong>
              					</span>
              				@elseif ($customer->password == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>

					<div class="form-group address-customer {{ $errors->has('address') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="address">Address:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" name="address" id="address" placeholder="Enter Address" value="{{$customer->address}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('address'))
          						<span class="help-block">
         							<strong>{{ $errors->first('address') }}</strong>
              					</span>
              				@elseif ($customer->address == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>

				    <div class="form-group phonenumber-customer {{ $errors->has('phonenumber') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="phonenumber">Phone Number:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" name="phonenumber" id="phonenumber" placeholder="Enter Phonenumber" value="{{$customer->phonenumber}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('phonenumber'))
          						<span class="help-block">
         							<strong>{{ $errors->first('phonenumber') }}</strong>
              					</span>
              				@elseif ($customer->phonenumber == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>

				    <div class="form-group email-customer {{ $errors->has('email') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="email">Email:</label>
				      	<div class="col-sm-10">
				        	<input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required value="{{$customer->email}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('email'))
          						<span class="help-block">
         							<strong>{{ $errors->first('email') }}</strong>
              					</span>
              				@elseif ($customer->email == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">Submit</button>
				        	<a href="{{ route('admin.customer.list') }}" class="btn btn-default" title="">Cancel</a>
				      	</div>
				    </div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection