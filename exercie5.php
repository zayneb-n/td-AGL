<html> 
<head>
    <title>exercice5</title>
</head>
<body>
<?php
    $ch = "TransFOrmeZ unE ChaiNE ́ecRITe dans des cASses diFF ́ereNTes afiN qUe chAQue MOT ait une inITiale en MAJUSCULE";

    $ch = strtolower($ch);
    
    $ch = ucwords($ch);
    
    echo $ch;

?>
</body>
</html> 