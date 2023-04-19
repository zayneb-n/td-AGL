<html> 
<head>
    <title>exercice8</title>
</head>
<body>
    <p>Les éléments d'un tableau sous forme de liste à puces</p>
<?php
$tab = array("HTML", "CSS", "JS", "PHP");

// Afficher les éléments du tableau dans une liste à puces
echo "<ul>";
foreach ($tab as $element) {
  echo "<li>" . $element . "</li>";
}
echo "</ul>";
?>
</body>
</html>