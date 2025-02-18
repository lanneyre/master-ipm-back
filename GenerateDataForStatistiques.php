<?php
function genererPseudo($caracteres = 5, $type = 1)
{

    //le mot final sera composé par des consonnes et voyelles, afin de faire un nom lisible on mettra des consonnes puis des voyelles, puis deux voyelles (aléatoirement) puis une consonne, etc...)

    //lettres qui vont être utilisées
    //le type 1 comporte toutes les lettres de l'alphabet
    if ($type == 1) {

        $Consonnes = ['qu', 'b', 'c', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w', 'x', 'z'];
        $Voyelles = ['a', 'e', 'i', 'o', 'u', 'y'];

        //le type 2 comporte des lettres en moins : j, x, z, y pour un consonance moins asiatique
    } elseif ($type == 2) {

        $Consonnes = ['qu', 'b', 'c', 'd', 'f', 'g', 'h', 'k', 'l', 'm', 'n', 'p', 'r', 's', 't', 'v', 'w'];
        $Voyelles = ['a', 'e', 'i', 'o', 'u'];

        //pour les deux types suivants, il est évident que le nombre de caractère sera plus élevé car à la place d'une lettre on à jusqu'à trois lettre ensemble
        //le type 3 contient des portions de noms viking, afin d'en composer un nouveau
    } elseif ($type == 3) {

        $Consonnes = ['alb', 'alr', 'are', 'ast', 'axe', 'axi', 'ber', 'bjo', 'bre', 'bri', 'bru', 'cyb', 'dag', 'dav', 'eli', 'els', 'elv', 'eri', 'ery', 'fre', 'gal', 'ger', 'gre', 'gud', 'gun', 'gus', 'har', 'hed', 'hel', 'hil', 'ing', 'jan', 'jen', 'jor', 'kar', 'kri', 'lar', 'lei', 'len', 'loa', 'lud', 'vig', 'lyn', 'mai', 'man', 'mar', 'mat', 'my', 'nik', 'nil', 'nis', 'odi', 'ola', 'osc', 'rol', 'san', 'sig', 'smi', 'sol', 'sor', 'sve', 'swa', 'tho', 'tyr', 'ulr', 'urs', 'val', 'van', 'yor'];
        $Voyelles = ['ick', 'ik', 'en', 'id', 'el', 'il', 'da', 'it', 'ta', 'de', 'er', 'le', 'ar', 'in', 'sa', 'ka', 'ic', 'is', 'on', 'ya', 'ja', 'rd', 'ld', 'go', 'rg', 'ge', 'na', 'of', 'an', 'rt', 'aé', 'if', 'oa', 'ki', 'va', 'ig', 'ed', 'ny', 'my', 'as', 'ey', 'nn', 'or', 'ra'];

        //le type 4 contient des préfixes de mots à la places des consonnes, on dirait des noms de médicament
    } elseif ($type == 4) {

        $Consonnes = ['en', 'em', 'in', 'im', 'ex', 'mi', 'sub', 're', 'ac', 'af', 'al', 'ap', 'co', 'de', 'ex'];
        $Voyelles = $Consonnes;
    }

    //lettres qu'on ne veut pas deux fois de suite
    $pasDeuxFois = ['x', 'w', 'v', 'h', 'i', 'u', 'y'];

    //on compte combien il y a de consonnes
    $NbrDeConsonnes = count($Consonnes) - 1;

    //on compte combien il y a de voyelles
    // On génère le pseudo
    $NbrDeVoyelles = count($Voyelles) - 1;

    //on initialise notre variable pseudo, on viendra y rajouter caractère par caractère pour le construire
    $pseudo = '';

    //on commence par mettre une consonne
    $mettre = 'consonne';

    //au bout de deux voyelles maximum on repassera à consonne
    $compter_voyelle = 0;

    for ($i = 0; $i <= $caracteres - 1; $i++) {

        if ($mettre == 'consonne') {

            //on vérifie que ça termine pas par "qu"
            do {

                $caractere = $Consonnes[rand(0, $NbrDeConsonnes)];
            } while ($caractere == 'qu' and ($i + 1) == $caracteres);

            //on compte deux caractères au lieu d'un pour "qu"
            if ($caractere == 'qu')
                $i++;

            //on repasse à voyelle
            $mettre = 'voyelle';

            //on choisi une consonne aléatoirement
            $pseudo .= $caractere;
        } elseif ($mettre == 'voyelle') {

            //on vérifie si le nouveau caractères utilisé n'est pas un qui est interdit à la suite, dans $pasDeuxFois
            do {

                $caractere = $Voyelles[rand(0, $NbrDeVoyelles)];
            } while ((substr($pseudo, -1) == $caractere) and in_array(substr($pseudo, -1), $pasDeuxFois));

            //c'est un caractère autorisé, on l'ajoute au pseudo
            $pseudo .= $caractere;

            //si on arrive à un maximum de 2 voyelles à la suite, on passe au consonne
            if ($compter_voyelle == 2) {

                $mettre = 'consonne';
                //on passe à la prochaine itération (soit ; une consonne)
                continue;
            }

            //une chance sur deux de passer à consonne
            if (rand(1, 2) == 1)
                $mettre = 'consonne';

            //sinon on compte les voyelles pour qu'à la deuxième maximum on repasse à consonne
            $compter_voyelle += 1;
        }
    }
    return $pseudo;
}

$nb = random_int(15, 30);


$resultats = [];

for ($i = 0; $i < $nb; $i++) {
    # code...
    $nbcaracNom = random_int(4, 10);
    $dateA = mktime(random_int(0, 23), random_int(0, 59), random_int(0, 59), random_int(0, 11), random_int(0, 31), random_int(2023, 2025));
    $resultats[] = ["nom" => genererPseudo($nbcaracNom, random_int(1, 4)), "score" => random_int(0, 10), "total" => 10, "date" => (new DateTime(date("Y-m-d H:i:s", $dateA), new DateTimeZone("Europe/Paris")))->format("Y-m-d H:i:s")];
}


echo json_encode($resultats);
