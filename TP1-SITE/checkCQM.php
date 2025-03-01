<?php

if (empty($_POST) || empty($_POST['nom'])) {
    header("Location: index.php?page=2&error");
    exit;
}

// var_dump($_POST);
$data = file_get_contents("test.json");

$questions = json_decode($data);
$bonneRep = 0;
$repTot = 0;
foreach ($_POST as $key => $value) {
    if ($key != "nom") {
        # code...
        $idQ = substr($key, 7);
        //var_dump($questions[$idQ]->Reponses[$value][1]);
        if ($questions[$idQ]->Reponses[$value][1] === "TRUE") {
            // echo "c'est bon <br>";
            $bonneRep++;
        } else {
            // echo "c'est faux <br>";
        }
        $repTot++;
    }
}

$resultats = json_decode(file_get_contents("resultats.json"));
$resultats[] = ["nom" => $_POST["nom"], "score" => $bonneRep, "total" => $repTot, "date" => (new DateTime("now", new DateTimeZone("Europe/Paris")))->format("Y-m-d H:i:s")];
file_put_contents("resultats.json", json_encode($resultats));

header("Location: index.php?page=2&score=" . $bonneRep . "/" . $repTot);
exit;
