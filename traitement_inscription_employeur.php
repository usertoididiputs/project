<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connexion à la base de données
    $mysqli = new mysqli("localhost", "root", "", "can_emp");

    // Vérification de la connexion
    if ($mysqli->connect_error) {
        die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
    }

    // Récupération des données soumises par le formulaire
    $nom_entreprise = $_POST['nom_entreprise'];
    $email_entreprise = $_POST['email_entreprise'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $secteur_activite = $_POST['secteur_activite'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    // Requête d'insertion des données dans la table "employeurs"
    $sql = "INSERT INTO employeurs (nom_de_l_entreprise, email, mot_de_passe, secteur_d_activite, adresse, numero_de_telephone) VALUES (?, ?, ?, ?, ?, ?)";

    $insert_stmt = $mysqli->prepare($sql);
    $insert_stmt->bind_param("ssssss", $nom_entreprise, $email_entreprise, $mot_de_passe, $secteur_activite, $adresse, $telephone);

    if ($insert_stmt->execute()) {
        // Redirection vers la page de l'espace employeur
        header("Location: espace_employeur.php");
        exit; // Assurez-vous que le script s'arrête ici
    } else {
        // Gestion de l'erreur
        echo "Erreur : " . $mysqli->error;
    }

    // Fermeture de la connexion
    $mysqli->close();
}
?>
