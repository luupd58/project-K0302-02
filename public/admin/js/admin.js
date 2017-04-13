$(function(){
	// Sự kiện chuyển class active khi kich vào list
	$('.list-group-item').click(function(){
		$('.list-group-item').removeClass('active');
        $('.collapse-leftadmin > .list-group > a').removeClass('active');
        $('.collapse-leftadmin').removeClass('in');
		$(this).addClass('active');
	});

    //
    // Sự kiện khi load trang đến phần nào thêm class active phần đó
    $(document).ready(function(){


        var path = window.location.pathname;
        $('.list-group-item').removeClass('active');
        switch(path){
            case '/admin/index':
                $('.leftadmin-three').addClass('in');
                $('.leftadmin .leftadmin-three .list-product')
                    .addClass('active');
                break;
            case '/admin/product':
                $('.leftadmin-three').addClass('in');
                $('.leftadmin .leftadmin-three .list-product')
                    .addClass('active');
                break;
            case '/admin/product/add':
                $('.leftadmin-three').addClass('in');
                $('.leftadmin .leftadmin-three .add-product')
                    .addClass('active');
                break;
            case '/admin/user':
                $('.leftadmin-one').addClass('in');
                $('.leftadmin .leftadmin-one .list-user').addClass('active');
                break;
            case '/admin/user/add':
                $('.leftadmin-one').addClass('in');
                $('.leftadmin .leftadmin-one .add-user').addClass('active');
                break;
            case '/admin/customer':
                $('.leftadmin-two').addClass('in');
                $('.leftadmin .leftadmin-two .list-customer')
                    .addClass('active');
                break;
            case '/admin/customer/add':
                $('.leftadmin-two').addClass('in');
                $('.leftadmin .leftadmin-two .add-customer').addClass('active');
                break;
            case '/admin/producttype':
                $('.leftadmin-four').addClass('in');
                $('.leftadmin .leftadmin-four .list-product_type')
                    .addClass('active');
                break;
            case '/admin/producttype/add':
                $('.leftadmin-four').addClass('in');
                $('.leftadmin .leftadmin-four .add-product_type')
                    .addClass('active');
                break;
            case '/admin/promotion':
                $('.leftadmin-five').addClass('in');
                $('.leftadmin .leftadmin-five .list-promotion')
                    .addClass('active');
                break;
            case '/admin/promotion/add':
                $('.leftadmin-five').addClass('in');
                $('.leftadmin .leftadmin-five .add-promotion')
                    .addClass('active');
                break;
            case '/admin/slide':
                $('.leftadmin-six').addClass('in');
                $('.leftadmin .leftadmin-six .list-slide').addClass('active');
                break;
            case '/admin/slide/add':
                $('.leftadmin-six').addClass('in');
                $('.leftadmin .leftadmin-six .add-slide').addClass('active');
                break;
            case '/admin/order':
                $('.leftadmin .total').addClass('active');
                break;
            case '/admin/address':
                $('.leftadmin .address').addClass('active');
                break;
            case '/admin/order/list':
                $('.leftadmin .order').addClass('active');
                break;
        }
    });

/**
 * Product page
 * -----------------------------------------------------------------------------
 */


    //Sự kiện click của name-product
	$('#form-product #name-product').on('change', function(){
        var length = $('#form-product  #name-product').val();
        var result = checkLengthName(length);
        $('#form-product .name-product .error-div').html(result);
    });

    //Sự kiện kiểm tra length của name-product
    function checkLengthName(data){
        if(data.length < 3){
            return "Độ dài phải lớn hơn hoặc bằng 3!";
        } else {
            return "";
        }
     }

     /**
      * [description] Sự kiện click của price-product
      * @param  {[type]}  [description]
      * @return {[type]}     [description]
      */
    $('#form-product #price').on('change', function(){
        var length = $('#form-product  #price').val();
        if(length.length > 11){
            var x = length.slice(0, 11);
            var y = $(this).val(x);
            $(this).html(y);
        }
        $('#form-product .price-product .error-div').html("");
    });

   
    /**
     * [description] Kiểm tra hình ảnh product
     * @param  {[type] [description]
     * @return {[type]}     [description]
     */
    $('#form-product #image').on('change', function(){
        $('#form-product .link-image-product').css('display', 'block');
        readURL(this);
        $('#form-product .old-link-image-product').css('display', 'none');
        $('#form-product .image-product .error-div').html('');
    });

    /**
     * [readURL description] Lấy ảnh ra
     * @param  {[type]} html element [description]
     * @return {[type]} Lấy ảnh ra [description]
     */
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-product').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }

     /**
      * [description] Sự kiện click của quantity-product
      * @param  {[type]}  [description]
      * @return {[type]}     [description]
      */
    $('#form-product #quantity').on('change', function(){
        var length = $('#form-product  #quantity').val();
        if(length.length > 11){
            var x = length.slice(0, 11);
            var y = $(this).val(x);
            $(this).html(y);
        }
        $('#form-product .quantity-product .error-div').html("");
    });

    // $('.search-list').click(function(){
    //     debugger;
    //     console.log($('.search-admin').val());
    // });
/**
 * Product page
 * -----------------------------------------------------------------------------
 */

    //Sự kiện click của name-product_type
    $('#form-product_type #name-product_type').on('change', function(){
        var length = $('#form-product_type  #name-product_type').val();
        var result = checkLengthName(length);
        $('#form-product_type .name-product_type .error-div').html(result);
    });

/**
 * User
 * -----------------------------------------------------------------------------
 */

    // Sự kiện thay đổi name
    $('#form-user #name-user').on('change', function(){
        var length = $('#form-user #name-user').val();
        var result = checkLengthName(length);
        $('#form-user .name-user .error-div').html(result);
    });

    // Sự kiện thay đổi username
    $('#form-user #nameuser').on('change', function(){
        var length = $('#form-user #nameuser').val();
        var result = checkLengthName(length);
        $('#form-user .nameuser .error-div').html(result);
    });

    // Sự kiện thay đổi password
    $('#form-user #password').on('change', function(){
        var length = $('#form-user #password').val();
        var result = checkLengthName(length);
        $('#form-user .password-user .error-div').html(result);
    });

    // Sự kiện thay đổi email
    $('#form-user #email').on('change', function(){
        var length = $('#form-user #email').val();
        var result = checkLengthName(length);
        $('#form-user .email-user .error-div').html(result);
    });


/**
 * Customer
 * -----------------------------------------------------------------------------
 */

    // Sự kiện thay đổi name
    $('#form-customer #name-customer').on('change', function(){
        var length = $('#form-customer #name-customer').val();
        var result = checkLengthName(length);
        $('#form-customer .name-customer .error-div').html(result);
    });

    // Sự kiện thay đổi username
    $('#form-customer #namecustomer').on('change', function(){
        var length = $('#form-customer #namecustomer').val();
        var result = checkLengthName(length);
        $('#form-customer .namecustomer .error-div').html(result);
    });

    // Sự kiện thay đổi password
    $('#form-customer #password').on('change', function(){
        var length = $('#form-customer #password').val();
        var result = checkLengthName(length);
        $('#form-customer .password-customer .error-div').html(result);
    });

    // Sự kiện thay đổi email
    $('#form-customer #email').on('change', function(){
        var length = $('#form-customer #email').val();
        var result = checkLengthName(length);
        $('#form-customer .email-customer .error-div').html(result);
    });

    // Sự kiện thay đổi address
    $('#form-customer #address').on('change', function(){
        var length = $('#form-customer #address').val();
        var result = checkLengthName(length);
        $('#form-customer .address-customer .error-div').html(result);
    });

    // Sự kiện thay đổi phonenumber
    $('#form-customer #phonenumber').on('change', function(){
        var length = $('#form-customer #phonenumber').val();
        var result = checkLengthName(length);
        $('#form-customer .phonenumber-customer .error-div').html(result);
    });

/**
 * Promotion
 * -----------------------------------------------------------------------------
 */
    //Sự kiện plugin datepicker
    $('#form-promotion #date_start').datepicker();
    console.log($('#form-promotion #date_start').datepicker());
    $('#form-promotion #date_end').datepicker();

/**
 * Slider
 * -----------------------------------------------------------------------------
 */

    // Sự kiện thay đổi name
    $('#form-slide #name-slider').on('change', function(){
        var length = $('#form-slide #name-slider').val();
        var result = checkLengthName(length);
        $('#form-slide .name-slide .error-div').html(result);
    });

    /**
     * [description] Kiểm tra hình ảnh slide
     * @param  {[type] [description]
     * @return {[type]}     [description]
     */
    $('#form-slide #image').on('change', function(){
        $('#form-slide .link-image-slide').css('display', 'block');
        readURLslide(this);
        $('#form-slide .old-link-image-slide').css('display', 'none');
        $('#form-slide .image-slide .error-div').html('');
    });
    /**
     * [readURL description] Lấy ảnh ra
     * @param  {[type]} html element [description]
     * @return {[type]} Lấy ảnh ra [description]
     */
    function readURLslide(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#img-slide').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }


/**
 * Order
 * -----------------------------------------------------------------------------
 */

    // Ajax sửa status
    $('.order-status').on('click', function(){
        var dataId = $(this).data('id');
        $.ajax({
            url: '/admin/order/editStatus',
            type: 'GET',
            data: {
                id: dataId
            }
        })
        .done(function(data) {
            $('#status-order-'+ dataId).html(data);
        });
    });

    $('#order').on('click', '.save-status', function() {
        var dataStatus = $('#select-status').val();
        var dataId = $('.save-status').attr('data');
        $.ajax({
            url: '/admin/order/updateStatus',
            type: 'GET',
            data: {
                status: dataStatus,
                id: dataId
            }
        })
        .done(function(data) {
            var str = '';
            if (dataStatus == 0) {
                str = "Đang chuyển";
            } else if(dataStatus == 1) {
                str = "Đã chuyển";
            } else {
                str = "Gặp lỗi";
            }
            str = str + "<br>"
                + "<a href='javascript:void(0)' data-id='"+ dataId +"'" 
                +"class='order-status' title=''>Sửa</a>";
            $('#status-order-' + dataId).html(str);
            alert('Update success');
        });
    });
});
