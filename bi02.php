<?php
//vérifier la soumission du form, récupérer les valeurs des champs et définir les cookies avec les valeurs des champs 
if(isset($_POST['submit'])) {
    $bg_color = $_POST['bg_color'];
    $text_color = $_POST['text_color'];
    setcookie('bg_color', $bg_color, time() + 60 * 60 * 24 * 60);
    setcookie('text_color', $text_color, time() + 60 * 60 * 24 * 60); 
}
//créer le style en utilisant les valeurs des couleurs 
echo '<style>body {background-color: '.$bg_color.'; color: '.$text_color.';}</style>';
?>

<!-- Formulaire de saisie des couleurs -->
<form method="post">
    <label for="bg_color">Couleur de fond:</label>
    <input type="color" id="bg_color" name="bg_color" value="<?php echo $bg_color; ?>">
    <br>
    <label for="text_color">Couleur du texte:</label>
    <input type="color" id="text_color" name="text_color" value="<?php echo $text_color; ?>">
    <br>
    <input type="submit" name="submit" value="Enregistrer">
</form>