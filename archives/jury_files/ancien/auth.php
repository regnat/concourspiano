<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Concours de piano Ecole Polytechnique</title>
<link type="text/css" href="index.css" rel="stylesheet" title="index" />
</head>
<?php

mysql_connect("localhost","concoursdepiano","ehjsliu") or die("Erreur de connextion � MySQL");

mysql_select_db("concoursdepiano") or die("Erreur de connexion � la base de donn�es");

 function registrationform($login,$motdepasse){

          $ret="<div style=\"margin :10px;\">
     <form action=\"index.php?title=cas_auth&action=register\" method=\"POST\"
<center>
<b> Formulaire d'inscription </b>
</center>
<br/><br/>
<table> <tr>
    <td>Nom :</td>
    <td><input type=\"text\" name=\"nom\"></td>
</tr> <tr>
    <td>Pr&eacute;nom :</td>
    <td><input type=\"text\" name=\"prenom\"></td>
</tr><tr>
    <td>Email :</td>
    <td><input type=\"text\" name=\"email\"></td>
</tr><tr>
    <td>Ecole ou universit&eacute :</td>
    <td><input type=\"text\" name=\"ecole\"></td>
</tr><tr>
    <td>T&eacute;lephone :</td>
    <td><input type=\"text\" name=\"telephone\"></td>
</tr></table>
<br/>
<table><tr>
    <td>Oeuvre libre choisie pour les quarts de finale :</td>
    <td><input type=\"text\" name=\"oeuvrequart\"></td>
</tr><tr>
    <td>Oeuvre libre choisie pour les demi-finales :</td>
    <td><input type=\"text\" name=\"oeuvredemi\"></td>
</tr>
<tr>
    <td>Concerto choisi pour la finale :</td>
    <td><input type=\"text\" name=\"concerto\"></td>
</tr>
</table>
<br/>
<input type=\"submit\" value=\"Envoyer\">
</form>
</div>";

           return $ret;

        }



       function uploadphoto(){

       	return "<form enctype=\"multipart/form-data\" method=\"post\" action=\"./index.php?title=upload\">

  <input type=\"file\" name=\"fichier_choisi\">

  <br>

  descriptif<input type=\"text\" name=\"descriptif\">

  nom de photo<input type=\"text\" name=\"nomdephoto\">

  <br>

  <input type=\"submit\" value=\"Envoyer le fichier\">



</form>";

       }


        function loginform(){

        $ret="<form action=\"index.php?title=accueil.php\" method=\"POST\">

login<p><input type=\"text\" name=\"login\" valeur=\"\"></p>

mot de passe<p><input type=\"password\" name=\"motdepasse\" valeur=\"\"></p>

<input type=\"submit\" value=\"valider\">

</form>

<p>enregistrez-vous !

<a href=\"essai.php?title=register.html\">enregistrez-vous</a></p>";

          return $ret;

        }



        function changepasswdform(){

        $ret="<form action=\"index.php?title=cas_auth&action=change\" method=\"POST\">

login<input type=\"text\" name=\"login\">

<br>ancien mot de passe<input type=\"text\" name=\"ancien\">

<br>nouveau mot de passe<input type=\"password\" name=\"nouveau\">

<br>confirmez votre mot de passe<input type=\"password\" name=\"confirmation\"><br>

<input type=\"submit\" value=\"CHANGE\">

</form>";

          return $ret;

        }

        function changeinscriptionform($login){

            $q="SELECT*FROM candidats WHERE login='$login'";

            $reponse=mysql_query($q);

            echo "<form action=\"index.php?title=cas_auth&action=update\" method=\"POST\">";

            while($tab=mysql_fetch_assoc($reponse)){

            	$i=0;

            	foreach($tab as $title=> $value){

                 if($i>1&&$i<=8){

                 $m="$title:<input type=\"text\" name=\"$title\" value=\"$value\">";

                 echo $m;
                 echo "<br>";}

                 $i++;}

           }

        echo "<input type=\"submit\" value=\"register\"></form>";

        }

       function changeretatform(){
       	 $res="<form  action=\"index.php?title=cas_auth&action=changeretat\" method=\"POST\">
	        login<input type=\"text\" name=\"login\">
	        <p>mot de passe <input type=\"password\" name=\"motdepasse\"></p>
			<SELECT name=\"etat\">
		<OPTION VALUE=\"encours\">encours</OPTION>
		<OPTION VALUE=\"fini\">fini</OPTION>
	</SELECT><p>
	<INPUT type=\"submit\" value=\"changer son etat d'inscription\">
</form>";
return $res;
       }

        function deleteuserform(){

        $ret="<form action=\"index.php?title=cas_auth&action=delete\" method=\"POST\">

login<input type=\"text\" name=\"login\">

<p>mot de passe <input type=\"password\" name=\"motdepasse\"></p>

<input type=\"submit\" value=\"delete\">

</form>";

          return $ret;

        }

         function h_register($login,$motdepasse,$nom,$prenom,$email,$ecole,$telephone,$oeuvrequart,$oeuvredemi,$concerto){



            if($login==""||$motdepasse==""||$nom==""||$prenom==""||$email==""||$ecole==""||$telephone==""||$oeuvrequart==""||$oeuvredemi==""||$concerto==""){
            	echo "Vous avez laiss&eacute; un champ vide ! ";

            	echo "<br><br><a href=\"index.php?action=accueil&lang=fr\">Retour &agrave; la page d'accueil</a>";

            }



           else if(!isValidUser($login,"")){



           	$q="INSERT INTO candidats(login, motdepasse, nom, prenom, email, ecole, telephone, oeuvrequart, oeuvredemi, etat_inscription, style, Concerto) VALUES('$login','$motdepasse','$nom','$prenom','$email','$ecole','$telephone','$oeuvrequart','$oeuvredemi','','',$concerto)";

           	if (mysql_query($q))

            echo "Inscription enregistr&eacute;e ! N'oubliez pas d'envoyer le ch&egrave;que d'inscription de 50 euros pour finaliser votre inscription !<br/><br/>";
            else echo("Inscription ratée");
            $_SESSION['logged']="logged";

            setSESSION($login);

            echo isset($_SESSION['nom']);

            echo "<a href=\"index.php?title=accueil&lang=fr\">retour &agrave; la page d'accueil</a>";

           }

        }



      function update($_POST){
      	$login=$_SESSION['login'];

      	$q="UPDATE candidats SET ";

        $i=0;

        foreach($_POST as $title=>$value){

	       if($i>0) $q=$q.", ";

	        $q=$q."$title='$value'";

	        $i++;

        }

       $q=$q." WHERE login='$login'";

       mysql_query($q);

       setSESSION($login);

       echo "succ&egrave;s d'enregistrement";

       echo "<a href=\"index.php\">retourner &agrave; la page pr&eacute;c&eacute;dente</a>";

      }



       function setSESSION($login){

       	$q="SELECT*FROM candidats WHERE login='$login'";

 	        $reponse=mysql_query($q);

 	        while($tab=mysql_fetch_assoc($reponse)){

 	        foreach($tab as $title => $value){

 		      $_SESSION[$title]=$value;



 	}}

       }



        function h_login($username, $password){

        	if(isValidUser($username,$password)) echo "Vous &ecirc;tes identifi&eacute;";

            else echo "erreur dans le login ou le mot de passe";

        }



        function h_changepasswd($username, $oldpassword,$password1, $password2){
              if($username==""||$oldpassword==""||$password1=="") echo " Vous avez laiss&eacute; un champ vide !";
              else{
              if(isValidUser($username,$oldpassword)) {

              	if($password1==$password2){

              		$q="UPDATE candidats SET motdepasse='$password1' WHERE login='$username'";

              		mysql_query($q);

              		echo "changement de mot de passe effectu&eacute;";

              		$_SESSION['logged']="logged";

              		setSESSION($username);

              		echo "<a href=\"index.php\">retour &agrave; la page d'accueil</a>";

              	}

              	else {echo "confirmation echec!";

              	echo "<a href=\"index.php\">retour &agrave; la page pr&eacute;c&eacute;dente</a>";}

              }

            else {echo "erreur dans le login ou le mot de passe";

            echo "<a href=\"index.php\">retour &agrave; la page pr&eacute;c&eacute;dente</a>";}}

        }



        function h_deleteuser($username, $password){

                if($_SESSION['login']=="admin"&&$username=="admin"&&isValidUser($username,$password)) {
                    $delete=$_SESSION['delete'];
                	$q="DELETE FROM candidats WHERE login='$delete'";
                    mysql_query($q);
                    echo "Delete successful";

                }

            else echo "Vous n'avez pas le droit de supprimer ce candidat !";

        }

    function h_changeretat($username, $password, $etat){

                if($_SESSION['login']=="admin"&&$username=="admin"&&isValidUser($username,$password)) {
                    $change=$_SESSION['changeretat'];
                    $q="UPDATE candidats SET etat_inscription='$etat' WHERE login='$change'";
                    mysql_query($q);
                    echo "succ&egrave;s de changement d'etat.";

                }

            else echo "Vous n'avez pas le droit de changer l'&eacute;tat d'inscription de ce candidat !";

        }


     function isValidUser($username, $passwd){

     	if($username!=""&&$passwd==""){

     		$query="SELECT*FROM candidats WHERE login='$username'";

     		$reponse=mysql_query($query);

     		$a=mysql_num_rows($reponse);

     		if($a==1) return true;

     		else return false;

     	}

     	else if($username!=""&&$passwd!=""){

     		$query="SELECT*FROM candidats WHERE login='$username' AND motdepasse='$passwd'";



     		$reponse=mysql_query($query);

            $a=mysql_num_rows($reponse);

     		if($a==1) return true;

     		else return false;

     	}

     	else return false;

     }

    function envoi_mail($to) {
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
<body>
</body>
</html>


