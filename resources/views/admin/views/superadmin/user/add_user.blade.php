@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Add User</span>
		<br>
		<hr>
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" 
					action="{{ route('admin.user.store') }}" method="post" 
					enctype="multipart/form-data" id="form-user">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$user->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-user 
				    	{{ $errors->has('user_name') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="name-user">
				      		Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="user_name" id="name-user" 
				        		placeholder="Enter Name" maxlength="191" 
				        		value="{{$user->user_name}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('user_name'))
          						<span class="help-block">
         							<strong>{{ $errors->first('user_name') }}
         								</strong>
              					</span>
              				@elseif ($user->user_name == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group nameuser {{ $errors->has('username') 
				    	? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="nameuser">
				      		User Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="username" id="nameuser" 
				        		placeholder="Enter Username" maxlength="191" 
				        		value="{{$user->username}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('username'))
          						<span class="help-block">
         							<strong>{{ $errors->first('username') }}
         								</strong>
              					</span>
              				@elseif ($user->username == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group password-user {{ $errors
				    		->has('password') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="password">
				      		Password:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="password" id="password" 
				        		placeholder="Enter Password">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('password'))
          						<span class="help-block">
         							<strong>{{ $errors->first('password') }}
         								</strong>
              					</span>
              				@elseif ($user->password == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group email-user {{ $errors->has('email') 
				    	? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="email">
				      		Email:</label>
				      	<div class="col-sm-10">
				        	<input type="email" class="form-control" 
				        		name="email" id="email" 
				        		placeholder="Enter Email" 
				        		value="{{$user->email}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('email'))
          						<span class="help-block">
         							<strong>{{ $errors->first('email') }}
         								</strong>
              					</span>
              				@elseif ($user->email == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info" name="add-user">
				        		Submit</button>
				        	<a href="{{ route('admin.user.list') }}" 
				        		class="btn btn-default" title="">Cancel</a>
				      	</div>
				    </div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection