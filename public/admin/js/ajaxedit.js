$(function(){

    // Ajax sửa product type
	$('#edit-PRT-ajax .edit-PRT').on('click', function(){
        var id_input = $(this).attr('dataIdPRT');
        var name_input = $(this).attr('dataNamePRT');
        $('#PRT-edit #PRT-id_edit').attr('value', id_input);
        $('#PRT-edit #PRT-name_edit').attr('value', name_input);
    });

    $('body').on('click', function(){
    	$('.flash-message .message-edit').hide();
    });

    
    $('#PRT-edit #submit_PRT').on('click', function(){
        var idPRT = $('#PRT-edit #PRT-id_edit').val();
        var namePRT = $('#PRT-edit #PRT-name_edit').val();
        $.ajax({
            url: '/admin/producttype/updateajax',
            type: 'GET',
            dataType: 'JSON',
            data: {
                product_type_name: namePRT,
                id: idPRT
                // image_slider: imageSlide
            },
            success: function(data){  
            	$('.flash-message .message-edit').show();
            	$('#myEditPRT').removeClass('in');
            	$('#myEditPRT').hide();
            	$('body').removeClass('modal-open');
            	$('body').css('padding-right', '');
            	$('div:last').remove();
            	$('#PRT-edit').on('hide.bs.modal', function (e) {
				  	$(this)
					    .find("input,textarea,select")
					       .val('')
					       .end()
					    .find("input[type=checkbox], input[type=radio]")
					       .prop("checked", "")
					       .end();
				});
				var str = "<td class=''>" + idPRT + "</td>"
						+ "<td class='text-table'>" + namePRT + "</td>"
						+ "<td class='text-center'>"
						+ "<button class='btn btn-info edit-PRT' dataIdPRT='"
						+ idPRT + "' dataNamePRT='" + namePRT 
						+ "' data-toggle='modal' "
						+ " data-target='#myEditPRT' "
						+ " ><i class='glyphicon glyphicon-pencil'></i>"
						+ " </button>"
						+ " <td class='text-center'>"
						+ " <a href='" + "product_type/delete/"
						+ idPRT + " ' class='btn btn-danger btn-edit' "
						+ " onclick = '" + ' return confirm(" '
						+ "Delete?" + ' ")' + " ' " 
						+ "><i class='glyphicon glyphicon-trash'>"
						+ "</i></a>";
				$("#listPRT-" + idPRT).html(str);
	        },
	        error: function(data){
	        	var status = "Tên không được để trống";
	        	$('.send-error').html(status);
	        }
        })
    });


    // Ajax sửa Address
    $('#edit-ADS-ajax .edit-ADS').on('click', function(){
        var id_input = $(this).attr('dataIdADS');
        var name_input = $(this).attr('dataNameADS');
        $('#ADS-edit #ADS-id_edit').attr('value', id_input);
        $('#ADS-edit #ADS-name_edit').attr('value', name_input);
    });

    $('#ADS-edit #submit_ADS').on('click', function(){
        var idADS = $('#ADS-edit #ADS-id_edit').val();
        var nameADS = $('#ADS-edit #ADS-name_edit').val();
        $.ajax({
            url: '/admin/address/updateajax',
            type: 'GET',
            data: {
                address: nameADS,
                id: idADS
            },
            success: function(data){  
            	$('.flash-message .message-edit').show();
            	$('#myEditADS').removeClass('in');
            	$('#myEditADS').hide();
            	$('body').removeClass('modal-open');
            	$('body').css('padding-right', '');
            	$('div:last').remove();
            	$('#ADS-edit').on('hide.bs.modal', function (e) {
				  	$(this)
					    .find("input,textarea,select")
					       .val('')
					       .end()
					    .find("input[type=checkbox], input[type=radio]")
					       .prop("checked", "")
					       .end();
				});
				var str = "<td class='hidden'>" + idADS + "</td>"
						+ "<td class='text-table'>" + nameADS + "</td>"
						+ "<td class='text-center'>"
						+ "<button class='btn btn-info edit-ADS' dataIdADS='"
						+ idADS + "' dataNameADS='" + nameADS 
						+ "' data-toggle='modal' "
						+ " data-target='#myEditADS' "
						+ " ><i class='glyphicon glyphicon-pencil'></i>"
						+ " </button>";
				$("#listADS").html(str);
	        },
	        error: function(data){
	        	var status = "Địa chỉ không được để trống";
	        	$('.send-error').html(status);
	        }
        })
    });
});