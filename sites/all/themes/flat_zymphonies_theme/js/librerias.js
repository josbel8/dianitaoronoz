jQuery(document).ready(function(){

    (function($) {

        $(".view-id-tips_front .views-field-field-image").each(function(){
            var url_img = $(this).find("img").attr("src");
            url_img = $(this).find("img").attr("src").split("?");
            url_img = "url("+url_img[0]+")";
            $(this).next().find('.clip-text').css("background-image",url_img);
        });

        $(".view-id-tips .views-field-field-image").each(function(){
            var url_img = $(this).find("img").attr("src");
            url_img = "url("+url_img+")";
            $(this).next().css("position","relative");
            $(this).next().css("z-index","1");
            $(this).next().find('.clip-text').css("background-image",url_img);
        });

        var margen_footer_center = ( parseInt($("#footer-sitemap").css('width')) -  parseInt($("#footer-sitemap .footer_links_menu-menu-secundario").css('width')))/2;
        $("#footer-sitemap .footer_links_menu-menu-secundario").css('margin-left',margen_footer_center)

        var pathname = window.location.pathname;
        var url_parts = pathname.split("/");
        var actual = url_parts[url_parts.length-1];

        if (actual=='hola-soy-dianita'){
            $('h1.page-title').attr('class','cursive_title');
            $('h1.page-title').addClass('cursive_title');
            $('h1.cursive_title').attr('style','text-align:center;margin-left:-30px;line-height: 100%;');
            $('h1.cursive_title').after('<h1 class=\'page-title\' style=\'margin:0px 0px\'>Soy Dianita</h1>');
            $('#post-content .orange_bar_content').css('margin-top','2%');
        }

        if (parseInt($(window).width())>1024){
            $('.homebanner').css('height',parseInt($(window).height()+100));
            $(window).resize(function(){
                $('.homebanner').css('height',parseInt($(window).height()+100)+"px");
            });
        };

        if ((parseInt($(window).width())<640) && (parseInt($(window).height())>parseInt($(window).width()))){
            $('#block-views-tips-front-block').find('.col-2.col-last').each(function(){
                $(this).parent().next().children().first().html('');
                $(this).parent().next().children().first().html($(this).html());
                $(this).html('');
            });
        };

        if ((parseInt($(window).width())<640) && (parseInt($(window).height())>parseInt($(window).width()))){
            $('.view-id-tips').find('table tr .col-last').each(function(){
                $(this).parent().after('<tr><td>'+$(this).html()+'</td></tr>')
                $(this).html('');
            });
//~
            //~ if (parseInt($(window).height())<630){
                //~ $('.front .header').css('margin-top','-40%');
            //~ }
        };

    })(jQuery);

});
