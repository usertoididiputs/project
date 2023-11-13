<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mysqli = new mysqli("localhost", "root", "", "emp_can");

    if ($mysqli->connect_error) {
        die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Vérifiez les informations dans la base de données
    $query = "SELECT id, mot_de_passe FROM utilisateurs WHERE email = ? AND role = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $stmt->bind_result($user_id, $hashed_password);
    $stmt->fetch();
    $stmt->close();

    if (password_verify($password, $hashed_password)) {
        // Authentification réussie, redirigez vers l'espace approprié
        if ($role === 'candidat') {
            header("Location: espace_candidat.php?id=$user_id");
        } elseif ($role === 'employeur') {
            header("Location: espace_employeur.php?id=$user_id");
        } else {
            // Gestion d'une erreur de rôle non reconnu
            echo "Erreur : Rôle non reconnu.";
        }
        exit;
    } else {
        // Gestion d'une authentification échouée
        echo "Erreur : Nom d'utilisateur, mot de passe ou rôle incorrect.";
    }

    $mysqli->close();
}
?>
