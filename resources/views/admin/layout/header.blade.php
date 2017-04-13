<div class="container header">
	<div class="pull-left">
		<h4>Giao diện Admin</h4>
	</div>
	<div class="pull-right">
		<div class="dropdown">
		  	<button class="btn btn-primary dropdown-toggle" type="button" 
		  		data-toggle="dropdown">
		  		<i class="glyphicon glyphicon-user"></i>
		  		<span class="caret"></span></button>
		  	<ul class="dropdown-menu">
		    	<li style="padding-left: 20px;">{{ Auth::user()->user_name }}
		    		</li>
		    	<li><a href="{{ route("admin.user.update", 
		    		['id'=> Auth::user()->id]) }}">Sửa Profile</a></li>
		    	<li class="input-logout">
		    		<a href="{{ route('admin.logout') }}"
                        onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('admin.logout') }}" 
                    	method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
		    	</li>
		  	</ul>
		</div>
	</div>
</div>