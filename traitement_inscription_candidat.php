<?php
// Connexion à la base de données
$mysqli = new mysqli("localhost", "root", "", "Can_Emp");

// Vérification de la connexion
if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

// Récupération des données soumises par le formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_BCRYPT);

// Gestion du fichier CV téléchargé
$cv = $_FILES['cv'];
if ($cv['error'] === UPLOAD_ERR_OK) {
    $cv_name = $cv['name'];
    $cv_tmp_name = $cv['tmp_name'];
    $cv_destination = 'chemin/vers/le/dossier_de_stockage/' . $cv_name; // Remplacez par le chemin réel

    move_uploaded_file($cv_tmp_name, $cv_destination);
} else {
    echo "Erreur lors du téléchargement du CV : " . $cv['error'];
}

$competences = $_POST['competences'];
$experiences = $_POST['experiences'];

// Vérification si l'adresse email existe déjà
$check_email_query = "SELECT email FROM candidats WHERE email = ?";
$check_stmt = $mysqli->prepare($check_email_query);
$check_stmt->bind_param("s", $email);
$check_stmt->execute();
$check_stmt->store_result();

if ($check_stmt->num_rows > 0) {
    // L'adresse email existe déjà, afficher un message d'erreur
    echo "L'adresse email est déjà enregistrée. Utilisez une adresse email différente.";
} else {
    // L'adresse email est unique, procéder à l'insertion dans la base de données
    $sql = "INSERT INTO candidats (nom, prenom, email, mot_de_passe, cv, competences, experiences_professionnelles)
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    $insert_stmt = $mysqli->prepare($sql);
    $insert_stmt->bind_param("sssssss", $nom, $prenom, $email, $mot_de_passe, $cv_destination, $competences, $experiences);

    if ($insert_stmt->execute()) {
        // Redirection vers une page de succès
        //header("Location: inscription_reussie.php");
        header("Location: espace_candidat.php?nom=$nom&prenom=$prenom&email=$email");
    } else {
        // Gestion de l'erreur
        echo "Erreur : " . $mysqli->error;
    }
}

// Fermeture des requêtes
$check_stmt->close();
if (isset($insert_stmt)) {
    $insert_stmt->close();
}

// Fermeture de la connexion
$mysqli->close();
?>