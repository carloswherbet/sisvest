$(function(){

    $("ul.dropdown li").hover(function(){
    
        $(this).addClass("hover");
//        $('ul:first',this).css('visibility', 'visible');
        $('ul:first',this).show('fast');
    
    }, function(){
    
        $(this).removeClass("hover");
//        $('ul:first',this).css('visibility', 'hidden');
        $('ul:first',this).hide('fast');
    
    });
    
    $("ul.dropdown li ul li:has(ul)").find("a:first").append(" &raquo; ");

});