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
    
    // Polyfill SVG
    svg4everybody();

    // Toggle Search Form
    $('.search-toggle').on('click', function() {
        $(this).parent().toggleClass('active');
    });

    // Toggle Nav Menu
    $('.nav-toggle').on('click', function() {
        $('.menu').toggleClass('open');
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
    
    // Init Digital Slider
    $('#digital-slider').flexslider({
        animation: "fade",
        animationLoop: true,
        controlNav: true,
        directionNav: true
    });    
    
    // Init Webinar Slider
    $('#webinar-slider-nav').flexslider({
        animation: "slide",
        animationLoop: false,
        controlNav: false,
        directionNav: false,
        itemWidth: 210,
        itemMargin: 5,
        asNavFor: "#webinar-slider"
    });
    
    $('#webinar-slider').flexslider({
        animation: "fade",
        controlNav: false,
        animationLoop: false,
        directionNav: false,
        sync: "#webinar-slider-nav"
    });

    // Set Form Region based on URL Hash
    var location = getUrlVars().location;
    if ( location ) {
        $('.region-select select').val(location);
    }
    
    // Expand/Collapse locations
    $('.region').on('click', function() {
        var $this = $(this);
      
        if ($this.hasClass('show')) {
            $this.removeClass('show');
            $this.next().slideUp(350);
        } else {
            $this.parent().find('.region').removeClass('show');
            $this.parent().find('.office').slideUp(350);
            $this.toggleClass('show');
            $this.next().slideToggle(350);
        }
    });
});
