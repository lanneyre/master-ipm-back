<!DOCTYPE html>
<html>

<head>
    <title>ecrire le lieu </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>
    <?php

    $file = "users.xml";
    $lieu = $_GET["lieu"];
    $id = $_GET["user"];
    $u = "";
    if (is_file($file)) {
        $users = new SimpleXMLElement(file_get_contents($file));
        foreach ($users->identite as $user) {
            # code...
            if ($user['id'] == $id) {
                $user->lieu = $lieu;
                $user->date = (new DateTime())->format("Y-m-d H:i:s");
                echo "<p> $user->prenom $user->nom est " . $lieu . ".";
            }
        }
        file_put_contents($file, $users->asXML());
    }
    ?>
</body>

</html>