<?php
$mysqli = new mysqli("localhost", "root", "", "can_emp");

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

// Vérifiez si la session employeur est démarrée
session_start();

// Vérifiez si l'employeur est connecté
if (!isset($_SESSION['id_employeur'])) {
    // L'employeur n'est pas connecté, redirigez vers la page de connexion
    header("Location: connexion.php");
    exit;
}

// Récupérez l'id de l'employeur depuis la session
$id_employeur = $_SESSION['id_employeur'];

// Récupérez les informations de l'employeur depuis la base de données
$query = "SELECT nom_de_l_entreprise FROM employeurs WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_employeur);
$stmt->execute();
$stmt->bind_result($nom_entreprise);
$stmt->fetch();
$stmt->close();

// Récupérez les critères de recherche du formulaire
$nom_candidat = $_POST['nom_candidat'] ?? '';
$competence = $_POST['competence'] ?? '';
$experience = $_POST['experience'] ?? 0; // Assurez-vous que le champ expérience est un nombre

// Construisez la requête SQL pour la recherche des candidats
$query = "SELECT * FROM candidats WHERE nom LIKE ? AND competences LIKE ? AND experiences_professionnelles >= ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("ssi", $nom_candidat, $competence, $experience);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats de la recherche pour <?php echo $nom_entreprise; ?></title>
    <!-- Ajoutez vos styles CSS ici -->
</head>
<body>
    <h1>Résultats de la recherche pour <?php echo $nom_entreprise; ?></h1>
    <?php
    // Affichez les résultats de la recherche
    while ($row = $result->fetch_assoc()) {
        // Affichez les détails du candidat
        echo "<p>Nom: " . $row['nom'] . "</p>";
        echo "<p>Prénom: " . $row['prenom'] . "</p>";
        echo "<p>Email: " . $row['email'] . "</p>";
        echo "<p>CV: " . $row['cv'] . "</p>";
        echo "<p>Compétences: " . $row['competences'] . "</p>";
        echo "<p>Expériences professionnelles: " . $row['experiences_professionnelles'] . " années</p>";
        echo "<hr>";
    }
    ?>
</body>
</html>
