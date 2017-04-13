@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Edit Order</span>
		<br>
		<hr>
	</div>
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<form class="form-horizontal" 
					action="{{ route('admin.order.store') }}" method="post" 
					enctype="multipart/form-data" id="form-order">
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="_token" 
				        		value="{{ csrf_token() }}">
				      	</div>
				    </div>
					<div class="form-group">
				      	<div class="col-sm-12">
				        	<input type="hidden" name="id" 
				        		value="{{$order->id}}" />
				      	</div>
				    </div>
				    
				    <div class="form-group order_type-order">
				      	<label class="control-label col-sm-2" for="status">
				      		Status:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control" id="status" 
				        		name="status">
				        		@if($order->status == 0)
                    				<option value="0" selected>Đang chuyển
                    					</option>
                    				<option value="1" >Đã chuyển</option>
                    				<option value="2" >Gặp lỗi</option>
                  				@elseif($order->status == 1)
                  					<option value="0" >Đang chuyển</option>
                    				<option value="1" selected>Đã chuyển
                    					</option>
                    				<option value="2" >Gặp lỗi</option>
                    			@else
									<option value="0" >Đang chuyển</option>
									<option value="1" >Đã chuyển</option>
									<option value="2" selected>Gặp lỗi</option>
                 				@endif							   
							</select>
				      	</div>
				    </div>
				    <div class="form-group">        
				      	<div class="col-sm-offset-2 col-sm-10">
				        	<button type="submit" class="btn btn-info">
				        		Submit</button>
				        	<a href="{{ route('admin.order.list') }}" 
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