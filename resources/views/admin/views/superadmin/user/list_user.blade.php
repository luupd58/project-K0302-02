@extends('admin.views.superadmin.layout.superadmin')

@section('right')

<div class="col-md-9">
	<div class="col-md-12 top-all">
		<span class="pull-right"><a href="">Home</a> / List User</span>
		<br>
		<hr>
	</div>
	<div class="col-md-4 col-md-offset-8">
		<div class="row">
			<form class="form-horizontal" 
				action="{{ route('admin.user.search') }}" method="get">
				<div class="form-group">
					<div class="col-md-9">
						<input type="text" class="form-control" 
							name="search-user" id="search-user" 
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
		      	<th width="5%">Id</th>
		        <th width="20%">Name</th>
		        <th width="20%">Username</th>
		        <th width="25%">Email</th>
		        <th width="10%"></th>
		      </tr>
		    </thead>
		    <tbody>
				@foreach ($user as $users)
		      	<tr>
		      		<td class="user-id">{{ $users->id }}</td>
			        <td class="user-name">{{ $users->user_name }}</td>
			        <td class="">{{ $users->username }}</td>
		       		<td class="">{{ $users->email }}</td>
		       		<td class="text-center">
		       			<a href="{{ route('admin.user.delete', 
		       				['id'=> $users->id]) }}" 
		       				class="btn btn-danger btn-edit" name="delete-user"
		       				id="user-{{$users->id}}" 
		       				onclick="return confirm('Delete?')">
		       				<i class="glyphicon glyphicon-trash"></i></a>
		       		</td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	  	<div class="pull-right">
	  		@if(isset($flagsearch))
	  			{{ $user->appends(Request::only('search-user'))->links() }}
	  		@else
				{{ $user->links() }}
	  		@endif
	  	</div>
	</div>
</div>
@endsection