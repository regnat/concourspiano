<?php
if(isset($_GET['style'])){
	$_SESSION['style']=$_GET['style'];
	$style=$_GET['style'];
}
else if(!isset($_SESSION['style']))
$style="classique";
else $style=$_SESSION['style'];
$style=$style.".css";
echo $style;
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"$style\" title=\"index\"/>";

?>
