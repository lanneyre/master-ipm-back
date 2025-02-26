<!DOCTYPE html>
<html>

<head>
    <title>ecrire le lieu </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>
    <?php
    $lieu = $_GET["lieu"];
    $monFichier = fopen("gps.txt", "w");
    fwrite($monFichier, $lieu);
    fclose($monFichier);
    echo "<p> Ron est " . $lieu . ".";
    ?>
</body>

</html>