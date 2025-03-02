<!DOCTYPE html>
<html>

<head>
    <title>ecrire horloge </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>
    <?php
    $file = "users.json";
    if (is_file($file)) {
        $data = json_decode(file_get_contents($file));
        $users = $data->personnes;
        $localisations = $data->localisations
    ?>
        <p> Je suis bien arrivé dans ce lieu</p>
        <form method="get" action="traitement_ecrire_horloge.php">
            <label for="user">Je suis : </label>
            <select name="user" id="user">
                <option value="0" selected disabled>-- Qui êtes vous ? --</option>
                <?php


                foreach ($users as $key => $user) {
                    # code...
                ?>
                    <option value="<?php echo $key; ?>"><?php echo $user->prenom; ?> <?php echo $user->nom; ?></option>
                <?php
                }

                ?>
            </select>
            <br><br>

            <?php
            foreach ($localisations as $key => $loc) {
                # code...
            ?>
                <label> <?php echo $key; ?>
                    <input type=radio name="lieu" value="<?php echo $key; ?>" />
                </label><br />
            <?php } ?>

            <input type="submit" value="envoyer mon lieu" />
        </form>
    <?php } ?>
</body>

</html>