@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / List Customer</span>
		<br>
		<hr>
	</div>
	<div class="col-md-4 col-md-offset-8">
		<div class="row">
			<form class="form-horizontal" action="{{ route('admin.customer.search') }}" method="get">
				<div class="form-group">
					<div class="col-md-9">
						<input type="text" class="form-control" name="search-customer" id="search-customer" placeholder="Nhập từ tìm kiếm...">
					</div>
					<div class="col-md-3">
						<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
					</div>
					<div class="clearfix"></div>
				</div>
			</form>
		</div>
	</div>
	<div class="col-md-12 flash-message">
	    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
	      	@if(Session::has('alert-' . $msg))
	      		<p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
	      	@endif
	    @endforeach
	</div>
	<div class="clearfix"></div>
	<div class="col-md-12 view-table">
		<table class="table table-hover table-bordered">
		    <thead class="thead-all">
		      <tr>
		      	<th width="5%">Id</th>
		        <th width="15%">Name</th>
		        <th width="15%">Username</th>
		        <th width="20%">Address</th>
		        <th width="10%">Phonenumber</th>
		        <th width="10%">Email</th>
		        <th width="10%"></th>
		      </tr>
		    </thead>
		    <tbody>
				@foreach ($customer as $customers)
		      	<tr>
		      		<td class="customer-id">{{ $customers->id }}</td>
			        <td class="customer-name text-table">{{ $customers->customer_name }}</td>
			        <td class="text-table">{{ $customers->username }}</td>
			        <td class="text-table">{{ $customers->address }}</td>
			        <td class="text-table">{{ $customers->phonenumber }}</td>
		       		<td class="text-table">{{ $customers->email }}</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.customer.delete', ['id'=> $customers->id]) }}" class="btn btn-danger btn-edit" onclick="return confirm('Delete?')"><i class="glyphicon glyphicon-trash"></i></a>
		       		</td>
		      	</tr>
		      	@endforeach
				<?php
					// $num = $i + $num; 
					// dd($num);
				?>
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		@if(isset($flagsearch))
	  			{{ $customer->appends(Request::only('search-customer'))->links() }}
	  		@else
				{{ $customer->links() }}
	  		@endif
	  	</div>
	</div>
</div>
@endsection