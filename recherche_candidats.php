<?php
$mysqli = new mysqli("localhost", "root", "", "can_emp");

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

// Assurez-vous que la session est démarrée
session_start();

// Vérifiez si l'employeur est connecté
if (!isset($_SESSION['id_employeur'])) {
    // L'employeur n'est pas connecté, redirigez vers la page de connexion
    header("Location: connexion.php");
    exit;
}

$id_employeur = $_SESSION['id_employeur'];

$query = "SELECT nom_de_l_entreprise, email, secteur_d_activite, adresse, numero_de_telephone FROM employeurs WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_employeur);
$stmt->execute();
$stmt->bind_result($nom_entreprise, $email, $secteur_activite, $adresse, $telephone);
$stmt->fetch();
$stmt->close();

// Définissez des variables pour stocker les résultats de la recherche
$resultats = array();

// Vérifiez si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les critères de recherche du formulaire
    $nom_candidat = $_POST['nom_candidat'] ?? '';
    $competence = $_POST['competence'] ?? '';
    $experience = $_POST['experience'] ?? 0; // Assurez-vous que le champ expérience est un nombre

    // Si le bouton "Trouver un profil" est cliqué
    if (isset($_POST['trouver_profil'])) {
        // Récupérez la recherche par compétences
        $recherche_competences = $_POST['recherche_competences'] ?? '';

        // Construisez la requête SQL pour la recherche par compétences
        $query = "SELECT * FROM candidats WHERE competences LIKE ?";
        $stmt = $mysqli->prepare($query);
        $recherche_competences_param = "%{$recherche_competences}%";
        $stmt->bind_param("s", $recherche_competences_param);
        $stmt->execute();
        $resultats = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        // Construisez la requête SQL pour la recherche des candidats
        $query = "SELECT * FROM candidats WHERE nom LIKE ? AND competences LIKE ? AND experiences_professionnelles >= ?";
        $stmt = $mysqli->prepare($query);
        $nom_candidat_param = "%{$nom_candidat}%";
        $competence_param = "%{$competence}%";
        $stmt->bind_param("ssi", $nom_candidat_param, $competence_param, $experience);
        $stmt->execute();
        $resultats = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    }
}
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employeur</title>
    <style>
        /* Vos styles CSS ici */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .menu {
            background-color: #3498db;
            padding: 10px;
            width: 100%;
            text-align: center;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
            text-align: center;
            transition: transform 0.3s;
            margin-top: 20px;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        .info {
            margin-top: 20px;
            text-align: left;
        }

        .info p {
            margin: 5px 0;
            color: #333;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style pour masquer la section des résultats */
        .resultats-container {
            display: <?php echo (!empty($resultats)) ? 'block' : 'none'; ?>;
            margin-top: 20px;
        }

        .resultats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .candidat {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            margin: 10px;
            width: 200px;
            text-align: left;
        }

        .candidat p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="accueil.php">Accueil</a>
        <a href="profil.php">Profil</a>
        <a href="offres.php">Offres</a>
        <a href="candidats.php">Candidats</a>
        <a href="deconnexion.php">Déconnexion</a>
        <a href="mes_offres.php">Mes Offres</a>

        <!-- Ajout du lien vers la page de publication d'offres -->
        <a href="publier_offre.php">Publier une offre d'emploi</a>
    </div>
    <div class="container">
        <h1>Bienvenue dans l'espace employeur de <?php echo $nom_entreprise; ?></h1>
        <form id="rechercheForm" method="post" action="recherche_candidats.php">
            <label for="nom_candidat">Nom du candidat :</label>
            <input type="text" name="nom_candidat">

            <label for="competence">Compétence :</label>
            <input type="text" name="competence">

            <label for="experience">Expérience (en années) :</label>
            <input type="number" name="experience" min="0">

            <!-- Nouveau champ pour la recherche par compétences -->
            <label for="recherche_competences">Rechercher par compétences :</label>
            <input type="text" name="recherche_competences">

            <input type="submit" value="Rechercher des candidats">
            <input type="reset" value="Réinitialiser" onclick="resetForm()">
            <!-- Nouveau bouton pour trouver un profil par compétences -->
            <input type="submit" name="trouver_profil" value="Trouver un profil">
        </form>

        <!-- Section des résultats -->
        <div class="resultats-container">
            <?php
            // Affichez les résultats de la recherche
            if (!empty($resultats)) {
                echo "<h2>Résultats de la recherche</h2>";
                echo "<div class='resultats'>";
                foreach ($resultats as $resultat) {
                    echo "<div class='candidat'>";
                    echo "<p><strong>Nom:</strong> " . $resultat['nom'] . "</p>";
                    echo "<p><strong>Prénom:</strong> " . $resultat['prenom'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $resultat['email'] . "</p>";
                    echo "<p><strong>CV:</strong> " . $resultat['cv'] . "</p>";
                    echo "<p><strong>Compétences:</strong> " . $resultat['competences'] . "</p>";
                    echo "<p><strong>Expériences professionnelles:</strong> " . $resultat['experiences_professionnelles'] . " années</p>";
                    echo "</div>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <script>
            function resetForm() {
                // Réinitialise le formulaire
                document.getElementById("rechercheForm").reset();
                // Cache la section des résultats
                document.querySelector(".resultats-container").style.display = 'none';
            }
        </script>
    </div>
</body>
</html>
