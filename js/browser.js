 $(document).ready(function(){
      switchTo('index');

      $('#scroller-reglement-window').scrollable({
	 easing: 'swing',
	 size: '1',
	 items: '#scroller-reglement-wrap',
	 loop: false,
	 next: '#button-next-reglement' ,
	 prev: '#button-previous-reglement',
	 keyboard: false,			
	 speed: '800',
	 onBeforeSeek:function(){
	    var index = this.getIndex();
	    if(index==0){ $('#button-next-reglement').hide();$('#button-previous-reglement').show();}
	    else if (index==1){ $('#button-previous-reglement').hide();$('#button-next-reglement').show();}
	 },
      });
      
      $('#scroller-palmares-window').scrollable({
	 easing: 'swing',
	 size: '1',
	 items: '#scroller-palmares-wrap',
	 loop: false,
	 next: '#button-next-palmares' ,
	 prev: '#button-previous-palmares',
	 keyboard: false,			
	 speed: '800',
	 onBeforeSeek:function(){
	    var index = this.getIndex();
	    if(index==0){ $('#button-next-palmares').hide();$('#button-previous-palmares').show();}
	    else if (index==1){ $('#button-previous-palmares').hide();$('#button-next-palmares').show();}
	 },
      });
	/*$("#scroller-index-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-index-wrap',
		loop: 'true',
		next: '#button-next-index' ,
		navi: '#dots-index',
		naviItem: 'a',
		keyboard: true,
		speed: '800'
	});	

	$("#scroller-reglement-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-reglement-wrap',
		loop: 'true',
		next: '#button-next-reglement' ,
		navi: '#dots-reglement',
		naviItem: 'a',
		keyboard: true,			
		speed: '800'
	});				
	$("#scroller-calendrier-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-calendrier-wrap',
		loop: 'true',
		next: '#button-next-calendrier' ,
		navi: '#dots-calendrier',
		naviItem: 'a',
		keyboard: true,			
		speed: '800'
	});
	$("#scroller-palmares-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-palmares-wrap',
		loop: 'true',
		next: '#button-next-palmares' ,
		navi: '#dots-palmares',
		naviItem: 'a',
		keyboard: true,			
		speed: '800'
	});
	$("#scroller-sinscrire-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-sinscrire-wrap',
		loop: 'true',
		next: '#button-next-sinscrire' ,
		navi: '#dots-sinscrire',
		naviItem: 'a',
		keyboard: true,			
		speed: '800'
	});
	$("#scroller-spectateur-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-spectateur-wrap',
		loop: 'true',
		next: '#button-next-spectateur' ,
		navi: '#dots-spectateur',
		naviItem: 'a',
		keyboard: true,			
		speed: '800'
	});
	$("#scroller-sponsor-window").scrollable({
		easing: 'swing',
		size: '1',
		items: '#scroller-sponsor-wrap',
		loop: 'true',
		next: '#button-next-sponsor' ,
		navi: '#dots-sponsor',
		naviItem: 'a',
		keyboard: true,			
		speed: '800'
	});*/
			
 	//set up events to handle browsing project categories
    $("#projects .index a ").bind("click", function(){ switchTo("index"); });
    $("#projects .reglement a ").bind("click", function(){ switchTo("reglement");});
	$("#projects .programme a ").bind("click", function(){ switchTo("programme");});
    $("#projects .calendrier a ").bind("click", function(){ switchTo("calendrier");}); 
    $("#projects .palmares a ").bind("click", function(){ switchTo("palmares");}); 
    $("#projects .sinscrire a ").bind("click", function(){ switchTo("sinscrire");});
    $("#projects .spectateur a ").bind("click", function(){ switchTo("spectateur");}); 
    $("#projects .sponsor a ").bind("click", function(){ switchTo("sponsor");});  
    		
  });
 		
var curSect = "";

