<!DOCTYPE html>
<html>

<head>
    <title>ecrire le lieu </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>
    <?php

    $file = "users.json";
    $lieu = $_GET["lieu"];
    $id = $_GET["user"];
    if (is_file($file)) {
        $users = json_decode(file_get_contents($file));
        $users->personnes->$id->lieu = $_GET["lieu"];
        $users->personnes->$id->date = (new DateTime())->format("Y-m-d H:i:s");
        file_put_contents($file, json_encode($users));
        $l = $users->personnes->$id->lieu;
        echo "<p>" . $users->personnes->$id->prenom . " " . $users->personnes->$id->nom . " est " . $users->localisations->$l->text . ".";
    }
    ?>
</body>

</html>