<html> 
<head>
    <title>exercice9</title>
</head>
<body>
    <p><h1>Tableau avec clé de type string</h1></p>

<?php

$tableau = array('nom' => 'Tounsi', 'prenom' => 'Ahmed');

echo "<ul>\n";

// Accéder aux éléments directement :
echo "<li> Accès aux éléments du tableau par indice:<br>";
echo "Nom : " . $tableau['nom'] . "<br>";
echo "Prénom : " . $tableau['prenom'] . "<br><br><br>";

//Affiher les éléments du tableau avec une boucle foreach
echo "<li> les données du tableau sous forme cle => valeur sont :<br>";
foreach ($tableau as $cle => $valeur) {
    echo $cle . " : " . $valeur . "<br>";
  }
  echo "<ul>";

//Affiher les éléments du tableau avec print_r()
print_r($tableau);
?>
</body>
</html>


