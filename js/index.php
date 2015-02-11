<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head profile="http://www.w3.org/2006/03/hcard">
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
   <title>28ème concours de piano amateur de l'&Eacute;cole polytechnique</title>
   
   <!--TODO list :
   
   -->

   <!-- Meta Tags-->   
   <meta name="Description" content="Le concours international de piano amateur de l'école polytechnique réunit chaque année des étudiants des écoles et universités françaises ou étrangères.
   Il a lieu à l'école polytechnique à Palaiseau (Essonne). Un orchestre professionnel est présent lors de la finale.">

   <meta name="Keywords" content="concours, piano, amateur, étudiant, x, polytechnique, école, palaiseau, essonne, grandes écoles">


   <!-- Favicon-->
   <link rel="shortcut icon" href="images2/favicon.png" type="image/x-icon">

   <!-- CSS Styles -->
   <link rel="stylesheet" href="css/main.css" media="screen, projection"> 
   <link rel="stylesheet" href="css/ie7.css" type="text/css" media="screen, projection">   		


   <!-- Javascript -->

   <script type="text/javascript" src="js/jquery.min.js"></script>
   <script type="text/javascript" src="js/main.js"></script>

   <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
   <!-- BE CAREFUL IF UPGRADING TO NEWER VERSION OF SCROLLABLE - THIS SCRIPT HAS A BUG & NEEDS A MODIFICATION -->
   <script type="text/javascript" src="js/jquery.scrollable-1.0.3.js"></script>
   <script type="text/javascript" src="js/browser.js"></script>
   
   <!--[if IE 6]>
   <script type="text/javascript"> 
      /*Load jQuery if not already loaded*/ if(typeof jQuery == 'undefined'){ document.write("<script type=\"text/javascript\"   src=\"http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js\"></"+"script>"); var __noconflict = true; } 
      var IE6UPDATE_OPTIONS = {
	 icons_path: "http://www.metalabdesign.com/template/ie6update/images/"
      }
   </script>
   <script type="text/javascript" src="http://www.metalabdesign.com/template/ie6update/ie6update.js"></script>
   <![endif]-->
</head>

