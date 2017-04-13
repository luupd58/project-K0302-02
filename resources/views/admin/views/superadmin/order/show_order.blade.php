@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Total Sell</span>
		<br>
		<hr>
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
		        <th class="text-center" width="12%">STT</th>
		        <th class="text-center" width="22%">Total Day</th>
		        <th class="text-center" width="22%">Total Month</th>
		        <th class="text-center" width="22%">Total Year</th>
		        <th class="text-center" width="22%">Total</th>
		      </tr>
		    </thead>
		    <tbody>
				<?php
					$i = 1;
				?>
		      	<tr>
		      		<td class="text-center">{{ $i }}</td>
			        <td class="text-center">{{ $totalDay }}</td>
			        <td class="text-center">{{ $totalMonth }}</td>
		       		<td class="text-center">{{ $totalYear }}</td>
		       		<td class="text-center">{{ $total }}</td>
		      	</tr>
		      	<?php 
		      		$i++;
		      	?>
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		
	  	</div>
	</div>
</div>
@endsection