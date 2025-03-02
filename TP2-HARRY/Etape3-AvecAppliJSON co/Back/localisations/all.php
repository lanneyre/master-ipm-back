<?php
$file = "../users.json";
$localisations = [];
if (is_file($file)) {
    $data = json_decode(file_get_contents($file));
    $localisations = $data->localisations;
}
echo json_encode($localisations);
