<?php
session_start();
require_once('add_fiche.php');
require_once('utilities/mail.php');
$action = $_GET['action'];
switch($action){
    case "login":login();break;
    case "register":register();break;
    case "changepasswd":changepasswd();break;
    case "deleteuser":deleteuser();break;
    case "deconnect": deconnexion();break;
    case "poster" : inserefiche();break;
    case "envoi" : envoi_mail();break;
    default:break;
}




        function registrationform(){
            $ret='<div class="registrationForm">
            <form action="index.php?page=accueil&action=register" method="post" enctype="multipart/form-data">
            <table>
            <tr>
                <td>Login :</td>
                <td><input type="text" name="login" /></td>
            </tr><tr>
                <td>Mot de passe :</td>
                <td><input type="password" name="mdp1" /></td>
            </tr><tr>
                <td>Confirmation du mot de passe :</td>
                <td><input type="password" name="mdp2" /></td>
            </tr><tr>
                <td>Nom :</td>
                <td><input type="text" name="nom" /></td>
            </tr><tr>
                <td>Prénom :</td>
                <td><input type="text" name="prenom" /></td>
            </tr><tr>
                <td>Adresse de courrier électronique :</td>
                <td><input type="text" name="email" /></td>
            </tr><tr>
                <td>Ecole :</td>
                <td><input type="text" name="ecole" /></td>
            </tr><tr>
                <td> Numéro de téléphone :</td>
                <td><input type="text" name="telephone" /></td>
            </tr><tr>
                <td> Oeuvre libre choisie pour les quarts de finale :</td>
                <td><input type="text" name="oeuvrequart" /></td>
            </tr><tr>
                <td> Oeuvre choisie pour les demi-finales :</td>
                <td><input type="text" name="oeuvredemi" /></td>
            </tr><tr>
                <td> Concerto choisi pour la finale :</td>
                <td><input type="text" name="concerto" /></td>
            </tr>
            </table>
            <input type="submit" value="Valider" /></p>
            </form>
            </div>';
           return $ret;
        }

        function loginform(){
          $ret=
          '<div class="loginForm">
            <form action="index.php?page=accueil&action=login" method="POST">
            Login :
            <input name="pseudo" type="text" size="30" maxlength="30">
            Mot de passe :
            <input name="password" type="password" size="30" maxlength="30">
            <input type="submit" value="Log">
            <a href="index.php?page=inscription">S\'inscrire</a>
            <input type="hidden" name="page" value="accueil">
            </form>
        </div>';
          return $ret;
        }

        function changepasswdform(){
        $ret= "<div class=\"changepasswdForm\">
         <form action=\"?page=accueil&action=changepasswd\" method=\"POST\">
         <table> <tr>
            <td> Login :</td>
            <td><input name=\"login\" type=\"text\" /></td>
         </tr><tr>
            <td>Ancien mot de passe :</td>
            <td><input name=\"ancienpwd\" type=\"password\" /></td>
         </tr><tr>
            <td>Nouveau mot de passe :</td>
             <td><input name=\"nouveaupwd\" type=\"password\" /></td>
         </tr><tr>
            <td>Confirmer le mot de passe :</td>
            <td><input name=\"confpwd\" type=\"password\" /></td>
         </tr>
         </table>
         <input type=\"submit\" value=\"Valider\" />
         <input type=\"hidden\" name=\"action\" value=\"changer_mdp\"/>
         </form></div>";
          return $ret;
        }

        function deleteuserform(){
          $ret="<div class=\"deleteuserForm\">
            <form action=\"?page=accueil&action=deleteuser\" method=\"POST\">
            <table>
            <tr>
                <td>Login :</td>
                <td><input name=\"pseudo\" type=\"text\" size=\"30\" maxlength=\"30\"></td>
            </tr>
            <tr>
                <td>Mot de passe :</td>
                <td><input name=\"password\" type=\"password\" size=\"30\" maxlength=\"30\"></td>
            </tr>
            </table>
            <input type=\"submit\" value=\"Se désinscrire\"></p>

            </form>
        </div>";
          return $ret;
        }


        function register(){
            $login=htmlspecialchars($_POST['login'],ENT_QUOTES);
            $mdp1=$_POST['mdp1'];
            $mdp2=$_POST['mdp2'];
            $nom=$_POST['nom'];
            $prenom=$_POST['prenom'];
            $email=$_POST['email'];
            $ecole=$_POST['ecole'];
            $telephone=$_POST['telephone'];
            $oeuvrequart=$_POST['oeuvrequart'];
            $oeuvredemi=$_POST['oeuvredemi'];
            $concerto=$_POST['concerto'];
            $reg=h_register($login,$mdp1,$mdp2,$nom,$prenom,$email,$ecole,$telephone,$oeuvrequart,$oeuvredemi,$concerto);
            if (!$reg) echo("L'inscription a échoué");
            else echo("Inscription réussie <br/> <b> N'oubliez pas d'envoyer le chèque d'inscription de 50 euros </b><br/>");

        }

            function login(){
                $username=htmlspecialchars($_POST['pseudo'],ENT_QUOTES);
                $password=$_POST['password'];
                $_SESSION['loggedin']= h_login($username,$password);
                $_SESSION['login']=$username;
                if (h_login($username, $password)) {
                $query=mysql_query("SELECT*  FROM `candidats` WHERE `login`='$username'");
                $tab=mysql_fetch_assoc($query);
                $_SESSION['prenom']=$tab['prenom'];
                $_SESSION['nom']=$tab['nom'];
                $_SESSION['oeuvrequart']=$tab['oeuvrequart'];
                $_SESSION['oeuvredemi']=$tab['oeuvredemi'];
                $_SESSION['Concerto']=$tab['Concerto'];
                }
                $n=strpos(currPageURL(),'&');
                $url=substr(currPageURL(),0,$n);
                header("Location: $url");
        }

        function currPageURL() {
             $pageURL = 'http';
             if ($_SERVER["HTTPS"] == "on") {
                 $pageURL .= "s";
             }
             $pageURL .= "://";
                if ($_SERVER["SERVER_PORT"] != "80") {
                        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
                } else {
                        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
                }
                return $pageURL;
        }


        function changepasswd(){
            $login=$_POST['login'];
            $mdp=$_POST['ancienpwd'];
            $passwd1=$_POST['nouveaupwd'];
            $passwd2=$_POST['confpwd'];
            if (h_changepasswd($login,$mdp,$passwd1,$passwd2))
            echo("Mot de passe changé");
            else ("Echec au changement de mot de passe");
        }

        function deleteuser(){
            $login=$_POST['pseudo'];
            $mdp=$_POST['password'];
            h_deleteuser($login,$mdp);
            deconnexion();
        }

        function connect() {
           mysql_connect("localhost","concoursdepiano","ehjsliu") or die("Erreur de connextion à MySQL");
           mysql_select_db("concoursdepiano") or die("Erreur de connexion à la base de données");
        }
        function isValidUser($username, $password){
            connect();
            if ($username!="" && $password==""){
            $req=mysql_query("SELECT*  FROM `candidats` WHERE `login` = '$username'");
            return (mysql_affected_rows()==1);
            }
            if ($username!="" && $password!=""){
            $req=mysql_query("SELECT candidats.motdepasse  FROM `candidats` WHERE `login` = \"$username\"");
            $mdp = mysql_fetch_array($req);
            $mdp = $mdp[0];
            return (mysql_num_rows($req)==1 && $mdp==SHA1($password)); }
            return false;

        }


        function h_register($username,$password1,$password2,$nom,$prenom,$email,$ecole,$telephone,$oeuvrequart,$oeuvredemi,$concerto){
       connect();
        $req=mysql_query("SELECT*  FROM `candidats` WHERE `login` = '$username'");
        if (mysql_num_rows($req)!=0) return false;
        if ($password1!=$password2) return false;
        $password=SHA1($password1);
        //echo $_FILES['avatar']['tmp_name'];
       // echo "foo";
       //if (!empty($_FILES['avatar']['tmp_name'])&&
         //   is_uploaded_file($_FILES['avatar']['tmp_name'])){
                // Le fichier a bien ete telecharge
    // Par securite on utilise getimagesize plutot que les variables $_FILES
    //list($larg,$haut,$type,$attr) = getimagesize($_FILES['avatar']['tmp_name']);
    //echo $larg." ".$haut." ".$type." ".$attr;
    // JPEG => type=2
    //if ($type == 2) {
    //$chemin = "/xampp/htdocs/avatars/name_$username.jpg";
    //if (move_uploaded_file($_FILES['avatar']['tmp_name'],"$chemin")) {
     //   echo "Copie réussie<br/>";
    //    echo "<img src='tmp_name.jpg'/>";
    //}
   // else {
     //   echo "Echec de la copie<br/>";}}
// else echo "Mauvais type de fichier<br/>";}
        $query = mysql_query("INSERT INTO candidats VALUES
('$username','$password','$nom','$prenom','$email','$ecole','$telephone','$oeuvrequart','$oeuvredemi','','','$concerto')");
        if (mysql_affected_rows()!=1) return false;
        mysql_close();
        return true;
            }

        function h_login($username, $password){
            return isValidUser($username,$password);

        }

        function h_changepasswd($username, $oldpassword, $password1, $password2){
        connect();
        if (!isValidUser($username,$oldpassword)) return false;
        if ($password1!=$password2) return false;
        $password=SHA1($password1);
        $query=mysql_query("UPDATE `concoursdepiano`.`candidats` SET `mdp` = '$password' WHERE `candidats`.`login` = '$username'");
        if (mysql_affected_rows()!=1) return false;
            return true;
   }

        function h_deleteuser($username, $password){
            $val=isValidUser($username,$password);
            if (!$val) return false;
            $query = mysql_query("DELETE FROM candidats WHERE `login`='$username'");
            if (mysql_affected_rows()!=1) return false;
            return true;
        }

        function deconnexion(){
            session_unset();
            session_destroy();
            $n=strpos(currPageURL(),'&');
            $url=substr(currPageURL(),0,$n);
            header("Location: $url");
        }


?>

