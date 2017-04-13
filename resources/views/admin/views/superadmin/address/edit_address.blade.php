@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Edit Address</span>
		<br>
		<hr>
	</div>
	<?php
	?>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" 
					action="{{ route('admin.address.store') }}" 
					method="post" enctype="multipart/form-data" 
					id="form-address">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$address->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-address {{ 
				    		$errors->has('address') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" 
				      		for="name-address">Địa chỉ:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="address" id="name-address" 
				        		placeholder="Enter Name" maxlength="191" 
				        		value="{{$address->address}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('address') || isset($address->id))
          						<span class="help-block">
         							<strong>{{ $errors->first('address') }}
         								</strong>
              					</span>
              				@else
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">Submit
				        		</button>
				        	<a href="{{ route('admin.address.list') }}" 
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