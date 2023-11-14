<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mysqli = new mysqli("localhost", "root", "", "can_emp");

    if ($mysqli->connect_error) {
        die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
    }

    $nom_entreprise = $_POST['nom_entreprise'];
    $email_entreprise = $_POST['email_entreprise'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);
    $secteur_activite = $_POST['secteur_activite'];
    $adresse = $_POST['adresse'];
    $telephone = $_POST['telephone'];

    $sql = "INSERT INTO employeurs (nom_de_l_entreprise, email, mot_de_passe, secteur_d_activite, adresse, numero_de_telephone) VALUES (?, ?, ?, ?, ?, ?)";

    $insert_stmt = $mysqli->prepare($sql);
    $insert_stmt->bind_param("ssssss", $nom_entreprise, $email_entreprise, $mot_de_passe, $secteur_activite, $adresse, $telephone);

    if ($insert_stmt->execute()) {
        // Récupérer l'ID de l'employeur nouvellement inscrit
        $id_employeur = $mysqli->insert_id;

        // Créer la session pour l'employeur
        $_SESSION['id_employeur'] = $id_employeur;

        // Redirection vers l'espace employeur
        header("Location: espace_employeur.php");
        exit;
    } else {
        echo "Erreur : " . $mysqli->error;
    }

    $mysqli->close();
}
?>
