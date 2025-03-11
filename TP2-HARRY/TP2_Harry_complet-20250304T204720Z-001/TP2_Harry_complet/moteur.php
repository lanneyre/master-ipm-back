<?php

// on récupère le nom du personnage passé via le paramètre "name" de la page.
// si le paramètre n'est pas indiqué, on met une chaine vide dans personnage.
$personnage = isset($_GET['nom']) ? $_GET['nom'] : '';

if (!empty($personnage))
{
    //echo "<p>Bonjour <strong>" . htmlspecialchars($personnage) . "</strong> !</p>";

    // si le personnage est Molly, on affiche l'horloge
    if ($personnage == "Molly")
    {
        //echo "on affiche la page lire_horloge";
        include("lire_horloge.php");
    }
    else
    {
        // sinon, on affiche la page d'envoi de position
        //echo "on affiche la page ecrire_horloge";
        include("ecrire_horloge.php");
    }
}
else
{
    // le paramètre personnage n'est pas renseigné, on affiche la page de connexion
    include("connexion.php");
}

?>