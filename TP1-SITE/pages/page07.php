<h2>Statistiques</h2>

<?php
$resultats = json_decode(file_get_contents("resultats.json"));
$nbResult = [];
for ($i=0; $i <= 10 ; $i++) { 
    # code...
    $nbResult[$i] = 0;
}

foreach ($resultats as $key => $value) {
    # code...
    $score = round($value['score'] / $value['total']);
    $nbResult[$value[$score]]++;
}
?>