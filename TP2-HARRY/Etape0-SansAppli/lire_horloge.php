<!DOCTYPE html>
<html>

<head>
    <title>ecrire le lieu </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>
    <?php
    error_reporting(E_ALL ^ E_NOTICE); //c'est pour enlever les warning!
    $monFichier = @fopen("gps.txt", "r"); //ouverture en lecture
    $lieu = fgets($monFichier, 4096);
    fclose($monFichier);
    date_default_timezone_set('Europe/Paris');
    echo "<p> Ron est " . $lieu . " mise à jour de la connexion le " . date("d M Y, G : i", filemtime("gps.txt"));
    ?>
</body>

</html>