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

http_response_code(200);
echo json_encode($liste);
