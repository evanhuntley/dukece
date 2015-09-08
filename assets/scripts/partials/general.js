/* ===================================================================
    Duke CE Scripts
====================================================================== */

function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for(var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}

jQuery(function($) {

    // Toggle Nav Menu
    $('.nav-toggle').on('click', function() {
        $('.header-wrap').toggleClass('open');
        $(this).toggleClass('active');
    });

    $('.menu-item-has-children').each(function(e) {
        var self = $(this);
        self.append('<span class="toggle-sub"></span>');
    });

    $('.toggle-sub').click(function(e) {
        $(this).toggleClass('active');
        var submenu = $(this).prev('.sub-menu');

        if ( submenu.is(':visible')) {
            submenu.slideToggle();
        } else {
            $('.sub-menu').slideUp();
            submenu.slideToggle();
        }


        e.preventDefault();
    });

    // Init Flexslider
    $('.flexslider').flexslider({
        controlNav: false,
        directionNav: false
    });

    // Set Form Region based on URL Hash
    var location = getUrlVars()["location"];
    if ( location ) {
        $('.region-select select').val(location);
    }
});
