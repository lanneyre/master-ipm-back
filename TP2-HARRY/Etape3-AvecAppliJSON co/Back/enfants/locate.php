<?php
header('Content-Type: application/json');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rawData = file_get_contents("php://input");
    // Décoder les données JSON
    $dataIn = json_decode($rawData, true);

    if (empty($dataIn["enfant"])) {
        http_response_code(400);
        echo json_encode(["error"  => "Il manque le paramètre enfant"]);
        exit;
    }

    if (json_last_error() !== JSON_ERROR_NONE) {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Invalid JSON data']);
        exit;
    }
    $file = "../users.json";
    //$personnes = [];
    $ok = false;
    if (is_file($file)) {
        $data = json_decode(file_get_contents($file));
        $personnes = $data->personnes;
        //

        $p = [];
        foreach ($data->personnes as $personne) {
            # code...
            $p[$personne->id] = $personne;
        }
        foreach ($p as $key => $personne) {
            # code...
            if ($personne->id == $dataIn["enfant"]) {
                $id = $personne->id;
                $data->personnes->$id->LatLng = $dataIn['LatLng'];
                $data->personnes->$id->date = (new DateTime())->format("Y-m-d H:i:s");
                $ok = true;
                break;
            }
        }
        if (!file_put_contents($file, json_encode($data))) {
            $ok = false;
        }
    }

    if ($ok) {
        http_response_code(200);
        echo json_encode(["success"  => "La position a été modifié"]);
    } else {
        http_response_code(400);
        echo json_encode(["error"  => "L'enfant n'existe pas"]);
    }
    exit;
}
http_response_code(400);
echo json_encode(["error"  => "Pas la bonne methode"]);
exit;
