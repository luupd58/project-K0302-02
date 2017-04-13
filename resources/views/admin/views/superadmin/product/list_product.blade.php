@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Product List</span>
		<br>
		<hr>
	</div>
	<div class="col-md-4 col-md-offset-8">
		<div class="row">
			<form class="form-horizontal" 
				action="{{ route('admin.product.search') }}" method="get">
				<div class="form-group">
					<div class="col-md-9">
						<input type="text" class="form-control" 
							name="search-product" id="search-product" 
							placeholder="Nhập từ tìm kiếm...">
					</div>
					<div class="col-md-3">
						<button type="submit" name="submit-product-search" 
								class="btn btn-default">
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
		        <th width="8%">Price</th>
		        <th width="12%">Image</th>
		        <th width="8%">Quantity</th>
		        <th width="14%">Product Type</th>
		        <th width="22%">Description</th>
		        <th width="9%"></th>
		        @if(Auth::user()->level == 0)
		        <th width="9%"></th>
		        @endif
		      </tr>
		    </thead>
		    <tbody>
				@foreach ($product as $products)
		      	<tr>
		      		<td class="product-id">{{ $products->id }}</td>
			        <td class="product-name">
			        	{{ $products->product_name }}</td>
			        <td class="text-center product-price">
			        	{{ $products->price }}</td>
			        <td class="text-center product-image">
			        	<img src="{{asset($products->image)}}" width="60px" 
			        	height="60px" alt=""></td>
			        <td class="text-center product-quantity">
			        	{{ $products->quantity }}</td>
			        <td class="text-table product-product_type">
			        	{{ $products->product_type_name }}</td>
		       		<td class="text-table product-description">
		       			{{ $products->description }}</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.product.update', 
		       				['id'=> $products->id]) }}" 
		       				class="btn btn-info btn-edit">
		       				<i class="glyphicon glyphicon-pencil"></i></a>
		       		</td>
		       		@if(Auth::user()->level == 0)
		       		<td class="text-center">
		       			<a href="{{ route('admin.product.delete', 
		       				['id'=> $products->id]) }}" 
		       				class="btn btn-danger btn-edit" 
		       				onclick="return confirm('Delete?')">
		       				<i class="glyphicon glyphicon-trash"></i></a>
		       		</td>
		       		@endif
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		@if(isset($flagsearch))
	  			{{ $product->appends(Request::only('search-product'))
	  				->links() }}
	  		@else
				{{ $product->links() }}
	  		@endif
	  	</div>
	</div>
</div>
@endsection