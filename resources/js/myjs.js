$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

/*
Переход по быстрым ссылкам
 */
var divId;

$('.nav-link').click(function(){
    $('.nav-link').removeClass("event-active-navbar");
    $(this).addClass("event-active-navbar");
    divId = $(this).attr('href');

    $('html, body').animate({
        scrollTop: $(divId).offset().top - 150
    }, 100);
});
