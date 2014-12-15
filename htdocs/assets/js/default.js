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

});

$(function() {
    $(".carousel").jCarouselLite({
        btnNext: ".next",
        btnPrev: ".prev",
        circular: false,
        visible: 5
    });
});



