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
    $recherche_globale = $_POST['recherche_globale'] ?? '';
    $id_candidat = $_POST['id_candidat'] ?? '';
    $disponibilite = $_POST['disponibilite'] ?? '';
    $niveau_etude = $_POST['niveau_etude'] ?? '';
    $langue = $_POST['langue'] ?? '';

    // Si le bouton "Trouver un profil" est cliqué
    if (isset($_POST['trouver_profil'])) {
        // Séparez les compétences par des virgules et supprimez les espaces
        $competences_array = array_map('trim', explode(',', $recherche_globale));
        // Créez un tableau de paramètres de liaison pour chaque compétence
        $params = str_repeat('s', count($competences_array));
        // Construisez la requête SQL pour la recherche par compétences
        $query = "SELECT id, nom, prenom, email, cv, competences, experiences_professionnelles, disponibilite, fourchette_salariale, langues FROM candidats WHERE ";
        foreach ($competences_array as $competence) {
            $query .= "competences LIKE ? OR ";
        }
        $query = rtrim($query, " OR ");

        // Ajoutez les critères supplémentaires
        if (!empty($id_candidat)) {
            $query .= "AND id = ? ";
            $params .= 'i';
            $competences_array[] = $id_candidat;
        }
        if (!empty($disponibilite)) {
            $query .= "AND disponibilite = ? ";
            $params .= 's';
            $competences_array[] = $disponibilite;
        }
        if (!empty($niveau_etude)) {
            $query .= "AND niveau_etude = ? ";
            $params .= 's';
            $competences_array[] = $niveau_etude;
        }
        if (!empty($langue)) {
            $query .= "AND langues LIKE ? ";
            $params .= 's';
            $competences_array[] = '%' . $langue . '%';
        }

        $stmt = $mysqli->prepare($query);
        $stmt->bind_param($params, ...$competences_array);
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
        /* ... (styles précédents) ... */
    </style>
</head>
<body>
    <div class="menu">
        <!-- ... (menu précédent) ... -->
    </div>
    <div class="container">
        <h1>Bienvenue dans l'espace employeur de <?php echo $nom_entreprise; ?></h1>
        <form id="rechercheForm" method="post" action="recherche_candidats.php">
            <label for="recherche_globale">Compétences :</label>
            <input type="text" name="recherche_globale">

            <label for="id_candidat">ID Candidat :</label>
            <input type="text" name="id_candidat">

            <label for="disponibilite">Disponibilité :</label>
            <input type="text" name="disponibilite">

            <label for="niveau_etude">Niveau d'études :</label>
            <input type="text" name="niveau_etude">

            <label for="langue">Langue :</label>
            <input type="text" name="langue">

            <input type="submit" name="trouver_profil" value="Trouver un profil">
            <input type="reset" value="Réinitialiser" onclick="resetForm()">
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
                    echo "<p><strong>CV:</strong> <a href='{$resultat['cv']}' target='_blank'>Télécharger le CV</a></p>";
                    echo "<p><strong>Compétences:</strong> " . $resultat['competences'] . "</p>";
                    echo "<p><strong>Expériences professionnelles:</strong> " . $resultat['experiences_professionnelles'] . " années</p>";
                    echo "<p><strong>Disponibilité:</strong> " . $resultat['disponibilite'] . "</p>";
                    echo "<p><strong>Fourchette Salariale:</strong> " . $resultat['fourchette_salariale'] . " k€</p>";
                    echo "<p><strong>Langues:</strong> " . $resultat['langues'] . "</p>";
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
