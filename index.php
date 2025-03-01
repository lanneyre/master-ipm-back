<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projets Master IPM</title>
</head>

<body>
    <h1>Bienvenue sur l'index de mes projets</h1>
    <h2>Rémi LANNEY RICCI</h2>
    <a href="mailto:r.lanney@campussuddesmetiers.com">Pour m'envoyer un mail</a>
    <ul>
        <?php
        $elements = scandir(".");
        foreach ($elements as $element) {
            if (is_dir($element) && !in_array($element, [".", ".."])) {
                echo "<li><a href='" . $element . "'>" . $element . "</a></li>\n";
            }
        }
        ?>
    </ul>
</body>

</html>