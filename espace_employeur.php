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

        input[type="submit"] {
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

        input[type="submit"]:hover {
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
        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
    </div>
    <div class="container">
        <h1>Bienvenue dans votre espace employeur</h1>
        <div class="info">
            <?php
            echo "<p><strong>Nom de l'entreprise :</strong> $nom_entreprise</p>";
            echo "<p><strong>Email de l'entreprise :</strong> $email</p>";
            echo "<p><strong>Secteur d'activité :</strong> $secteur_activite</p>";
            echo "<p><strong>Adresse :</strong> $adresse</p>";
            echo "<p><strong>Numéro de téléphone :</strong> $telephone</p>";
            ?>
        </div>
        <form method="post" action="traitement_modification_employeur.php">
            <label for="nom_entreprise">Nouveau nom :</label>
            <input type="text" name="nom_entreprise" required>

            <label for="email">Nouvel email :</label>
            <input type="email" name="email" required>

            <label for="secteur_activite">Nouveau secteur d'activité :</label>
            <input type="text" name="secteur_activite" required>

            <label for="adresse">Nouvelle adresse :</label>
            <input type="text" name="adresse" required>

            <label for="telephone">Nouveau numéro de téléphone :</label>
            <input type="tel" name="telephone" required>

            <input type="submit" value="Modifier les informations">
        </form>
        <form method="post" action="deconnexion.php">
            <input type="submit" value="Déconnexion">
        </form>
    </div>
</body>
</html>
