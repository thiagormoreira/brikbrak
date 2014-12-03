$(document).ready(function(){
  $(".carousel a").click(function() {
    $("img#zoomImage").attr("src", $(this).attr("href"));
    return false;
  });

  $(".searchMenu a").click(function() {
    var formTemplate = "forms/"+$(this).attr("href");
    $(".searchMenu a").removeClass("active");
    $(this).addClass("active");
    $("#loadForm").load(formTemplate);
    return false;
  });

});

if($(".carousel").length > 0){
  enquire.register("screen and (min-width:320px)", function() {
  	$(".carousel").jCarouselLite({
        btnNext: ".btnNav",
        circular: true,
        visible: 3.4
    });
  })
  .register("screen and (min-width:480px)", function() {
  	$(".carousel").jCarouselLite({
        btnNext: ".btnNav",
        circular: true,
        visible: 5.7
    });
  })
  .register("screen and (min-width:768px)", function() {
  	$(".carousel").jCarouselLite({
        btnNext: ".btnNav",
        circular: true,
        visible: 4.6
    });
  })
  .register("screen and (min-width:992px)", function() {
  	$(".carousel").jCarouselLite({
        btnNext: ".btnNav",
        circular: true,
        visible: 6.2
    });
  })
  .register("screen and (min-width:1024px)", function() {
  	$(".carousel").jCarouselLite({
        btnNext: ".btnNav",
        circular: true,
        visible: 5
    });
  });
}



