<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<title>écrire xml</title>
</head>
<body>
<?php
$lieu = simplexml_load_file('lieu.xml'); //(1)
$id=1;
foreach ($lieu->identite as $identite) { 
if ($identite->prenom=='victoire')
	$identite->lieu='fives';
$id++;}//(2)

$identite=$lieu->addChild('identite');
$identite->addAttribute('id', $id);
$identite->addChild('nom', 'Caron');
$identite->addChild('prenom', 'Océane');
$identite->addChild('lieu', 'Paris');
$identite->addChild('date', '2020');
// mise en forme 
$dom = new DOMDocument('1.0');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->loadXML($lieu->asXML());
//si on veut afficher
echo $dom->saveXML();
//si on veut ajouter
$dom->save('lieu_new.xml');

?>
</body> 
</html> 
