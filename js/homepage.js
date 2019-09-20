( function($) { 
    $(window).scroll(function(){
        var scroll_pos =  window.scrollY;
        $("#group-head").css({
            'background-position-y':-scroll_pos +'px'
        });
    });
})(jQuery);