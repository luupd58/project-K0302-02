@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / List Product Type</span>
		<br>
		<hr>
	</div>
	<div class="col-md-4 col-md-offset-8">
		<div class="row">
			<form class="form-horizontal" 
				action="{{ route('admin.producttype.search') }}" method="get">
				<div class="form-group">
					<div class="col-md-9">
						<input type="text" class="form-control" 
							name="search-product_type" id="search-product" 
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
		<div class="alert alert-success message-edit" style="display: none;">
		  	<strong>Thành công!</strong>
		</div>
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
		      	<th style="width: 10%">Id</th>
		        <th style="width: 70%;">Tên</th>
		        <th style="width: 10%"></th>
		        <th style="width: 10%"></th>
		      </tr>
		    </thead>
		    <tbody id="edit-PRT-ajax">
				@foreach ($product_type as $products)
		      	<tr id="listPRT-{{$products->id}}">
		      		<td class=" product-id">{{ $products->id }}</td>
			        <td class="text-table">
			        	{{ $products->product_type_name }}</td>
		       		<td class="text-center">
		       			<button class="btn btn-info edit-PRT" 
		       				dataIdPRT= "{{ $products->id }}"
		       				id="PRT-{{ $products->id }}" 
		       				dataNamePRT="{{ $products->product_type_name }}" 
		       				data-toggle="modal" data-target="#myEditPRT">
		       				<i class="glyphicon glyphicon-pencil"></i></button>
		       		</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.product_type.delete', 
		       				['id'=> $products->id]) }}" 
		       				class="btn btn-danger btn-edit" 
		       				onclick="return confirm('Delete?')">
		       				<i class="glyphicon glyphicon-trash"></i></a>
		       		</td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		{{ $product_type->links() }}
	  	</div>
	</div>
	<div class="clearfix"></div>
	<div id="myEditPRT" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

	    <!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" 
	        			data-dismiss="modal">&times;</button>
	        		<h4 class="modal-title">Sửa loại sản phẩm</h4>
	      		</div>
	      		<div class="modal-body" id="PRT-edit">
	        		
        			<div class="form-group hidden">
				    	<label class="control-label col-sm-2" 
				    		for="PRT-id-edit">Id:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control hidden" 
				      			id="PRT-id_edit"  name="id" 
				      			placeholder="Enter Id">
				    	</div>
				  	</div>
				  	<div class="form-group">
				  		<div class="col-sm-10 col-sm-offset-2 send-error" 
				  			style="color: red">				      		
				    	</div>
				  	</div>
				  	<div class="form-group">
				    	<label class="control-label col-sm-2" 
				    		for="PRT-name_edit">Tên:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" 
				      			id="PRT-name_edit"  name="product_type_name" 
				      			placeholder="Enter Name">
				    	</div>
				  	</div>
				  	<div class="form-group"> 
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" class="btn btn-default" 
				      			id="submit_PRT" name="submit_PRT">Submit</button>
				    	</div>
				  	</div>
				<div class="clearfix"></div>
	      		</div>
	      		<div class="modal-footer">
	        		<button type="button" class="btn btn-default" 
	        			data-dismiss="modal">Close</button>
	      		</div>
	    	</div>

	 	</div>
	</div>
</div>
@endsection