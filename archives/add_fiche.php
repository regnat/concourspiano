<?php
require_once("utilities/fil.php");
function inserefiche () {
    $auteur=$_SESSION['login'];
    $date=time();
    $titre=htmlspecialchars($_POST['titre'],ENT_QUOTES);
    $contenu=htmlspecialchars($_POST['contenu'],ENT_QUOTES);
    $fichier=htmlspecialchars($_POST['fiche'],ENT_QUOTES);
    $xml=chargeFichier("fiches.xml");
    $xmll=ajouteNews($xml,$titre,$date,$fichier,$contenu);
    sauveFichier("fiches.xml",$xmll);
}

?>
