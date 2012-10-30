Cufon.replace('.cufoned',{fontWeight: 'normal'});
Cufon.replace('#top-links',{fontWeight: 'normal'});
Cufon.replace('#head-menu > ul > li > a',{fontWeight: 'normal'});

(function($) {
    $(document).ready(function() {

        $(".attachment-thumbnail").each(function() 
        {
            $(this).parents("a:first").attr('rel','lightbox-gal');
        });
        
//        $('a[rel="lightbox-gal"]').colorbox({
//            slideshow: true,
//            slideshowAuto: false,
//            current: "{current} z {total}",
//            maxWidth: "80%;",
//            maxHeight: "80%",
//            opacity: "0.60"
//        });
//        
//        $('a[href$=".jpg"][rel!="lightbox-gal"],a[href$=".png"][rel!="lightbox-gal"]').colorbox({
//            slideshow: true,
//            slideshowAuto: false,
//            current: "{current} z {total}",
//            maxWidth: "80%;",
//            maxHeight: "80%",
//            opacity: "0.60"
//        });

        $('.scroll-pane').jScrollPane({autoReinitialise: true, horizontalGutter: 0, verticalGutter: 0});
        
        $("#head-image").hover(function(){
            $("#head-menu > ul > li").children("ul").slideUp(100);
        },function(){
        });

        $("#head-menu > ul > li").hover(function(){
            $(this).siblings().children('ul').slideUp(100);
            $(this).children('ul').slideDown(100);
        },function(){
            if( !$(this).children("ul").is(":animated") ){
                $(this).children('ul').slideUp(100);
            }
        });
        
        $("#head-menu > ul > li > ul > li").hover(function(){ 
            $(this).siblings().children('ul').hide(100);
            $(this).children('ul').show(100);
        },function(){
            if( !$(this).children("ul").is(":animated") ){
                $(this).children('ul').hide(100);
            }
        });

        
        $("#head-menu ul li ul li").hover(function(){
            $(this).children('a').addClass('menu-selected');
        },function(){
            $(this).children('a').removeClass('menu-selected');
        });

    });
})(jQuery);