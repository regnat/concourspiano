<?php
function envoi_mail() {
    $to="zephhh@gmail.com";
    $subject=$_POST['objet'];
    $message=$_POST['corps'];
    $entete="From: ".$_POST['adresse'];
    $m=mail($to,$subject,$message,$entete);
    if ($m)
        echo("Message bien envoyé");
     else
        echo("Erreur : message non envoyé");
}

?>
