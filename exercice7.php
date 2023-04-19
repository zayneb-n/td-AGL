<html> 
<head>
    <title>exercice7</title>
</head>
<body>
    <p><h1>Tableaux avec clés entières</h1></p>
    
<p>
<?php
$tableau = array(23, 45, 41 , 6, 04);
echo "(";
for ($i=0 ; $i<count($tableau) ; $i++)
{
    echo"$tableau[$i]";
    if ($i + 1 < count($tableau))
    echo ",";
}
echo ") \n";
?>
</p>
</body>
</html>