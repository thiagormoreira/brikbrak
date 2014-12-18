$(document).ready(function(){
  $(".carousel a").click(function() {
    $("img#zoomImage").attr("src", $(this).attr("href"));
    return false;
  });

  $(".searchMenu a").click(function() {
    var formTemplate = "/forms/"+$(this).attr("href");
    $(".searchMenu a").removeClass("active");
    $(this).addClass("active");
    $("#loadForm").load(formTemplate);
    return false;
  });

    $(".registerMenu a").click(function() {
    var formTemplate = "/forms-cadastro/"+$(this).attr("href");
    $(".registerMenu a").removeClass("active");
    $(this).addClass("active");
    $("#loadRegisterForm").load(formTemplate);
    return false;
  });

    $(document).ready(function(){

        $(".contact-number").mask("(99) 9999-99999");

    });
    

	$("#typeItem").change(function() {

    	//$("#brand").empty();
    	//$("#model").empty();
    	//$("#subType").empty();
    	//$("#year").empty();
    	//$("#color").empty();
    	//$("#fuel").empty();
    	//$("#value").empty();
    	
		if ($("#typeItem").val() == '') {
	    	($("#brand").css('display', 'none'));
	    	($("#year").css('display', 'none'));
	    	($("#color").css('display', 'none'));
	    	($("#fuel").css('display', 'none'));
	    	($("#value").css('display', 'none'));
	    	($("#model").css('display', 'none'));
	    	($("#subType").css('display', 'none'));
	    	($("#bodywork").css('display', 'none'));
	    	$("#year").empty();
	    	$("#color").empty();
	    	$("#fuel").empty();
	    	$("#value").empty();
	    	//$("#model").empty();
	    	//$("#subType").empty();
	    } else {
	    	($("#brand").css('display', 'block'));
	    }
	    //if ($("#typeItem").val() == '1' || $("#typeItem").val() == '2' || $("#typeItem").val() == '3' || $("#typeItem").val() == '4'|| $("#typeItem").val() == '5') {
	    	//($("#brand").css('display', 'block'));
	    	//($("#year").css('display', 'block'));
	    	//($("#color").css('display', 'block'));
	    	//($("#fuel").css('display', 'block'));
	    	//($("#value").css('display', 'block'));
	    //}
	});
	
	$("#brand").change(function() {
		$.getJSON('/ajax/models/' + $(this).val() + '/typeitem/' + $("#typeItem").val(), function(j){	
            var options = '<option value="">Selecione o modelo...</option>';
            for (var i = 0; i < j.length; i++) {
                //options += '<option value="' + j[i].idmodel + '">' + j[i].modelName + '</option>';
            	$('#model').append('<option value=' + j[i].idmodel + '>' + j[i].modelName + '</option>');
            }	
            //$('#model').html(options).show();
            //$('#model').append(options);
        });
		
    	($("#model").css('display', 'block'));
    
	});
	
	$("#model").change(function() {
		$.getJSON('/ajax/sub-types/' + $(this).val(), function(j){	
            var options = '<option value="">Selecione o tipo...</option>';
            for (var i = 0; i < j.length; i++) {
                //options += '<option value="' + j[i].idmodel + '">' + j[i].modelName + '</option>';
            	$('#subType').append('<option value=' + j[i].idsubtype + '>' + j[i].subtypeName + '</option>');
            }	
            //$('#model').html(options).show();
            //$('#model').append(options);
        });
		
		if ($("#typeItem").val() == '1' || $("#typeItem").val() == '2' || $("#typeItem").val() == '3' || $("#typeItem").val() == '4') {
			($("#subType").css('display', 'block'));
		}
	});
	
	$("#subType").change(function() {
		
		$.getJSON('/ajax/bodyworks/' + $(this).val(), function(j){	
            var options = '<option value="">Selecione o tipo...</option>';
            for (var i = 0; i < j.length; i++) {
                //options += '<option value="' + j[i].idmodel + '">' + j[i].modelName + '</option>';
            	$('#bodywork').append('<option value=' + j[i].idbodywork + '>' + j[i].bodyworkName + '</option>');
            }	
            $('#bodywork').html(options).show();
            //$('#model').append(options);
        });
    	
    	if ($("#subType").val() == '') {
    		($("#year").css('display', 'none'));
        	($("#color").css('display', 'none'));
        	($("#fuel").css('display', 'none'));
        	($("#value").css('display', 'none'));
        	($("#bodywork").css('display', 'none'));
    	} else {
    		($("#year").css('display', 'block'));
        	($("#color").css('display', 'block'));
        	($("#fuel").css('display', 'block'));
        	($("#value").css('display', 'block'));
        	
    		if ($("#typeItem").val() == '1' || $("#typeItem").val() == '3') {
    			($("#bodywork").css('display', 'block'));
    		}
    	}
	});
	
	$("#state").change(function() {

		($("#city").css('display', 'block'));
		$.getJSON( "/ajax/cities/" + $(this).val(), function( data ) {
			$.each(data,function(value){
				console.log(value['cityName']);
				$("#city").append('<option value=' + '' + '>' + value['cityName'] + '</option>');
			});
		});
		/*
		$.getJSON('/ajax/cities/' + $(this).val(), function(j){	
            var options = '<option value="">Selecione a cidade...</option>';
        }).done(function( data ) {
            $.each( data.items, function( i, item ) {
            	$('#city').append('<option value=' + item.idcity + '>' + item.cityName + '</option>');
              });
            });
	*/
	});
	
});


