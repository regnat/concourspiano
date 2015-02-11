<?php
require_once('utilities/head.php');
function verifie($page){
    $tab=simplexml_load_file('root.xml');
    foreach($tab->page as $value){
        if($page==$value) return;
    }
    header("Location: index.php?page=accueil");
    
}
verifie($_GET['page']);
require_once('utilities/auth.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
      "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <link rel="stylesheet" href="forme.css"/>
        <link rel="alternate" type="application/rss+xml" title="Fil RSS" href="fiches.xml"/>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Accueil</title>
    </head>
    <body>
    <?php 
        
       
        if ($_SESSION['loggedin']) {
        print_bonjour($_SESSION['prenom'],$_SESSION['nom']);
        print_squelette_enregistre($_GET['page'].".php",'forme.css');
        }
        else {
            print_register();
            print_squelette($_GET['page'].".php",'forme.css');
        }



      

?>
    </body>
</html>
