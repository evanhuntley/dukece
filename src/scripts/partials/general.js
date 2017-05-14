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

    // Sticky Header
    var headerOffset = $('header').offset().top;

    $(window).scroll(function(){
      var header = $('header'),
          scroll = $(window).scrollTop();

      if (scroll >= headerOffset) header.addClass('fixed');
      else header.removeClass('fixed');
    });
    

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

    // Set Form Region based on URL Hash
    var location = getUrlVars().location;
    if ( location ) {
        $('.region-select select').val(location);
    }
    
    // Expand/Collapse locations
    $('.region').on('click', function() {
        var $this = $(this);
      
        if ($this.next().hasClass('show')) {
            $this.next().removeClass('show');
            $this.next().slideUp(350);
        } else {
            $this.parent().parent().find('.office').removeClass('show');
            $this.parent().parent().find('.office').slideUp(350);
            $this.next().toggleClass('show');
            $this.next().slideToggle(350);
        }
    });
});
