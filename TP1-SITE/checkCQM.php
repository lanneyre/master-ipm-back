<?php

if (empty($_POST)) {
    header("Location: index.php?page=2");
    exit;
}

// var_dump($_POST);
$data = file_get_contents("test.json");

$questions = json_decode($data);
$bonneRep = 0;
$repTot = 0;
foreach ($_POST as $key => $value) {
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
header("Location: index.php?page=2&score=" . $bonneRep . "/" . $repTot);
exit;
