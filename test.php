<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Page de Test PHP</title>
</head>

<body bgcolor="#BED398">
    <?php
    //setlocale(LC_CTYPE, 'fr_FR.UTF8');
    $nom = "Leblond";
    $prenom = "Marina";
    $nomComplet = $prenom . " " . $nom;
    echo "Bonjour " . strtoupper($nom) . mb_strtolower($prenom, 'UTF-8') . "<br />";

    echo "Bonjour " . $nomComplet;
    echo "Le nom complet comporte " . strlen($nomComplet) . " caractères.";
    ?>
</body>

</html>