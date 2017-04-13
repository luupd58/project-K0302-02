@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Add Slide</span>
		<br>
		<hr>
	</div>
	
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" 
					action="{{ route('admin.slide.store') }}" method="post" 
					enctype="multipart/form-data" id="form-slide">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$slide->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-slide 
				    	{{ $errors->has('name_slider') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="name-slider">
				      		Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="name_slider" id="name-slider" 
				        		placeholder="Enter Name" maxlength="191" 
				        		value="{{$slide->name_slider}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('name_slider') || 
								isset($slide->id))
          						<span class="help-block">
         							<strong>{{ $errors->first('name_slider') }}
         								</strong>
              					</span>
              				@else
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group image-slide 
				    	{{ $errors->has('image_slider') ? ' has-error' : '' }}">
					    <div class="col-md-10 col-md-offset-2">
				    		@if($slide->id != null)
				    		<div class="old-link-image-slide">
					    		<img src="{{ asset($slide->image_slider) }}" 
					    			alt="" width="60px" height="60px">
					    	</div>
					    	@endif
					    	<div class="link-image-slide" 
					    		style="display: none;">
					    		<img src="" alt="slide" id="img-slide" 
					    			width="60px" height="60px">
					    	</div>
					    </div>
					    
				      	<label class="control-label col-sm-2" for="image">
				      		Image:</label>
				      	<div class="col-sm-10">
				        	<input type="file" class="form-control" id="image" 
				        		name="image_slider" 
				        		value="{{$slide->image_slider}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('image_slider'))
          						<span class="help-block">
         							<strong>{{ $errors->first('image_slider') }}
         								</strong>
              					</span>
              				@elseif ($slide->image_slider == null)
              					<p class="">Bắt buộc nhập</p>
           					@endif
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">Submit
				        		</button>
				        	<a href="{{ route('admin.slide.list') }}" 
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