<?php
$file = "../users.json";
$users = [];
if (is_file($file)) {
    $data = json_decode(file_get_contents($file));
    $users = $data->personnes;
    $liste = [];
    foreach ($users as $key => $user) {
        $liste[] = $user;
    }
} else {
    $liste = ["Error" => "fichier introuvable"];
}


echo json_encode($liste);
