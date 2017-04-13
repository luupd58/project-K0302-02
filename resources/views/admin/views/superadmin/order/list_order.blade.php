@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9" id="order">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / List Order</span>
		<br>
		<hr>
	</div>
	<div class="col-md-4 col-md-offset-8">
		<div class="row">
			<form class="form-horizontal" 
				action="{{ route('admin.order.search') }}" method="get">
				<div class="form-group">
					<div class="col-md-9">
						<input type="text" class="form-control" 
							name="search-order" id="search-order" 
							placeholder="Nhập từ tìm kiếm...">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-default">
							<i class="glyphicon glyphicon-search"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>
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
	<div class="clearfix"></div>
	<div class="col-md-12 view-table">
		<table class="table table-hover table-bordered">
		    <thead class="thead-all">
		      <tr>
		      	<th width="7%">Id</th>
		        <th width="12%">Customer Name</th>
		        <th width="15%">Order Details</th>
		        <th width="10%">Total Cost</th>
		        <th width="15%">Date Buy</th>
		        <th width="15%">Date Transfer</th>
		        <th width="20%">Status</th>
		        <th width="8%">Is Card</th>
		      </tr>
		    </thead>
		    <tbody>
				@foreach ($order as $orders)
		      	<tr>
		      		<td class="">{{ $orders->id }}</td>
			        <td class="text-table">{{ $orders->name_customer }}</td>
			        <td class="text-table">{{ $orders->order_detail }}</td>
			        <td class="">{{ $orders->total_cost }}</td>
			        <td class="">{{ $orders->date_buy }}</td>
			        <td class="">{{ $orders->date_transfer }}</td>
		       		<td class="text-center status-order" 
		       			id="status-order-{!! $orders->id !!}">
		       			<?php
		       			if($orders->status == 0){
		       			?>
		       			Đang chuyển
		       			<?php
		       			} elseif ($orders->status == 1) {
		       			?>
		       			Đã chuyển
		       			<?php
		       			} else{
		       			?>
						Gặp lỗi
		       			<?php
		       			}
		       			?>
		       			<br>
		       			<a href="javascript:void(0)" 
		       				data-id = "{{ $orders->id }}" class="order-status" 
		       				title="">Sửa</a>
		       		</td>
		       		<td class="">{{ $mess = ($orders->is_card == 0) ? "Không" : 
		       			"Có"}}
		       		</td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		@if(isset($flagsearch))
	  			{{ $order->appends(Request::only('search-order'))->links() }}
	  		@else
				{{ $order->links() }}
	  		@endif
	  	</div>
	</div>
</div>
@endsection