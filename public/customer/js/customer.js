/**
 * Created by admin on 3/30/2017.
 */
$(function(){
    //Sự kiện khi chuột di chuyển vào menu tự hiện
    $(".dropdown").mouseenter(function(){
        $(".dropdown-menu").css("display", "block");
    });

    //Sự kiện di chuột ra khỏi li menu tự đóng
    $(".dropdown").mouseleave(function(){
        $(".dropdown-menu").css("display", "none");
    });

    //Sự kiện kich chuột vào show giỏ hàng kich lần nữa đóng
    $(".beta-select").on("click", function(){
        // console.log($(".beta-dropdown").css("display"));
        if($(".beta-dropdown").css("display") == "none") {   
        //     $(".beta-dropdown").show();
            $(".beta-dropdown").animate({height: 'toggle', width: 'toggle'},
                {duration: 500}).show();
        } else {
            $(".beta-dropdown").fadeOut("slow");
        }
    });

    // $("body:not('.beta-dropdown')").on("click", function(){
    // 	console.log($(".beta-dropdown").css("display"));
    // 	if($(".beta-dropdown").css("display") == "block") {
    // 		$(".beta-dropdown").fadeOut("slow");
    // 	}
    // });

    //Sự kiện khi chuột di chuyển vào chuyển màu chữ
    $(".single-item").mouseenter(function(){
        $(this).contents().find(".single-item-title").css("color", "#0066ff");
    });

    //Sự kiện di chuột ra khỏi tự động chuyển màu chữ
    $(".single-item").mouseleave(function(){
        $(this).contents().find(".single-item-title").css("color", "#000");
    });

    // Sự kiện chuột kich vào radio thanh toán thẻ
    $("#payment_method_cheque").on("click", function(){
    	if("#payment_method_bacs:selected") {
    		$(".payment_method_bacs_model").hide();
    		$(".payment_method_cheque_model").show();
    	}
    });

    // Sự kiện kich vào radio thanh toán tại nhà
    $("#payment_method_bacs").on("click", function(){
    	if("#payment_method_cheque:selected") {
    		$(".payment_method_bacs_model").show();
    		$(".payment_method_cheque_model").hide();
    	}
    });

    // Sự kiện thay đổi khi ấn của info
    $(".order-customer").on("click", function(){
    	$(".info-customer").removeClass("active-info");
    	$(".span-customer").hide();
    	$(".order-customer").addClass("active-info");
    	$(".order-detail-customer").show();
    });

    // Sự kiện thay đổi khi ấn của info
    $(".info-customer").on("click", function(){
    	$(".order-customer").removeClass("active-info");
    	$(".order-detail-customer").hide();
    	$(".info-customer").addClass("active-info");
    	$(".span-customer").show();
    });

    $("#add-to-cart-count .subQuantity").on("click",function () {
        if($("#add-to-cart-count .quantity").val() > 0){
            var i = $("#add-to-cart-count .quantity").val();
            // debugger;
            i--;
            $("#add-to-cart-count .quantity").val(i);

        }

    });
    $("#add-to-cart-count .plusQuantity").on("click",function () {
        var id = $(this).attr('dataQuantity');
        $.ajax({
            url:'http://localhost:8000/getQuantity',
            type: 'GET',
            // dataTyoe: 'json',
            data: {
                id: id
            },
            success:function (data) {
                var quantity = data;
                $('#add-to-cart-count .resultAjax').val(quantity);
                // alert($('#add-to-cart-count .resultAjax').val());
            }

        });
        // alert(quantity);
        // if($("#add-to-cart-count .quantity").val() > 0){
        // debugger;
            var quantity = parseInt($('#add-to-cart-count .resultAjax').val());
            // alert(quantity);
            var i = parseInt($("#add-to-cart-count .quantity").val());

            var j = parseInt($("#add-to-cart-count .productOrder").val());
            // alert(j);
            if( i == j || j == 0){
                $("#add-to-cart-count .plusQuantity").attr('disable','disable');
                    alert('Sản phẩm chỉ có tối đa ' + i);
            } else {
                i++;
                $("#add-to-cart-count .quantity").val(i);


            }
            // debugger;

        // }

    });

    $("#add-to-cart-count .quantity").on('change', function () {
        // debugger;

        var i = parseInt($("#add-to-cart-count .quantity").val());
        var j = parseInt($("#add-to-cart-count .productOrder").val());

        if( j < i) {
            $("#add-to-cart-count .quantity").val(j);
            alert('Sản phẩm này chỉ có tối đa ' + j + ' sản phẩm');
            // console.log($(".quantity").val());
        }

        if( i < 0 ) {
            $("#add-to-cart-count .quantity").val(0);
            alert('Sản phẩm ít nhất là 0');
            // console.log($(".quantity").val());
        }
    });

    $(document).ready(function () {
        if($('.getNotifyProduct').attr('dataValue') == 1){
            alert('Sản phẩm đã hết hàng');
        }
    });

});
