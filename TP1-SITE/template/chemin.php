<a href="index.php">Accueil</a> >>
<?php
if ($page != 0) {
    switch ($page) {
        case 2:
            echo '<a href="index.php?page=2">Test</a> >> ';
            break;
        case 6:
            echo '<a href="index.php?page=6">Le TP</a> >> ';
            break;
        default:
            echo '<a href="index.php?page=1">Cours</a> >> ';
            switch ($_GET["page"]) {
                case 3:
                    echo '<a href="index.php?page=3">Variables</a> >> ';
                    break;
                case 4:
                    echo '<a href="index.php?page=4">Tableaux</a> >> ';
                    break;
                case 5:
                    echo '<a href="index.php?page=5">Graphiques</a> >> ';
                    break;
                default:
                    echo '<a href="index.php?page=1">Introduction</a> >> ';
                    break;
            }
            break;
    }
}
