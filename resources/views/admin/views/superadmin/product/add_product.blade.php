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
					action="{{ route('admin.product.store') }}" method="post" 
					enctype="multipart/form-data" id="form-product">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$product->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-product 
				    	{{ $errors->has('product_name') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" 
				      		for="name-product">Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="product_name" id="name-product" 
				        		placeholder="Enter Name" maxlength="191" 
				        		value="{{$product->product_name}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('product_name') || 
								isset($product->id))
          						<span class="help-block">
         							<strong>{{ $errors->first('product_name') }}
         								</strong>
              					</span>
              				@else
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group price-product 
				    	{{ $errors->has('price') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="price">
				      		Price:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" name="price" 
				        		id="price" placeholder="Enter Price" 
				        		value="{{$product->price}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('price'))
          						<span class="help-block">
         							<strong>{{ $errors->first('price') }}
         							</strong>
              					</span>
              				@elseif ($product->price == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group image-product 
				    	{{ $errors->has('image') ? ' has-error' : '' }}">
					    <div class="col-md-10 col-md-offset-2">
				    		@if($product->id != null)
				    		<div class="old-link-image-product">
					    		<img src="{{ asset($product->image) }}" alt="" 
					    			width="60px" height="60px;">
					    	</div>
					    	@endif
					    	<div class="link-image-product" 
					    		style="display: none;">
					    		<img src="" alt="product" id="img-product" 
					    			width="60px" height="60px">
					    	</div>
					    </div>
					    
				      	<label class="control-label col-sm-2" for="image">
				      		Image:</label>
				      	<div class="col-sm-10">
				        	<input type="file" class="" id="image" name="image" 
				        		value="{{$product->image}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('image'))
          						<span class="help-block">
         							<strong>{{ $errors->first('image') }}
         								</strong>
              					</span>
              				@elseif ($product->image == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group quantity-product 
				    	{{ $errors->has('quantity') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="quantity">
				      		Quantity:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="quantity" id="quantity" 
				        		placeholder="Enter Quantity" 
				        		value="{{$product->quantity}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('quantity'))
          						<span class="help-block">
         							<strong>{{ $errors->first('quantity') }}
         								</strong>
              					</span>
              				@elseif ($product->quantity == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group product_type-product">
				      	<label class="control-label col-sm-2" for="type">
				      		Product Type:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control" id="type" name="type">
				        		@foreach($product_type as $type)
				        		@if($type->id == $product->product_type_id)
                    				<option value="{{$type->id}}" selected>
                    					{{$type->product_type_name}}</option>
                  				@else
                    				<option value="{{$type->id}}">
                    					{{$type->product_type_name}}</option>
                 				@endif							   
							    @endforeach
							</select>
				      	</div>
				    </div>
				    <div class="form-group description-product">
				      	<label class="control-label col-sm-2" for="demo">
				      		Description:</label>
				      	<div class="col-sm-10">          
				        	<textarea name="description" 
				        		placeholder="Enter Description" 
				        		class="form-control ckeditor">
				        		{{$product->description}}</textarea>
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">
				        		Submit</button>
				        	<a href="{{ route('admin.product.list') }}" 
				        		class="btn btn-default" title="">Cancel</a>
				      	</div>
				    </div>
				</form>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<script src="{{ asset('admin/js/ckeditor/ckeditor.js') }}" 
	type="text/javascript" language="javescript"></script>
<script src="{{ asset('admin/js/ckeditor.js') }}"></script>
<script>
    var  editor = new ckeditor('description', '');
    editor.init();
</script>
@endsection