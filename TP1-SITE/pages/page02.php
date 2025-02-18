<?php
$data = file_get_contents("test.json");

$questions = json_decode($data);

if (isset($_GET['score'])) {
?>
    <div class="row">
        <div class="12u success">
            Vous avez terminé le QCM avec un score de <?php echo $_GET['score']; ?>
        </div>
    </div>
<?php
}

echo '<form method="post" action="checkCQM.php" class="container qcm" id="QCM">'; ?>
<div class="row">
    <div class="12u">
        <input type="text" name="nom" id="nom" placeholder="Votre nom *" class="formTest" required>
    </div>
</div>
<?php foreach ($questions as $key => $question) {
?>
    <div class="row question <?php echo ($key == 0) ? "activeq" : ""; ?>">
        <div class="3u">
            <img src="<?php echo $question->Img; ?>" alt="Question numéro <?php echo $key; ?>">
        </div>
        <div class="9u">
            <h5><?php echo $question->Question; ?></h5>
            <?php
            foreach ($question->Reponses as $numero => $reponse) {
            ?><div>
                    <input type="radio" name="reponse<?php echo $key; ?>" id="reponse<?php echo $key; ?>_<?php echo $numero; ?>" value="<?php echo $numero; ?>">
                    <label for="reponse<?php echo $key; ?>_numero"><?php echo $reponse[0]; ?></label>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
<?php
}
?><div class="row navigationqcm">
    <div class="4u">
        <button class="button" id="prevBtn">Précédent</button>
    </div>
    <div class="4u">
        <ul id="questionSelector">
            <?php
            foreach ($questions as $key => $question) {
            ?><li> <a rel-question="<?php echo $key; ?>" class="linkQuestion"> o </a> </li><?php
                                                                                        } ?>
        </ul>
    </div>
    <div class="4u">
        <button class="button" id="nextBtn">Suivant</button>
    </div>
</div>
<?php
echo '</form>';
?>
<div class="row">
    <div class="12u center">
        <br>
        <a href="index.php?page=7">Statistiques du test</a>
    </div>
</div>