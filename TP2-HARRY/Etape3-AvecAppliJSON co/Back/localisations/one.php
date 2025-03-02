<?php
if (empty($_GET["lieu"])) {
    echo json_encode(["error"  => "Il manque le paramètre lieu"]);
    exit;
}
$file = "../users.json";
$localisations = [];
if (is_file($file)) {
    $data = json_decode(file_get_contents($file));
    $localisations = $data->localisations;
}
foreach ($localisations as $key => $loc) {
    if ($key == $_GET["lieu"]) {
        echo json_encode($loc);
        exit;
    }
}
echo json_encode(["error"  => "Le lieu n'existe pas"]);
