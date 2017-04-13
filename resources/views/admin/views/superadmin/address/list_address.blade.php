@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Address</span>
		<br>
		<hr>
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
		      	<td class="hidden">id</td>	        
		        <th width="80%">Địa chỉ</th>
		        <th width="20%"></th>
		      </tr>
		    </thead>
		    <tbody id="edit-ADS-ajax">
		      	<tr id="listADS">
		      		<td class="hidden product-id">{{ $address->id }}</td>
			        <td class="product-name text-table">
			        	{{ $address->address }}</td>
		       		<td class="text-center">
		       			<button class="btn btn-info edit-ADS" 
		       				dataIdADS= "{{ $address->id }}" 
		       				dataNameADS="{{ $address->address }}" 
		       				data-toggle="modal" data-target="#myEditADS">
		       				<i class="glyphicon glyphicon-pencil"></i></button>
		       		</td>
		      	</tr>
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  	</div>
	</div>
	<div id="myEditADS" class="modal fade" role="dialog">
	  	<div class="modal-dialog">

	    <!-- Modal content-->
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal">
	        			&times;</button>
	        		<h4 class="modal-title">Sửa địa chỉ</h4>
	      		</div>
	      		<div class="modal-body" id="ADS-edit">
	        		
        			<div class="form-group hidden">
				    	<label class="control-label col-sm-2" for="ADS-id-edit">
				    		Id:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control hidden" 
				      			id="ADS-id_edit"  name="id" 
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
				    		for="ADS-name_edit">Tên:</label>
				    	<div class="col-sm-10">
				      		<input type="text" class="form-control" 
				      			id="ADS-name_edit"  name="address" 
				      			placeholder="Enter Name">
				    	</div>
				  	</div>
				  	<div class="form-group"> 
				    	<div class="col-sm-offset-2 col-sm-10">
				      		<button type="submit" class="btn btn-default" 
				      			id="submit_ADS">Submit</button>
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