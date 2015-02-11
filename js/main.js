$(document).ready(function(){
   var oldOpacity = "0";
   $(".hovFade").hover(
	    function () {
		  oldOpacity = $(this).css("opacity");		
	    $(this).animate({opacity: '1'},{"duration":200});
   },
   function () {
	    $(this).animate({opacity: oldOpacity},{"duration":200});
   }
   );
});

