<!DOCTYPE html>
<html>
<head>
    <title>Espace Candidat</title>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue dans votre espace candidat</h1>
        <div class="info">
            <p><strong>Nom :</strong> <?php echo $_GET['nom']; ?></p>
            <p><strong>Prénom :</strong> <?php echo $_GET['prenom']; ?></p>
            <p><strong>Email :</strong> <?php echo $_GET['email']; ?></p>
            <!-- Ajoutez plus d'informations ici -->
        </div>
    </div>
</body>
</html>