$(document).ready(run);

function run() {
    document.body.style.backgroundColor = "#660000";

    $(".accordionContent").not($(".accordionContent").first()).hide();
   
    $(".accordionLabel").on("click", accordionContentToggle);
    
    function accordionContentToggle() {
       
        $(".accordionContent").not($(this).siblings()).slideUp();
        
        $(this).siblings().slideToggle();
        
        
    }
}
