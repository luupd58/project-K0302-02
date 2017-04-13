@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Add Product</span>
		<br>
		<hr>
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" 
					action="{{ route('admin.product_type.store') }}" 
					method="post" enctype="multipart/form-data" 
					id="form-product_type">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$product_type->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-product_type 
				    	{{ $errors->has('product_type_name') ? ' has-error' 
				    	: '' }}">
				      	<label class="control-label col-sm-2" 
				      		for="name-product_type">Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="product_type_name" id="name-product_type" 
				        		placeholder="Enter Name" maxlength="191" 
				        		value="{{$product_type->product_type_name}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('product_type_name') || 
								isset($product_type->id))
          						<span class="help-block">
         							<strong>{{ $errors
         								->first('product_type_name') }}</strong>
              					</span>
              				@else
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">
				        		Submit</button>
				        	<a href="{{ route('admin.product_type.list') }}" 
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