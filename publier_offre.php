<?php
// Assurez-vous que la session est démarrée
session_start();

// Vérifiez si l'employeur est connecté
if (!isset($_SESSION['id_employeur'])) {
    // L'employeur n'est pas connecté, redirigez vers la page de connexion
    header("Location: connexion.php");
    exit;
}

// Vous pouvez inclure ici votre code de connexion à la base de données
// ...

// Traitement du formulaire de publication d'offre
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérez les données du formulaire et effectuez le traitement nécessaire
    $titre_offre = $_POST["titre_offre"];
    $description_offre = $_POST["description_offre"];

    // Enregistrez les données dans la base de données
    // ...

    // Redirigez vers la page des offres après la publication
    header("Location: offres.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publier une offre</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 400px;
            text-align: center;
            transition: transform 0.3s;
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
        textarea {
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
    <div class="container">
        <h1>Publier une offre</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="titre_offre">Titre de l'offre :</label>
            <input type="text" name="titre_offre" required>

            <label for="description_offre">Description de l'offre :</label>
            <textarea name="description_offre" rows="4" required></textarea>

            <input type="submit" value="Publier l'offre">
        </form>
    </div>
</body>
</html>
