// stick the footer at the bottom of the page
$(window).on('load resize', function() {
    var windowHeight = $(window).outerHeight();
    var siteHeight = $('#root').outerHeight();
    var footerHeight = $('#footer').outerHeight();
    var position = 0;

    if (windowHeight > (siteHeight + footerHeight)) {
        position = windowHeight - siteHeight - footerHeight;
    }

    $('#footer').css('position', 'relative').css('top', position);
});
