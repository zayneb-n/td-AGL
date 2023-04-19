<!DOCTYPE html>
<html>
<head>
	<title>Ma page HTML</title>
  <script>
      function validerFormulaire() {
      var nom = document.forms["ajoutEtudiant"]["nom"].value;
      var prenom = document.forms["ajoutEtudiant"]["prenom"].value;
      var dateNaissance = document.forms["ajoutEtudiant"]["date_naissance"].value;
      var genre = document.forms["ajoutEtudiant"]["genre"].value;
      var ville = document.forms["ajoutEtudiant"]["ville"].value;

      if (nom == "" || prenom == "" || dateNaissance == "" || genre == "" || ville == "") {
        alert("Veuillez remplir tous les champs.");
        return false;
      }

      return true;
    }
  </script>
</head>
<body>

<?php
// Connexion à la base de données Faculté
$serveur = "localhost";
$utilisateur = "nom_utilisateur";
$mdp = "mot_de_passe";
$bd = "faculte";
$connexion = new mysqli($serveur, $utilisateur, $mdp, $bd);

// Vérification de la connexion
if (!$connexion) {
  die("LEchec de la connexion. Erreur: " . mysqli_connect_error());
} else {
  printf("Connexion établie"); }


// ́editer les informations d’un  ́etudiant à travers sa matricule (IdEtud) en les affichant sous forme de list à puces 
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $requete = "SELECT * FROM Etudiant WHERE IdEtud=$id";
    $resultat = $connexion->query($requete); 
  
    if ($resultat->num_rows > 0) {
      $etudiant = $resultat->fetch_assoc();

      <ul>
        <li>Nom : <?php echo $etudiant['NomEtud']; ?></li>
        <li>Prénom : <?php echo $etudiant['PrenomEtud']; ?></li>
        <li>Date de naissance : <?php echo $etudiant['DateNaissance']; ?></li>
        <li>Genre : <?php echo $etudiant['Genre']; ?></li>
        <li>Ville : <?php echo $etudiant['Ville']; ?></li>
      </ul>
     
    } else {
      echo "Aucun étudiant trouvé avec cette matricule.";
    }
  }
  
// Éditer la liste des étudiants dans un tableau
$requete = "SELECT * FROM Etudiant";
$resultat = $connexion->query($requete);

if ($resultat->num_rows > 0) {
?>
  <table>
    <thead>
      <tr>
        <th>Matricule</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de naissance</th>
        <th>Genre</th>
        <th>Ville</th>
      </tr>
    </thead>
  while ($etudiant = $resultat->fetch_assoc()) {
      <tr>
        <td><a href="?id=<?php echo $etudiant['IdEtud']; ?>"><?php echo $etudiant['IdEtud']; ?></a></td>
        <td><?php echo $etudiant['NomEtud']; ?></td>
        <td><?php echo $etudiant['PrenomEtud']; ?></td>
        <td><?php echo $etudiant['DateNaissance']; ?></td>
        <td><?php echo $etudiant['Genre']; ?></td>
        <td><?php echo $etudiant['Ville']; ?></td>
      </tr>
  </table>
} else {
  echo "Aucun étudiant trouvé dans la base de données.";
}


// Ajouter un nouvel étudiant avec validation des données introduites
if (isset($_POST['submit'])) 
{
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $date_naissance = $_POST['date_naissance'];
  $genre = $_POST['genre'];
  $ville = $_POST['ville'];
}
  if (!empty($nom) && !empty($prenom) && !empty($date_naissance) && !empty($genre) && !empty($ville)) {
    $requete = "INSERT INTO Etudiant (NomEtud, PrenomEtud, DateNaissance, Genre, Ville) VALUES ('$nom', '$prenom', '$date_naissance', '$genre', '$ville')";
  
    if ($connexion->query($requete) === TRUE) {
      echo "Nouvel étudiant ajouté avec succès.";
    } else {
      echo "Erreur: " . $requete . "<br>" . $connexion->error;
    }
  } else {
    echo "Veuillez remplir tous les champs.";
  }
?>

  <h1>Ajouter un nouvel étudiant</h1>
  <form method="post" name="ajoutEtudiant" onsubmit="return validerFormulaire()">
    <label>Nom :</label>
    <input type="text" name="nom"><br><br>
    <label>Prénom :</label>
    <input type="text" name="prenom"><br><br>
    <label>Date de naissance :</label>
    <input type="date" name="date_naissance"><br><br>
    <label>Genre :</label>
    <select name="genre">
      <option value="">--Choisir--</option>
      <option value="F">Femme</option>
      <option value="M">Homme</option>

<?php
//supprimer un  ́etudiant donné à travers sa matricule
<?php if (isset($_POST['delete'])) {
  $matricule = $_POST['matricule'];

  if (!empty($matricule)) {
    $requete = "DELETE FROM Etudiant WHERE MatriculeEtud='$matricule'";

    if ($connexion->query($requete) === TRUE) {
      echo "Etudiant supprimé avec succès.";
    } else {
      echo "Erreur: " . $requete . "<br>" . $connexion->error;
    }
  } else {
    echo "Veuillez saisir une matricule.";
  }
}
?>

<h2>Supprimer un étudiant</h2>
<form method="post">
  <label>Matricule :</label>
  <input type="text" name="matricule"><br><br>
  <input type="submit" name="delete" value="Supprimer">
</form>

<?php
//mettre à jour les informations d'un étudiant en utilisant sa matricule
if (isset($_POST['update'])) {
  $matricule = $_POST['matricule'];
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $date_naissance = $_POST['date_naissance'];
  $genre = $_POST['genre'];
  $ville = $_POST['ville'];

  if (!empty($matricule) && !empty($nom) && !empty($prenom) && !empty($date_naissance) && !empty($genre) && !empty($ville)) {
    $requete = "UPDATE Etudiant SET NomEtud='$nom', PrenomEtud='$prenom', DateNaissance='$date_naissance', Genre='$genre', Ville='$ville' WHERE MatriculeEtud='$matricule'";

    if ($connexion->query($requete) === TRUE) {
      echo "Informations de l'étudiant mises à jour avec succès.";
    } else {
      echo "Erreur: " . $requete . "<br>" . $connexion->error;
    }
  } else {
    echo "Veuillez remplir tous les champs.";
  }
} 
?>

<h2> Mettre à jour les informations d un étudiant </h2>
<form method="post">
  <label>Matricule :</label>
  <input type="text" name="matricule"><br><br>
  <label>Nom :</label>
  <input type="text" name="nom"><br><br>
  <label>Prénom :</label>
  <input type="text" name="prenom"><br><br>
  <label>Date de naissance :</label>
  <input type="date" name="date_naissance"><br><br>
  <label>Genre :</label>
  <select name="genre">
    <option value="">--Choisir--</option>
    <option value="F">Femme</option>
    <option value="M">Homme</option>
  </select><br><br>
  <label>Ville :</label>
  <input type="text" name="ville"><br><br>
  <input type="submit" name="update" value="Mettre à jour">
</form>

</body>
</html>