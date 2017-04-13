@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Promotion List</span>
		<br>
		<hr>
	</div>
	<div class="col-md-4 col-md-offset-8">
		<div class="row">
			<form class="form-horizontal" 
				action="{{ route('admin.promotion.search') }}" method="get">
				<div class="form-group">
					<div class="col-md-9">
						<input type="text" class="form-control" 
							name="search-promotion" id="search-promotion" 
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
		      	<th width="4%">Id</th>
		        <th width="12%">Name</th>
		        <th width="8%">Product</th>
		        <th width="12%">Product Type</th>
		        <th width="8%">Percent</th>
		        <th width="14%">Date Start</th>
		        <th width="22%">Date End</th>
		        <th width="9%"></th>
		        <th width="9%"></th>
		      </tr>
		    </thead>
		    <tbody>
				@foreach ($promotion as $promotions)
		      	<tr>
		      		<td class="promotion-id">{{ $promotions->id }}</td>
			        <td class="promotion-name text-table">
			        	{{ $promotions->promotion_name }}</td>
			        <td class="text-center promotion-price text-table">
			        	{{ $promotions->product_name }}</td>
			        <td class="text-center text-table">
			        	{{ $promotions->product_type_name }}</td>
			        <td class="text-center promotion-quantity">
			        	{{ $promotions->percent }}</td>
			        <td class="promotion-promotion_type">
			        	{{ $promotions->date_start }}</td>
		       		<td class="promotion-description">
		       			{{ $promotions->date_end }}</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.promotion.update', 
		       				['id'=> $promotions->id]) }}" 
		       				class="btn btn-info btn-edit">
		       				<i class="glyphicon glyphicon-pencil"></i></a>
		       		</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.promotion.delete', 
		       				['id'=> $promotions->id]) }}" 
		       				class="btn btn-danger btn-edit" 
		       				onclick="return confirm('Delete?')">
		       				<i class="glyphicon glyphicon-trash"></i></a>
		       		</td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		@if(isset($flagsearch))
	  			{{ $promotion->appends(Request::only('search-promotion'))
	  				->links() }}
	  		@else
				{{ $promotion->links() }}
	  		@endif
	  	</div>
	</div>
</div>
@endsection