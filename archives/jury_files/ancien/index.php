<?php
session_start();
if($_GET['action']=='quitter')
{$_SESSION=array();
session_destroy();}
?>
<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Concours de piano Ecole Polytechnique</title>


<?php
if(isset($_GET['style'])&&$_GET['style']!=""){
	$_SESSION['style']=$_GET['style'];
	$style=$_GET['style'];
}
else if(!isset($_SESSION['style'])||$_SESSION['style']=="")
$style="classique";
else $style=$_SESSION['style'];
$style=$style.".css";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$style\" title=\"index\"/>";
?>

</head>
<body>
<div class="conteneur">
<div class="titre">
<center>Concours national de piano amateur</center>
<center>de l'Ecole Polytechnique</center>
</div>
<div class="menu">
<?php
if(isset($_GET['lang'])){
	$lang=$_GET['lang'];
	include("menu_".$lang.".html");
}
else include("menu_fr.html");
?>
</div>

<div class="contenu">
<?php
$lang="fr";
include ("affichage.php");
?>
</div>
</div>
</body>
</html>
