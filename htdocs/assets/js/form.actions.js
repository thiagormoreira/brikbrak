$(document).ready(function(){

	$(".inputCheckbox").click(function(){
		var dataInputValue = $(this).data("input-value");
		var dataInputId= $(this).data("input-id");
		if($(this).hasClass("checked")){
			$(this).removeClass("checked");
			$("#"+dataInputId).val(0);
		}else{
			$(this).addClass("checked");
			$("#"+dataInputId).val(dataInputValue);
		}
	});

	$(".inputRadio").click(function(){
		var dataInputValue = $(this).data("input-value");
		var dataInputId= $(this).data("input-id");

		if($(this).hasClass("checked")){
			$(".inputRadio").removeClass("checked");
			$("#"+dataInputId).val(0);
		}
		else{
			$(".inputRadio").removeClass("checked");
			$(this).addClass("checked");
			$("#"+dataInputId).val(dataInputValue);
		}
	});

	$("select").change(function () {
		var dataTextId = $(this).data("text-id");
		$("#"+dataTextId).text($(this).find(":selected").val());
	});

});