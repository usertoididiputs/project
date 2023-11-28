<?php
$mysqli = new mysqli("localhost", "root", "", "can_emp");

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

session_start();

if (!isset($_SESSION['id_employeur'])) {
    header("Location: connexion.php");
    exit;
}

$id_employeur = $_SESSION['id_employeur'];

$query = "SELECT nom_de_l_entreprise FROM employeurs WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $id_employeur);
$stmt->execute();
$stmt->bind_result($nom_entreprise);
$stmt->fetch();
$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche de Candidats</title>
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
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
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
        <a href="publier_offre.php">Publier une offre d'emploi</a>
        <!-- Ajout du lien vers la page de recherche de candidats -->
        <a href="recherche_candidats.php">Rechercher des candidats</a>
    </div>
    <div class="container">
        <h1>Bienvenue dans l'espace employeur de <?php echo $nom_entreprise; ?></h1>
        <form method="post" action="traitement_recherche_candidats.php">
            <label for="nom_candidat">Nom du candidat :</label>
            <input type="text" name="nom_candidat">

            <label for="experience">Expérience (en années) :</label>
            <input type="number" name="experience" min="0">

            <input type="submit" value="Rechercher des candidats">
        </form>
    </div>
</body>
</html>
