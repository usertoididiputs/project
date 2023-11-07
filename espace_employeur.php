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
<body>
    <div class="container">
        <a href="deconnexion.php" class="btn-deconnexion">Déconnexion</a>
        <h1>Bienvenue dans votre espace employeur</h1>
        <div class="info">
            <p><strong>Nom de l'entreprise:</strong> <?php echo $_GET['nom_entreprise']; ?></p>
            <p><strong>Email :</strong> <?php echo $_GET['email_entreprise']; ?></p>
            <p><strong>Secteur d'activité :</strong> <?php echo $_GET['secteur_activite']; ?></p>
            <p><strong>Adresse :</strong> <?php echo $_GET['adresse']; ?></p>
            <p><strong>Numéro de Téléphone :</strong> <?php echo $_GET['telephone']; ?></p>
            <!-- Ajoutez plus d'informations ici -->
        </div>
    </div>
</body>
</html>
