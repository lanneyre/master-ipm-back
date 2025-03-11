<body class="is-preload">

    <?php
    // Charger les lieux depuis le fichier XML
    $xmlFile = "lieux.xml";
    $lieux = [];

    if (file_exists($xmlFile)) {
        $xml = simplexml_load_file($xmlFile);
        foreach ($xml->lieu as $lieu) {
            $lieux[] = (string) $lieu;
        }
    }

    // Vérifier si un formulaire a été soumis
    if (isset($_GET["lieu"])) {
        //$nom = $_GET["nom"];
        $lieu = $_GET["lieu"];
        $date = date("d M Y, H:i");

        // Charger ou créer le fichier XML des positions
        $xmlFileGPS = "gps.xml";
        if (!file_exists($xmlFileGPS)) {
            $xmlGPS = new SimpleXMLElement("<utilisateurs></utilisateurs>");
        } else {
            $xmlGPS = simplexml_load_file($xmlFileGPS);
        }

        // Mettre à jour ou ajouter un enfant dans gps.xml
        $found = false;
        foreach ($xmlGPS->identite as $identite) {
            if ($identite->nom == $personnage) {
                $identite->lieu = $lieu;
                $identite->date = $date;
                $found = true;
                break;
            }
        }

        // for ($i = 0; $i < sizeof($xmlGPS->identite); $i++) {
        //     # code...
        //     if ($xmlGPS->identite[$i]->nom == $personnage) {
        //         $xmlGPS->identite[$i]->lieu = $lieu;
        //         $xmlGPS->identite[$i]->date = $date;
        //         $found = true;
        //         break;
        //     }
        // }

        if (!$found) {
            $newChild = $xmlGPS->addChild("identite");
            $newChild->addChild("nom", $personnage);
            $newChild->addChild("lieu", $lieu);
            $newChild->addChild("date", $date);
        }

        $xmlGPS->asXML($xmlFileGPS);
    ?>

        <header id="header">
            <h1>Merci <?= htmlspecialchars($personnage) ?>,</h1>
            <p>Ta position est maintenant <?= htmlspecialchars($lieu) ?> (mise à jour : <?= htmlspecialchars($date) ?>).</p>
        </header>
        <div class="topright">
            <ul class="icons">
                <li><a href="index.php" class="icon fa-user"><span class="label">Retour à la page de connexion</span> Retour à la page de connexion</a></li>
            </ul>
        </div>

    <?php
    } else {
    ?>
        <!-- Header -->
        <header id="header">
            <h1>Bonjour <?= htmlspecialchars($personnage) ?> !</h1>
            <p>Où es-tu ?</p>
        </header>
        <div class="topright">
            <ul class="icons">
                <li><a href="index.php" class="icon fa-user"><span class="label">Retour à la page de connexion</span> Retour à la page de connexion</a></li>
            </ul>
        </div>
        <form id="signup-form" method="get" action="index.php">
            <select name="lieu" id="lieu">
                <?php foreach ($lieux as $lieu): ?>
                    <option value="<?= htmlspecialchars($lieu) ?>"><?= htmlspecialchars($lieu) ?></option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" id="nom" name="nom" value="<?= htmlspecialchars($personnage) ?>">
            <input type="submit" value="Envoyer ma position" />
        </form>
    <?php
    }
    ?>