<!DOCTYPE html>
<html>

<head>
    <title>ecrire le lieu </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>
    <?php
    error_reporting(E_ALL ^ E_NOTICE); //c'est pour enlever les warning!
    $file = "users.xml";
    if (is_file($file)) {
        $users = new SimpleXMLElement(file_get_contents($file));
        foreach ($users->identite as $user) {
            echo "<p> $user->prenom $user->nom est " . $user->lieu . " mise à jour de la connexion le " . (new DateTime($user->date))->format("d M Y, G : i");
        }
    }
    ?>
</body>

</html>