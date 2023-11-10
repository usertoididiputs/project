<?php
$mysqli = new mysqli("localhost", "root", "", "can_emp");

if ($mysqli->connect_error) {
    die("Échec de la connexion à la base de données : " . $mysqli->connect_error);
}

$id_employeur = 1; // Remplacez par l'ID de l'employeur dont vous voulez afficher les informations.

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
<html>
<head>
    <title>Espace Employeur</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .info {
            margin-top: 20px;
        }
        .info p {
            margin: 5px 0;
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
        <form method="post" action="deconnexion.php">
            <input type="submit" value="Déconnexion">
        </form>
    </div>
</body>
</html>
