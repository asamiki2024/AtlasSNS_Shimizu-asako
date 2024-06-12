$(function (){
$('.nav-btn').on("click", function(){
    $(this).next().slideToggle();
    $(this).toggleClass("open");

    $('.nav-btn').not(this).removeClass('open');
    });
});