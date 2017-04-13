@extends('admin.layout.layout_admin')

@section('content-superadmin')

<div class="row">
	<div class="col-md-3">
		<div class="row">
			<div class="col-md-12 leftadmin">
				<div class="list-group">
					@if(Auth::user()->level == 0)
    				<a href="#" class="list-group-item active user" 
    					data-toggle="collapse" data-target=".leftadmin-one">
    					Quản lý nhân viên <span class="glyphicon glyphicon glyphicon-option-horizontal pull-right"></span></a>
					<div class="collapse collapse-leftadmin leftadmin-one">
						<div class="list-group">
							<a href="{{  route('admin.user.list') }}" 
								class="list-group-item list-user">Danh sách</a>
							<a href="{{  route('admin.user.add') }}" 
								class="list-group-item add-user">Tạo mới</a>
						</div>
					</div>
    				<a href="#" class="list-group-item customer" 
    					data-toggle="collapse" data-target=".leftadmin-two">
    					Quản lý người dùng <span class="glyphicon glyphicon glyphicon-option-horizontal pull-right"></span></a>
					<div class="collapse collapse-leftadmin leftadmin-two">
						<div class="list-group">
							<a href="{{  route('admin.customer.list') }}" 
								class="list-group-item list-customer">
								Danh sách</a>
							<a href="{{  route('admin.customer.add') }}" 
								class="list-group-item add-customer">Tạo mới</a>
						</div>
					</div>
					@endif
					<a href="#" class="list-group-item product" 
						data-toggle="collapse" data-target=".leftadmin-three">
						Quản lý sản phẩm <span class="glyphicon glyphicon glyphicon-option-horizontal pull-right"></span></a>
					<div class="collapse collapse-leftadmin leftadmin-three">
						<div class="list-group">
							<a href="{{  route('admin.product.list') }}" 
								class="list-group-item list-product">
								Danh sách</a>
							<a href="{{  route('admin.product.add') }}" 
								class="list-group-item add-product">Tạo mới</a>
						</div>
					</div>
					<a href="#" class="list-group-item product_type" 
						data-toggle="collapse" data-target=".leftadmin-four">
						Quản lý nhóm sản phẩm <span class="glyphicon glyphicon glyphicon-option-horizontal pull-right"></span></a>
					<div class="collapse collapse-leftadmin leftadmin-four">
						<div class="list-group">
							<a href="{{  route('admin.product_type.list') }}" 
								class="list-group-item list-product_type">
								Danh sách</a>
							<a href="{{  route('admin.product_type.add') }}" 
								class="list-group-item add-product_type">
								Tạo mới</a>
						</div>
					</div>
					@if(Auth::user()->level == 0)
					<a href="#" class="list-group-item promotion" 
						data-toggle="collapse" data-target=".leftadmin-five">
						Quản lý khuyến mại <span class="glyphicon glyphicon glyphicon-option-horizontal pull-right"></span></a>
					<div class="collapse collapse-leftadmin leftadmin-five">
						<div class="list-group">
							<a href="{{  route('admin.promotion.list') }}" 
								class="list-group-item list-promotion">
								Danh sách</a>
							<a href="{{  route('admin.promotion.add') }}" 
								class="list-group-item add-promotion">
								Tạo mới</a>
						</div>
					</div>
					@endif
					<a href="#" class="list-group-item slide" 
						data-toggle="collapse" data-target=".leftadmin-six">
						Quản lý banner <span class="glyphicon glyphicon glyphicon-option-horizontal pull-right"></span></a>
					<div class="collapse collapse-leftadmin leftadmin-six">
						<div class="list-group">
							<a href="{{  route('admin.slide.list') }}" 
								class="list-group-item list-slide">
								Danh sách</a>
							<a href="{{  route('admin.slide.add') }}" 
								class="list-group-item add-slide">Tạo mới</a>
						</div>
					</div>

					@if(Auth::user()->level == 0)
					<a href="{{  route('admin.order.show') }}" 
						class="list-group-item total">Doanh thu</a>
					@endif
					<a href="{{  route('admin.order.list') }}" 
						class="list-group-item order">Quản lý hóa đơn</a>
					@if(Auth::user()->level == 0)
					<a href="{{  route('admin.address.list') }}" 
						class="list-group-item address">Quản lý địa chỉ</a>
					@endif
  				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	@yield('right')
</div>

@endsection