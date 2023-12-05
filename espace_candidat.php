<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Candidat</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f2f2f2;
            margin: 0;
            color: #333;
        }

        .header {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
            color: #fff;
            position: relative;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            position: relative;
            margin: 20px auto;
            text-align: left;
            animation: fadeIn 0.8s ease-out, moveUp 0.8s ease-out;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .info {
            text-align: left;
        }

        .info p {
            margin: 10px 0;
            font-size: 16px;
        }

        .menu {
            position: absolute;
            top: 10px;
            right: 10px;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            margin-left: 10px;
            font-size: 16px;
            padding: 5px;
            border-radius: 3px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #0056b3;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes moveUp {
            from {
                transform: translateY(20px);
            }
            to {
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="menu">
            <a href="#">Accueil</a>
            <a href="modifier_candidat.php">Modifier</a>
            <a href="deconnexion.php">Déconnexion</a>
        </div>
        <h1>Bienvenue dans votre espace candidat</h1>
    </div>
    <div class="container">
        <div class="info">
            <p><strong>Nom :</strong> <?php echo htmlspecialchars($_GET['nom']); ?></p>
            <p><strong>Prénom :</strong> <?php echo htmlspecialchars($_GET['prenom']); ?></p>
            <p><strong>Email :</strong> <?php echo htmlspecialchars($_GET['email']); ?></p>
            <!-- Ajoutez plus d'informations ici -->
        </div>
    </div>
</body>
</html>
