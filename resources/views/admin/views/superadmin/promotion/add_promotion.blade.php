@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Add Promotion</span>
		<br>
		<hr>
	</div>
	<?php
		// dd($promotion);
	?>
	<div class="col-md-12 flash-message">
	    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	      	@if(Session::has('alert-' . $msg))
	      		<p class="alert alert-{{ $msg }}">
	      			{{ Session::get('alert-' . $msg) }} <a href="#" 
	      			class="close" data-dismiss="alert" 
	      			aria-label="close">&times;</a></p>
	      	@endif
	    @endforeach
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" 
					action="{{ route('admin.promotion.store') }}" method="post" 
					enctype="multipart/form-data" id="form-promotion">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$promotion->id}}" />
				      	</div>
				    </div>
				    <div class="form-group name-promotion 
				    	{{ $errors->has('promotion_name') ? ' has-error' 
				    	: '' }}">
				      	<label class="control-label col-sm-2" 
				      		for="name-promotion">Name:</label>
				      	<div class="col-sm-10">
				        	<input type="text" min="3" class="form-control" 
				        		name="promotion_name" id="name-promotion" 
				        		placeholder="Enter Name" maxlength="191" 
				        		value="{{$promotion->promotion_name}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('promotion_name') || 
								isset($promotion->id))
          						<span class="help-block">
         							<strong>
         								{{ $errors->first('promotion_name') }}
         								</strong>
              					</span>
              				@else
              					{{-- <p class="">Bắt buộc nhập</p> --}}
           					@endif
				      	</div>
				    </div>
				    <div class="form-group product-promotion">
				      	<label class="control-label col-sm-2" 
				      		for="product_id">Product Type:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control" id="product_id" 
				        		name="product_id">
				        		<option value=""></option>
				        		@foreach($product as $ty)
				        		@if($ty->id == $promotion->product_id)
                    				<option value="{{$ty->id}}" selected>
                    					{{$ty->product_name}}</option>
                  				@else
                    				<option value="{{$ty->id}}">
                    					{{$ty->product_name}}</option>
                 				@endif							   
							    @endforeach
							</select>
				      	</div>
				    </div>

					<div class="form-group product_type-promotion">
				      	<label class="control-label col-sm-2" 
				      		for="product_type_id">Product Type:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control" id="product_type_id" 
				        		name="product_type_id">
				        		<option value=""></option>
				        		@foreach($product_type as $type)
				        		@if($type->id == $promotion->product_type_id)
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

				    
				    <div class="form-group percent-promotion 
				    	{{ $errors->has('percent') ? ' has-error' : '' }}">
				      	<label class="control-label col-sm-2" for="percent">
				      		Percent:</label>
				      	<div class="col-sm-10">
				        	<input type="text" class="form-control" 
				        		name="percent" id="percent" 
				        		placeholder="Enter Percent" 
				        		value="{{$promotion->percent}}">
				      	</div>
				      	<div class="col-sm-10 col-sm-offset-2 error-div">
							@if ($errors->has('percent'))
          						<span class="help-block">
         							<strong>{{ $errors->first('percent') }}
         								</strong>
              					</span>
              				@elseif ($promotion->percent == null)
              					{{-- <p class="">Bắt buộc nhập</p> --}}
           					@endif
				      	</div>
				    </div>
				    <div class="form-group date_start-promotion">
				      	<label class="control-label col-sm-2" for="type">
				      		Date Start:</label>
				      	<div class="col-sm-10">
				        	<div class='input-group date' id='date_start'>
				        		<?php
				        			$date_start = $promotion->date_start;
            
            						if($date_start != null || 
            								$date_start != ''){
            							$date_start = explode('-', $date_start);
							        	$date_start = $date_start[1].'/'.
							        		$date_start[2].'/'.$date_start[0];
							        	$promotion->date_start = $date_start;
            						}
				        		?>
			                    <input type='text' class="form-control" 
			                    	name="date_start" 
			                    	value="{{$promotion->date_start}}"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar">
			                        	</span>
			                    </span>
			                </div>
				      	</div>
				    </div>
				    <div class="form-group date_end-promotion">
				      	<label class="control-label col-sm-2" for="type">
				      		Date End:</label>
				      	<div class="col-sm-10">
				        	<div class='input-group date' id='date_end'>
				        		<?php
				        			$date_end = $promotion->date_end;
				        			if($date_end != null || $date_end != ''){
				        				$date_end = explode('-', $date_end);
							        	// dd($date_start);
							        	$date_end = $date_end[1].'/'.
							        		$date_end[2].'/'.$date_end[0];
							        	$promotion->date_end = $date_end;
				        			}
				        		?>
			                    <input type='text' class="form-control" 
			                    	name="date_end" 
			                    	value="{{$promotion->date_end}}"/>
			                    <span class="input-group-addon">
			                        <span class="glyphicon glyphicon-calendar">
			                        	</span>
			                    </span>
			                </div>
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">
				        		Submit</button>
				        	<a href="{{ route('admin.promotion.list') }}" 
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