<?php

/*

 * Created on 2008-2-21

 *

 * To change the template for this generated file go to

 * Window - Preferences - PHPeclipse - PHP - Code Templates

 */

 session_start();

 require("auth.php");

 $q=$_GET['action'];

switch ($q){

	case "":

	break;

	case "login":

	             $username=$_POST['login'];

	             $password=$_POST['motdepasse'];

	h_login($username, $password);

	break;

	case "change":

	$username=$_POST['login'];

	$oldpassword=$_POST['ancien'];

	$password1=$_POST['nouveau'];

	$password2=$_POST['confirmation'];

	h_changepasswd($username, $oldpassword, $password1, $password2);

	break;

	case "delete":

	$username=$_POST['login'];

	$password=$_POST['motdepasse'];

	h_deleteuser($username, $password);

	break;

	case "register":
	$login=$_SESSION['login'];
	$password=$_SESSION['motdepasse'];
	$nom=$_POST['nom'];
	$email=$_POST['email'];
	$prenom=$_POST['prenom'];
	$ecole=$_POST['ecole'];
	$telephone=$_POST['telephone'];
	$oeuvrequart=$_POST['oeuvrequart'];
	$oeuvredemi=$_POST['oeuvredemi'];
    $concerto=$_POST['concerto'];


	h_register($login, $password, $nom,$prenom, $email,$ecole,$telephone,$oeuvrequart,$oeuvredemi,$concerto);

	break;

	case "update":update();break;

    case "envoi"; $to=$_POST['destinataire'];
        if ($to==4) envoi_mail('ghigrange@free.fr');break;

	default: echo "ERREUR";
	break;



}

?>

