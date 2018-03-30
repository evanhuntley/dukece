/* ===================================================================
    Facebook/Google Tracking
====================================================================== */

function track_event(name, category, value) {
    
    // Track Facebook
    fbq('trackCustom', name, {
        event_category: category,
        event_val: value 
    });
    
    // Track Google
    ga('send', {
        hitType: 'event',
        eventCategory: category,
        eventAction: name,
        eventLabel: value
    });
    
}

jQuery(function($) {    
    
    // Scroll Depth Tracking 
    var quarter = half = threeQuarter = whole = false;
    
    $(window).scroll(function() {
        
        var s = $(window).scrollTop(),
            d = $(document).height(),
            c = $(window).height();

        var scrollPercent = (s / (d-c)) * 100;
        
        if ( scrollPercent == 100 && whole === false) {
            track_event('scroll', 'scroll-depth', '100');
            whole = true;
        } else if (scrollPercent >= 75 && threeQuarter === false) {
            track_event('scroll', 'scroll-depth', '75');
            threeQuarter = true;
        } else if (scrollPercent >= 50 && half === false) {
            track_event('scroll', 'scroll-depth', '50');
            half = true;
        } else if (scrollPercent >= 25 && quarter === false) {
            track_event('scroll', 'scroll-depth', '25');
            quarter = true;
        }
        
    });
    
    // Stopgap solution for events on registration links @todo
    $('.register-episode-1').on('click', function() {
        track_event('register', 'leadership-series', 'top');
    });
    
    $('.register-episode-1a').on('click', function() {
        track_event('register', 'leadership-series', 'bottom');
    });
});
