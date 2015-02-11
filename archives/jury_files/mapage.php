<?php
$oeuvrequart=$_SESSION['oeuvrequart'];
$oeuvredemi=$_SESSION['oeuvredemi'];
$concerto=$_SESSION['Concerto'];
echo<<<END
<div style="margin:10px">
Oeuvre libre choisie pour les quarts de finale : $oeuvrequart
<br/>

Oeuvre libre choisie pour les demi-finales : $oeuvredemi
<br/>
Concerto choisi pour la finale : $concerto
<br/>


</div>


END;
?>
   