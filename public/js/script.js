$(function (){
$('.nav-btn').on("click", function(){
    $(this).next().slideToggle();
    $(this).toggleClass("open");

    $('.nav-btn').not(this).removeClass('open');
    });

$('.nav-menu').on("click", function(){
    $(this).removeClass("selected");
    $(this).addClass("selected");
});

});