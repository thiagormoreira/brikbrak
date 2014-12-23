$(document).ready(function(){
  $(".carousel a").click(function() {
    $("img#zoomImage").attr("src", $(this).attr("href"));
    return false;
  });

  $(".searchMenu a").click(function(event) {
	event.preventDefault();
    var formTemplate = "/forms/"+$(this).attr("href");
    $(".searchMenu a").removeClass("active");
    $(this).addClass("active");
    $("#loadForm").load(formTemplate);
    
    $.getJSON('/ajax/brands', function(j){
        var options = '<option value="">Selecione a marca...</option>';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].idbrand + '">' + j[i].brandName + '</option>';
        }	
        $('#brand').html(options).show();
	})
	
	$.getJSON('/ajax/states', function(j){
        var options = '<option value="">Selecione o estado...</option>';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].idstate + '">' + j[i].stateName + '</option>';
        }	
        $('#state').html(options).show();
	})
    
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
    

	$("#typeItem").change(function(event) {
		event.preventDefault();
    	//$("#brand").empty();
    	$("#model").empty();
    	$("#subType").empty();
    	$("#color").empty();
    	$("#value").empty();
    	$("#year").css('display', 'none');
    	$("#color").css('display', 'none');
    	$("#fuel").css('display', 'none');
    	$("#value").css('display', 'none');
    	$("#model").css('display', 'none');
    	$("#subType").css('display', 'none');
    	$("#bodywork").css('display', 'none');
    	
		if ($("#typeItem").val() == '') {
	    	($("#brand").css('display', 'none'));
	    	($("#year").css('display', 'none'));
	    	($("#color").css('display', 'none'));
	    	($("#fuel").css('display', 'none'));
	    	($("#value").css('display', 'none'));
	    	($("#model").css('display', 'none'));
	    	($("#subType").css('display', 'none'));
	    	($("#bodywork").css('display', 'none'));
	    	$("#brand").empty();
	    	$("#color").empty();
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
	
	$("#brand").change(function(event) {
		event.preventDefault();
		if( $(this).val() ) {
            $.getJSON('/ajax/models/' + $(this).val() + '/typeitem/' + $(this).data("type-item"), function(j){
                var options = '<option value="">Selecione o modelo...</option>';
                for (var i = 0; i < j['models'].length; i++) {
                    options += '<option value="' + j['models'][i].idmodel + '">' + j['models'][i].modelName + '</option>';
                }	
                $('#model').html(options).show();
            });
        } else {
            $('#model').html('<option value="0">-- Escolha uma marca --</option>');
        }
		
    	($("#model").css('display', 'block'));
    
	});
	
	$("#model").change(function(event) {
		event.preventDefault();
		if( $(this).val() ) {
            $.getJSON('/ajax/sub-types/' + $(this).val(), function(j){
                var options = '<option value="">Selecione o tipo...</option>';
                for (var i = 0; i < j['subtypes'].length; i++) {
                    options += '<option value="' + j['subtypes'][i].idsubtype + '">' + j['subtypes'][i].subtypeName + '</option>';
                }	
                $('#subType').html(options).show();
            });
        } else {
            $('#subType').html('<option value="0">-- Escolha um modelo --</option>');
        }
		
		if ($("#typeItem").val() == '1' || $("#typeItem").val() == '2' || $("#typeItem").val() == '3' || $("#typeItem").val() == '4') {
			($("#subType").css('display', 'block'));
		}
	});
	
	$("#subType").change(function(event) {
		event.preventDefault();
		if( $(this).val() ) {
            $.getJSON('/ajax/bodyworks/' + $(this).val(), function(j){
                var options = '<option value="">Selecione a carroceria...</option>';
                for (var i = 0; i < j['bodyworks'].length; i++) {
                    options += '<option value="' + j['bodyworks'][i].idbodywork + '">' + j['bodyworks'][i].bodyworkName + '</option>';
                }	
                $('#bodywork').html(options).show();
            });
        } else {
            $('#bodywork').html('<option value="0">-- Escolha um tipo --</option>');
        }
    	
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
	
	$('#state').change(function(event){
		event.preventDefault();
        if( $(this).val() ) {
            $.getJSON('/ajax/cities/' + $(this).val(), function(j){
                var options = '<option value="">Selecione</option>';
                for (var i = 0; i < j['states'].length; i++) {
                    options += '<option value="' + j['states'][i].idcity + '">' + j['states'][i].cityName + '</option>';
                }	
                $('#city').html(options).show();
            });
        } else {
            $('#city').html('<option value="0">-- Escolha um estado --</option>');
        }
    });
	
	$("#published").bootstrapSwitch();
	
});


$(document).ready(function(){
	$.getJSON('/ajax/brands', function(j){
        var options = '<option value="">Selecione a marca...</option>';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].idbrand + '">' + j[i].brandName + '</option>';
        }	
        $('#brand').html(options).show();
	})
	
	$.getJSON('/ajax/states', function(j){
        var options = '<option value="">Selecione o estado...</option>';
        for (var i = 0; i < j.length; i++) {
            options += '<option value="' + j[i].idstate + '">' + j[i].stateName + '</option>';
        }	
        $('#state').html(options).show();
	})
});

