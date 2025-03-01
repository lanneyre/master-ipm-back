<!DOCTYPE html>
<html>

<head>
    <title>Lire le lieu </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    //error_reporting(E_ALL ^ E_NOTICE); //c'est pour enlever les warning!
    $file = "users.json";
    if (is_file($file)) {
        $data = json_decode(file_get_contents($file));

        $personnes = $data->personnes;
        $localisations = $data->localisations;
    ?>
        <div class="clock">
            <?php foreach ($localisations as $nom => $coords): ?>
                <div class="location" id="<?php echo htmlspecialchars($nom) ?>">
                    <img src="images/<?php echo htmlspecialchars($coords->img) ?>" alt="<?php echo htmlspecialchars($nom) ?>">
                </div>
            <?php endforeach; ?>
            <?php foreach ($personnes as $key => $user): ?>
                <div class="aiguille" data-lieu="<?php echo htmlspecialchars($user->lieu) ?>"><img src="images/<?php echo htmlspecialchars($user->img) ?>" alt="<?php echo htmlspecialchars($user->prenom) ?> <?php echo htmlspecialchars($user->nom) ?>"></div>
            <?php endforeach; ?>
        </div>
        <script src="script.js"></script>
    <?php } ?>
</body>

</html>