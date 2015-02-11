<?php
echo<<<END
<div class="tout">
Pour contacter le président du binet :
<form action="index.php?page=contact&action=envoi" method="post">
<table>
    <tr>
        <td>Votre e-mail</td>
        <td><input type="text" name="adresse">
    </tr><tr>
        <td>Objet</td>
        <td><input type="text" name="objet"></td>
    </tr><tr>
        <td> Votre message :</td>
        <td><textarea rows="5" cols="50" name="corps" ></textarea></td>
    </tr>
</table>
<input type="submit" value="Envoyer" />
</form>
</div>
END;


?>
