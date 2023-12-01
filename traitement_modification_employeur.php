<?php
$mysqli = new mysqli("localhost", "root", "", "can_emp");

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

session_start();

// Vérifiez si l'employeur est connecté
if (!isset($_SESSION['id_employeur'])) {
    header("Location: connexion.php");
    exit; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_employeur = $_SESSION['id_employeur'];

    // Récupérez les nouvelles données du formulaire
    $nouveau_nom = $_POST['nom_entreprise'];
    $nouvel_email = $_POST['email'];
    $nouveau_secteur_activite = $_POST['secteur_activite'];
    $nouvelle_adresse = $_POST['adresse'];
    $nouveau_telephone = $_POST['telephone'];

    // Mettez à jour les informations dans la base de données
    $query = "UPDATE employeurs SET nom_de_l_entreprise=?, email=?, secteur_d_activite=?, adresse=?, numero_de_telephone=? WHERE id=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("sssssi", $nouveau_nom, $nouvel_email, $nouveau_secteur_activite, $nouvelle_adresse, $nouveau_telephone, $id_employeur);

    if ($stmt->execute()) {
        // Redirigez l'employeur vers la page d'espace employeur après la modification
        header("Location: espace_employeur.php");
        exit;
    } else {
        // Gestion de l'erreur
        echo "Erreur : " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>
