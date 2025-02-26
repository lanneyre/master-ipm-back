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
    $u = "";
    if (is_file($file)) {
        $users = json_decode(file_get_contents($file));
        $users->$id->lieu = $_GET["lieu"];
        $users->$id->date = (new DateTime())->format("Y-m-d H:i:s");
        file_put_contents($file, json_encode($users));
        echo "<p>" . $users->$id->prenom . " " . $users->$id->nom . " est " . $users->$id->lieu . ".";
    }
    ?>
</body>

</html>