( function($) { 
    $(window).scroll(function(){
        var scroll_pos =  window.scrollY;
        if( window.outerWidth < 1200) {
            return;
        } 
        $("#scrollbg").css({
            'background-position-y':-scroll_pos +'px'
        });
    });
})(jQuery);