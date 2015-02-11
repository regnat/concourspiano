<?php

function print_register(){
    echo(loginform());
}

function print_bonjour($prenom,$nom)
{
    
    echo('<div><div class="fond"> Bonjour    '.$prenom.' '.$nom);
    echo <<<END
    <a href="index.php?page=accueil&action=deconnect">Déconnexion</a>
    <a href="index.php?page=changepasswd">Changer mon mot de passe</a>
    <a href="index.php?page=deleteuser">Se désinscrire</a>
    </div>
END;
}

function print_squelette($page,$chemin_css)
{
echo<<<END
        <div  class="fond"><div><div style="float:left">
                <img src="polyt.jpg" alt="texte alternatif" height="40px"/>
                </div>
                <div style="background-color:#2371CD; line-height:40px">
                <h1>
                Concours de piano de l'Ecole Polytechnique
                </h1>
                </div>
            </div>
            <div>
                <div class="menu">

                <div class="casemenu"><a href="index.php?page=accueil">Accueil</a></div>
                <div class="casemenu"><a href="index.php?page=presentation">Présentation</a></div>
                <div class="casemenu"><a href="index.php?page=inscription">S'inscrire</a></div>
                <div class="casemenu"><a href="index.php?page=programmemusical">Programme musical</a></div>
                <div class="casemenu"><a href="index.php?page=calendrier">Calendrier</a></div>
                <div class="casemenu"><a href="index.php?page=reglement">Réglement</a></div>
                <div class="casemenu"><a href="index.php?page=resultats">Résultats</a></div>
                <div class="casemenu"><a href="index.php?page=contact">Contact</a></div>
                <div class="casemenu"><a href="index.php?page=liens">Liens</a></div>
                <div class="casemenu"><a href="index.php?page=sponsors">Sponsors</a></div>
             </div>

               <div style="margin-left:150px;">
END;
    require_once($page);
echo "</div></div>";
}

function print_squelette_enregistre($page,$chemin_css)
{
echo<<<END
        <div  class="fond"><div><div style="float:left">
                <img src="polyt.jpg" alt="texte alternatif" height="40px"/>
                </div>
                <div style="background-color:#2371CD; line-height:40px">
                <h1>
                Concours de piano de l'Ecole Polytechnique
                </h1>
                </div>
            </div>
            <div>
                <div class="menu">

                <div class="casemenu"><a href="index.php?page=accueil">Accueil</a></div>
                <div class="casemenu"><a href="index.php?page=presentation">Présentation</a></div>
                <div class="casemenu"><a href="index.php?page=mapage">Mon inscription</a></div>
                <div class="casemenu"><a href="index.php?page=programmemusical">Programme musical</a></div>
                <div class="casemenu"><a href="index.php?page=calendrier">Calendrier</a></div>
                <div class="casemenu"><a href="index.php?page=reglement">Règlement</a></div>
                <div class="casemenu"><a href="index.php?page=resultats">Résultats</a></div>
                <div class="casemenu"><a href="index.php?page=contact">Contact</a></div>
                <div class="casemenu"><a href="index.php?page=liens">Liens</a></div>
                <div class="casemenu"><a href="index.php?page=sponsors">Sponsors</a></div>


             </div>

               <div style="margin-left:150px;">
END;


require_once($page);
echo "</div></div>";
}


?>
