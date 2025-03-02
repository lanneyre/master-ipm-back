<!DOCTYPE html>
<html>

<head>
    <title>ecrire horloge </title>
    <meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
</head>

<body>

    <p> Je suis bien arrivé dans ce lieu</p>
    <form method="get" action="traitement_ecrire_horloge.php">
        <label for="user">Je suis : </label>
        <select name="user" id="user">
            <option value="0" selected disabled>-- Qui êtes vous ? --</option>
            <?php
            $file = "users.xml";
            if (is_file($file)) {
                $users = new SimpleXMLElement(file_get_contents($file));
                foreach ($users->identite as $user) {
                    # code...
            ?>
                    <option value="<?php echo $user['id']; ?>"><?php echo $user->prenom; ?> <?php echo $user->nom; ?></option>
            <?php
                }
            }

            ?>
        </select>
        <br><?php
            //var_dump(new SimpleXMLElement(file_get_contents($file)));
            ?><br>
        <label> Maison
            <input type=radio name="lieu" value="à la maison" />
        </label><br />
        <label> Poudlard
            <input type="radio" name="lieu" value="à Poudlard" />
        </label><br />
        <label> Les Trois Balais
            <input type="radio" name="lieu" value="à la taverne Les Trois Balais" />
        </label><br />
        <label> Cabane hurlante
            <input type="radio" name="lieu" value="à la Cabane hurlante" />
        </label><br />
        <label> Weasley, Farces pour sorciers facétieux
            <input type="radio" name="lieu" value="au magasin Weasley, Farces pour sorciers facétieux" />
        </label><br />
        <label> Ollivander - Fabricants de baguettes magiques
            <input type="radio" name="lieu" value="chez Ollivander - Fabricants de baguettes magiques" />
        </label><br />
        <label> Banque Gringotts
            <input type="radio" name="lieu" value="à la banque Banque Gringotts" />
        </label><br />

        <input type="submit" value="envoyer mon lieu" />
    </form>
</body>

</html>