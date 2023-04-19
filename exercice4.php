<html> 
<head>
    <title>exercice4</title>
</head>
<body>
<?php
     $tableau = array();
     $lettre = 'A';
     for ($i = 11; $i <= 36; $i++) 
     {
       $tableau[$i] = $lettre;
       $lettre++;
     }
    
     foreach ($tableau as $indice => $valeur) {
        echo '<span style="font-weight:bold; color:red;">Indice : ' . $indice . '</span> - Valeur : ' . chr(ord('A') + $valeur - 1) . "\n";
      }
     
?>
</body>
</html> 