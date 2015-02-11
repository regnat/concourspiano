<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Insert title here</title>
<link type="text/css" href="index.css" rel="stylesheet" title="index" />
</head>

<?php

mysql_connect("localhost","concoursdepiano","ehjsliu") or die("Erreur de connextion a MySQL");

mysql_select_db("concoursdepiano") or die("Erreur de connexion a la base de donnees");

 function registrationform($login,$motdepasse){

          $ret="<form action=\"index.php?title=cas_auth&action=register&lang=ch\" method=\"POST\"
<center><br>
<b> 注册表格</b> <br><br>
姓:　<input type=\"text\" name=\"nom\">

<br>

名:　<input type=\"text\" name=\"prenom\">

<br>

电子邮箱:　<input type=\"text\" name=\"email\">

<br>

学校名称：　<input type=\"text\" name=\"ecole\">

<br>

电话:　<input type=\"text\" name=\"telephone\"><br>

四分之一决赛曲目：　<input type=\"text\" name=\"oeuvrequart\"><br>

半决赛曲目：　<input type=\"text\" name=\"oeuvredemi\"><br>
<br>

<input type=\"submit\" value=\"提交\">
</center>
</form>";
$ret=utf8_encode($ret);
           echo $ret;

        }



       function uploadphoto(){

       	return "<form enctype=\"multipart/form-data\" method=\"post\" action=\"./index.php?title=upload&lang=ch\">

  <input type=\"file\" name=\"fichier_choisi\">

  <br>

  描述<input type=\"text\" name=\"descriptif\">

  照片名称<input type=\"text\" name=\"nomdephoto\">

  <br>

  <input type=\"submit\" value=\"上传\">



</form>";

       }

        function loginform(){

        $ret="<form action=\"index.php?title=accueil.php&lang=ch\" method=\"POST\">

用户名<p><input type=\"text\" name=\"login\" valeur=\"\"></p>

密码<p><input type=\"password\" name=\"motdepasse\" valeur=\"\"></p>

<input type=\"submit\" value=\"登录\">

</form>

<p>马上注册！

<a href=\"essai.php?title=register.html\">马上注册</a></p>";

          return $ret;

        }



        function changepasswdform(){

        $ret="<form action=\"index.php?title=cas_auth&action=change&lang=ch\" method=\"POST\">

用户名<input type=\"text\" name=\"login\">

<br>旧密码<input type=\"text\" name=\"ancien\">

<br>新密码<input type=\"password\" name=\"nouveau\">

<br>新密码确认<input type=\"password\" name=\"confirmation\"><br>

<input type=\"submit\" value=\"修改密码\">

</form>";

          return $ret;

        }

        function changeinscriptionform($login){

            $q="SELECT*FROM candidats WHERE login='$login'";

            $reponse=mysql_query($q);

            echo "<form action=\"index.php?title=cas_auth&action=update&lang=ch\" method=\"POST\">";

            while($tab=mysql_fetch_assoc($reponse)){

            	$i=0;

            	foreach($tab as $title=> $value){

                 if($i>1&&$i<=8){

                 $m="$title:<input type=\"text\" name=\"$title\" value=\"$value\">";

                 echo $m;
                 echo "<br>";}

                 $i++;}

           }

        echo "<input type=\"submit\" value=\"确认\"></form>";

        }

       function changeretatform(){
       	 $res="<form  action=\"index.php?title=cas_auth&action=changeretat&lang=ch\" method=\"POST\">
	        用户名<input type=\"text\" name=\"login\">
	        <p>密码<input type=\"password\" name=\"motdepasse\"></p>
			<SELECT name=\"注册状态\">
		<OPTION VALUE=\"进行中\">encours</OPTION>
		<OPTION VALUE=\"已完成\">fini</OPTION>
	</SELECT><p>
	<INPUT type=\"submit\" value=\"修改注册状态\">
</form>";
return $res;
       }

        function deleteuserform(){

        $ret="<form action=\"index.php?title=cas_auth&action=delete&lang=ch\" method=\"POST\">

用户名<input type=\"text\" name=\"login\">

<p>密码<input type=\"password\" name=\"motdepasse\"></p>

<input type=\"submit\" value=\"删除\">

</form>";

          return $ret;

        }

         function h_register($login,$motdepasse,$nom,$prenom,$email,$ecole,$telephone,$oeuvrequart,$oeuvredemi){



            if($login==""||$motdepasse==""||$nom==""||$prenom==""||$email==""||$ecole==""||$telephone==""||$oeuvrequart==""||$oeuvredemi==""){
            	echo "有未填项! ";

            	echo "<br><br><a href=\"index.php?action=accueil&lang=ch\">回首页</a>";

            }



           else if(!isValidUser($login,"")){



           	$q="INSERT INTO candidats VALUES('$login','$motdepasse','$nom','$prenom','$email','$ecole','$telephone','$oeuvres','','')";

           	mysql_query($q);

            echo "注册成功";

            $_SESSION['logged']="logged";

            setSESSION($login);

            echo isset($_SESSION['nom']);

            echo "<a href=\"index.php?title=accueil&lang=ch\">回首页</a>";

           }

        }



      function update(){

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

       echo "注册成功";

       echo "<a href=\"index.php?lang=ch\">回首页</a>";

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

        	if(isValidUser($username,$password)) echo "Vous etes identifie!";

            else echo "mauvais mot de pass ou login!";

        }



        function h_changepasswd($username, $oldpassword,$password1, $password2){
              if($username==""||$oldpassword==""||$password1=="") echo " 有未填项!";
              else{
              if(isValidUser($username,$oldpassword)) {

              	if($password1==$password2){

              		$q="UPDATE candidats SET motdepasse='$password1' WHERE login='$username'";

              		mysql_query($q);

              		echo "修改密码成功!";

              		$_SESSION['logged']="logged";

              		setSESSION($username);

              		echo "<a href=\"index.php?lang=ch\">回首页</a>";

              	}

              	else {echo "密码确认失败!";

              	echo "<a href=\"index.phplang=ch\">回首页</a>";}

              }

            else {echo "用户名或密码错误!";

            echo "<a href=\"index.php?lang=ch\">回首页</a>";}}

        }



        function h_deleteuser($username, $password){

                if($_SESSION['login']=="admin"&&$username=="admin"&&isValidUser($username,$password)) {
                    $delete=$_SESSION['delete'];
                	$q="DELETE FROM candidats WHERE login='$delete'";
                    mysql_query($q);
                    echo "删除成功";

                }

            else echo "您没有权利删除此用户!";

        }

    function h_changeretat($username, $password, $etat){

                if($_SESSION['login']=="admin"&&$username=="admin"&&isValidUser($username,$password)) {
                    $change=$_SESSION['changeretat'];
                    $q="UPDATE candidats SET etat_inscription='$etat' WHERE login='$change'";
                    mysql_query($q);
                    echo "修改注册状态成功.";

                }

            else echo "您没有权利修改次用户的注册状态";

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
?>
<body>
</body>
</html>
