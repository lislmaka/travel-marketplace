// $(function () {
//     $('[data-toggle="tooltip"]').tooltip()
// })

/*
Переход по быстрым ссылкам
 */
// $(function () {
//     $('.nav-link').click(function(){
//         let divId;
//         $('.nav-link').removeClass("event-active-navbar");
//         $(this).addClass("event-active-navbar");
//         divId = $(this).attr('href');
//         $('html, body').animate({
//             scrollTop: $(divId).offset().top - 150
//         }, 100);
//     });
// });

window.gotoHref = function gotoHref(id) {
    $('.nav-link').removeClass("event-active-navbar");
    $(id).addClass("event-active-navbar");
    divId = $(id).attr('href');
    $('html, body').animate({
        scrollTop: $(divId).offset().top - 150
    }, 100);
}
