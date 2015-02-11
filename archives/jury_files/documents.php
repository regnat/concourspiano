<?php
require_once('utilities/fil.php');
$xml=chargeFichier("fiches.xml");
afficheFichier($xml);
echo <<<END
<div class="tout">
Faire partager une fiche :<br/>
<form action="index.php?action=poster&page=documents" method="post">
<table>
    <tr>
        <td> Titre </td>
        <td> <input type="text" name="titre"> </td>
    </tr><tr>
        <td>Contenu :</td>
        <td><input type="text" name="contenu" /></td>
    </tr><tr>
        <td> Emplacement</td>
        <td><input type="text" name="fiche" /></td>
    </tr>
</table>

<input type="submit" value="Valider" />


</form>

END;


?>
