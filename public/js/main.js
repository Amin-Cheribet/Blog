$(document).ready(function() {
    var previousPos = 0;
    var currentPos = 0;
    var contentScrollPosition = $('.content').offset().top - $('.header').height();
    $(document).scroll(function() {
        currentPos = $(document).scrollTop();
        if ((previousPos < currentPos) && ($(document).scrollTop() < contentScrollPosition)) {
            scrollContentDown(contentScrollPosition);
            previousPos = currentPos
        }
        if (previousPos > currentPos && $(document).scrollTop() < contentScrollPosition) {
            scrollContentUp(contentScrollPosition);
            previousPos = currentPos;
        }
    });
    $(document).scroll(function() {
        if ($(document).scrollTop() > ($('.content').offset().top - $('.header').height())) {
            headerColored();
        }
        if ($(document).scrollTop() < ($('.content').offset().top - $('.header').height())) {
            headerTransparent();
        }
    });
    $('.arrow-container').click(function() {
        if ($('.arrow').hasClass('arrow-up')) {
            scrollContentDown(contentScrollPosition);
        }
        if ($('.arrow').hasClass('arrow-down')) {
            scrollContentUp(contentScrollPosition);
        }
    });
    $('#login').click(function() {
        $('.login-form').toggleClass('display');
    });
});
$(window).load(function() {

});

function scrollContentDown(contentScrollPosition)
{
    $('html').animate({scrollTop: contentScrollPosition}, 'slow', function() {
        $('.arrow').removeClass('arrow-up').addClass('arrow-down');
        $('.arrow').animate({"transform": "rotate(45deg)"}, 400);
        $(this).stop(true, true);
    });
}

function scrollContentUp(contentScrollPosition)
{
    $('html').animate({scrollTop: 0}, 'slow', function() {
        $('.arrow').removeClass('arrow-down').addClass('arrow-up');
        $('.arrow').animate({"transform": "rotate(45deg)"}, 400);
        $(this).stop(true, true);
    });
}

function headerTransparent()
{
    $('.header').addClass('transparent-header').removeClass('colored-header');
}

function headerColored()
{
    $('.header').removeClass('transparent-header').addClass('colored-header');
}
