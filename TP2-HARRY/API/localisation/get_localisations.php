<?php
$file = "../users.json";
if (is_file($file)) {
    $data = json_decode(file_get_contents($file));
    $localisations = $data->localisations;
    foreach ($localisations as $loc => $details) {
        echo $loc . ", ";
        # code...
    }
}