<body id="page-home" class="">

   <div id="header">
      <div class="column">
	 <div class="column-left">
	    <h1 id="date">4 Mars 2014</h1>
	    <h1 id="heure"> 20h30 </h1>
	 </div>
	 
	 <div class="column-right">
	    <h1 id="lieu">&Eacute;cole polytechnique</h1>
	    <h1 id="ville">Palaiseau</h1>
	 </div>
	 
      </div>
	   
      </div>	
   </div><!-- #header -->
   
   
   <div id="main">
	    <h2 id="tagline">Concours international de piano amateur de l'&Eacute;cole polytechnique</h2>
   
	    <div id="projects">
	    <div id="projects-bottom"></div>
		  <ul id="type-nav">
			   <li class="index"><a style="cursor: default; "><span style="opacity: 1; ">Présentation</span></a></li>		
			   <li class="reglement"><a style="cursor: pointer; "><span style="opacity: 0.65; ">Réglement</span></a></li>
			   <li class="programme"><a style="cursor: pointer; "><span style="opacity: 0.65; ">Programme</span></a></li>
			   <li class="calendrier"><a style="cursor: pointer; "><span style="opacity: 0.65; ">Calendrier</span></a></li>
			   <li class="palmares"><a style="cursor: default; "><span style="opacity: 0.65; ">Palmarès</span></a></li>		
			   <li class="sinscrire"><a style="cursor: pointer; "><span style="opacity: 0.65; ">S'incrire</span></a></li>
			   <li class="spectateur"><a style="cursor: pointer; "><span style="opacity: 0.65; ">Spectateurs</span></a></li>
			   <li class="sponsor"><a style="cursor: pointer; "><span style="opacity: 0.65; ">Sponsors</span></a></li>
			   <li class="current" style="top: -1px; "></li>
		  </ul><!-- #type-nav -->
   
   <div id="scroller-window">
      <div id="scroller-vertical" style="top: 0px; ">
      
	 <div id="scroller-index-window">
	 <!-- BUG <div id="scroller-index-wrap" style="left: -1240px; ">		-->
	 <div id="scroller-index-wrap">
			      
		  
	    <div class="project">
	    
	       <div class="image-wrap">
		  <img src="images2/candidat1.jpg" alt="Photo : un candidat du XXIème concours">
		  <div class="overlay"></div>				       
	       </div><!-- .image-wrap -->
			
	       <h3 class="title">Le concours international de piano amateur de l'&Eacute;cole polytechnique</h3>
	       
	       <div class="text">
		  <?php include('contenu/presentation.html');?>
	       </div>
	    </div><!-- .project -->	
			
				    

	 </div><!-- #scroller-index-wrap -->
	 </div><!-- #scroller-index-window -->
   
	 <div id="scroller-reglement-window">
	 <div id="scroller-reglement-wrap">		
		  
	       <div class="project">
	       	
		  <h3 class="title">Réglement</h3> 	
		  <div class="text">
		     <?php include('contenu/reglement1.html');?>
		  </div>
	
	       </div><!-- .project -->
	       
	       
	       <div class="project">
	       	
		  <h3 class="title">Réglement</h3> 	
		  <div class="text">
		     <?php include('contenu/reglement2.html');?>
		  </div>
	
	       </div><!-- .project -->
		  
				    
								     
	 </div><!-- #scroller-reglement-wrap -->
	 </div><!-- #scroller-reglement-window -->			

	 <div id="scroller-calendrier-window">
	 <div id="scroller-calendrier-wrap">		
			
		  <div class="project">
			 <div class="image-wrap">
			   <img src="images2/candidat2.jpg" alt="Photo : un candidat du concours">
			   <div class="overlay"></div>				       
			</div><!-- .image-wrap -->
	       
			<h3 class="title">Calendrier</h3> 
			<div class="text">
			   <?php include('contenu/calendrier.html');?>
			</div>
		  </div><!-- .project -->	

	 </div><!-- #scroller-calendrier-wrap -->
	 </div><!-- #scroller-calendrier-window -->
	 
	 <div id="scroller-palmares-window">
	 <div id="scroller-palmares-wrap">		
			
		  <div class="project">
			<h3 class="title">Palmarès</h3> 
			<div class="text">
			   <?php include('contenu/palmares1.html');?>
			</div>
		  </div><!-- .project -->
		  
		  <div class="project">			
			<h3 class="title">Palmarès</h3> 
			<div class="text">
			   <?php include('contenu/palmares2.html');?>
			</div>
		  </div><!-- .project -->

	 </div><!-- #scroller-palmares-wrap -->
	 </div><!-- #scroller-palmares-window -->
	 
	 <div id="scroller-sinscrire-window">
	 <div id="scroller-sinscrire-wrap">		
			
		  <div class="project">
			<h3 class="title">Vous souhaitez participer au concours ?</h3> 
			<div class="text">
			   <?php include('contenu/sinscrire.html');?>
			</div>
		  </div><!-- .project -->	

	 </div><!-- #scroller-sinscrire-wrap -->
	 </div><!-- #scroller-sinscrire-window -->
	 
	 <div id="scroller-spectateur-window">
	 <div id="scroller-spectateur-wrap">		
			
		  <div class="project">
			<div class="image-wrap">
			   <img src="images2/amphi_poincare.jpg" alt="Photo : l'amphithéâtre Poincaré de l'Ecole polytechnique">
			   <div class="overlay"></div>				       
			</div><!-- .image-wrap -->
			
			<h3 class="title">Assister à la finale</h3> 
			<div class="text">
			   <?php include('contenu/spectateur.html');?>
			</div>
		  </div><!-- .project -->	

	 </div><!-- #scroller-spectateur-wrap -->
	 </div><!-- #scroller-spectateur-window -->
	 
	 <div id="scroller-sponsor-window">
	 <div id="scroller-sponsor-wrap">		
			
		  <div class="project">
			
			<h3 class="title">Sponsors</h3> 
			<div class="text">
			   <?php include('contenu/sponsor.html');?>
			</div>
		  </div><!-- .project -->	

	 </div><!-- #scroller-sponsor-wrap -->
	 </div><!-- #scroller-sponsor-window -->
	    
      </div><!-- #scroller-vertical -->
      <div id="scroller-fade-left"></div>		
      <div id="scroller-fade-right"></div>			
   </div><!-- #scroller-window -->

      <a id="button-previous-reglement" class="button-previous-project " style="display: none; ">Page précédente</a>
      <a id="button-next-reglement" class="button-next-project " style="display: none; ">Page suivante</a>
      
      <a id="button-previous-palmares" class="button-previous-project " style="display: none; ">Page précédente</a>
      <a id="button-next-palmares" class="button-next-project " style="display: none; ">Page suivante</a>
				    
	 </div><!-- #projects -->
	 <div id="gloss-overlay"></div>
   </div><!-- #main -->


</body></html>