function switchTo(which){
	jQuery.easing.def = "easeInOutSine";
	
	h = $(".project").height();  //so we don't have to hardcode the row height;
	if (which == curSect) { return; }  //don't switch if we are on the selected tab
	
	if (which == "index"){
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		$("#button-next-index").show();		
		$(".dots").hide();
		$("#dots-index").show(300);		
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .index a").css("cursor", "default");			
		$("#type-nav .current").animate({top: "-1px"  }, { "duration": 300 } );
		$("#type-nav .index span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: '0'}, { "duration": 300 } );
	}
		
	if (which == "reglement"){
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
        var index = $('#scroller-reglement-window').scrollable().getIndex();
	    if(index==1){ $('#button-next-reglement').hide();$('#button-previous-reglement').show();}
	    else if (index==0){ $('#button-previous-reglement').hide();$('#button-next-reglement').show();}
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .reglement a").css("cursor", "default");					
		$("#type-nav .current").animate({ 	top: "35px"   }, { "duration": 300 } );
		$("#type-nav .reglement span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h)+"px"}, { "duration": 300 } );
		$("#dots-reglement").show(300);
	}
	
	if (which == "programme"){
	
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		$("#button-next-programme").show();		
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .programme a").css("cursor", "default");				
		$("#type-nav .current").animate({ 		top: "71px"	    }, { "duration": 300} );
		$("#type-nav .programme span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h*2)+"px"}, { "duration": 300 } );
		$("#dots-programme").show(300);	
	}	
	
	if (which == "calendrier"){
	
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		$("#button-next-calendrier").show();		
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .calendrier a").css("cursor", "default");				
		$("#type-nav .current").animate({ 		top: "107px"	    }, { "duration": 300} );
		$("#type-nav .calendrier span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h*3)+"px"}, { "duration": 300 } );
		$("#dots-calendrier").show(300);	
	}	
	
	if (which == "palmares"){
	
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		var index = $('#scroller-palmares-window').scrollable().getIndex();
	    if(index==1){ $('#button-next-palmares').hide();$('#button-previous-palmares').show();}
	    else if (index==0){ $('#button-previous-palmares').hide();$('#button-next-palmares').show();}
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .palmares a").css("cursor", "default");				
		$("#type-nav .current").animate({ 		top: "143px"	    }, { "duration": 300} );
		$("#type-nav .palmares span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h*4)+"px"}, { "duration": 300 } );
		$("#dots-palmares").show(300);	
	}	
	
	if (which == "sinscrire"){
	
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		$("#button-next-sinscrire").show();		
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .sinscrire a").css("cursor", "default");				
		$("#type-nav .current").animate({ 		top: "179px"	    }, { "duration": 300} );
		$("#type-nav .sinscrire span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h*5)+"px"}, { "duration": 300 } );
		$("#dots-sinscrire").show(300);	
	}	
	
	if (which == "spectateur"){
	
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		$("#button-next-spectateur").show();		
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .spectateur a").css("cursor", "default");				
		$("#type-nav .current").animate({ 		top: "215px"	    }, { "duration": 300} );
		$("#type-nav .spectateur span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h*6)+"px"}, { "duration": 300 } );
		$("#dots-spectateur").show(300);	
	}	
	
	
	if (which == "sponsor"){
	
		$(".button-next-project").hide();
		$(".button-previous-project").hide();
		$("#button-next-sponsor").show();		
		$(".dots").hide();
		$("#type-nav span").animate({opacity: '.65'}, { "duration": 300 } );	
		$("#type-nav a").css("cursor", "pointer");		
		$("#type-nav .sponsor a").css("cursor", "default");				
		$("#type-nav .current").animate({ 		top: "251px"	    }, { "duration": 300} );
		$("#type-nav .sponsor span").animate({opacity: '1.0'}, { "duration": 300 } );
		$("#scroller-vertical").animate({top: "-"+(h*7)+"px"}, { "duration": 300 } );
		$("#dots-sponsor").show(300);	
	}	
	
	curSect = which;

}

