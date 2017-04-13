<div class="form-group order_type-order">
  	<div class="">
    	<select class="form-control" id="select-status" name="status">
    		@if($order->status == 0)
				<option value="0" selected>Đang chuyển</option>
				<option value="1" >Đã chuyển</option>
				<option value="2" >Gặp lỗi</option>
				@elseif($order->status == 1)
				<option value="1" selected>Đã chuyển</option>
				<option value="2" >Gặp lỗi</option>
			@else
				<option value="2" selected>Gặp lỗi</option>
				@endif							   
		</select>
  	</div>
</div>
<div class="form-group">        
  	<div class="">
    	<button type="submit" class="btn btn-info save-status"
    		data="{!! $order->id !!}">Lưu</button>
  	</div>
</div>

