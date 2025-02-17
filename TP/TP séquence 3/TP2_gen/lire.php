<!DOCTYPE html>
<html>
<head> 
<meta http-equiv="Content-Type" content="text/HTML; charset=utf-8" />
<title>lire xml</title>
</head>
<body>
<?php
$lieu = simplexml_load_file('lieu.xml'); //(1)
foreach ($lieu->identite as $identite) { //(2)
  echo "\nType {$identite['id']} <br />\n"; //(3)
  echo "Nom : {$identite->nom} <br />\n"; //(5)
  echo "Prénom : {$identite->prenom} <br />\n"; //(5)
  echo "lieu : {$identite->lieu} <br />\n"; //(5)
 echo "date : {$identite->date} <br />\n"; //(5)
  }
?>
</body> 
</html> 
