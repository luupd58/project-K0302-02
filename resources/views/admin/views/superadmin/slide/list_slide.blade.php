@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / Slide List</span>
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
	<div class="col-md-12 view-table" id="edit-slide-ajax">
		<table class="table table-hover table-bordered">
		    <thead class="thead-all">
		      <tr>
		      	<th width="5%">Id</th>
		        <th width="25%">Name</th>
		        <th width="50%">Image</th>
		        <th width="10%"></th>
		        <th width="10%"></th>
		      </tr>
		    </thead>
		    <tbody>
				@foreach ($slide as $slides)
		      	<tr id="listSlide-{{$slides->id}}">
		      		<td class="slide-id">{{ $slides->id }}</td>
			        <td class="slide-name text-table">
			        	{{ $slides->name_slider }}</td>
			        <td class="text-center slide-image"><img 
			        	src="{{asset($slides->image_slider)}}" width="60px" 
			        	height="60px" alt=""></td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.slide.update', 
		       				['id'=> $slides->id]) }}" 
		       				class="btn btn-info btn-edit">
		       				<i class="glyphicon glyphicon-pencil"></i></a>
		       		</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.slide.delete', 
		       				['id'=> $slides->id]) }}" 
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
	  			{{ $slide->appends(Request::only('search-slide'))->links() }}
	  		@else
				{{ $slide->links() }}
	  		@endif
	  	</div>
	</div>	
</div>
@endsection