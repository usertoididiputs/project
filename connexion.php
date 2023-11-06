<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
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
            text-align: center;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        a {
            text-decoration: none;
        }
        .button {
            display: block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 10px;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .login-form {
            margin-top: 20px;
        }
        .login-form input {
            width: 100%;
            padding: 8px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Connexion</h1>
        <p>Êtes-vous un candidat ou un employeur ?</p>
        <a href="inscription_candidat.php" class="button">Candidat</a>
        <a href="inscription_employeur.php" class="button">Employeur</a>
        <div class="login-form">
            <h2>Formulaire de connexion</h2>
            <form method="post" action="traitement_connexion.php">
                <label for="email">Email :</label>
                <input type="email" name="email" required>
                
                <label for="mot_de_passe">Mot de passe :</label>
                <input type="password" name="mot_de_passe" required>
                
                <input type="submit" value="Se connecter">
            </form>
        </div>
    </div>
</body>
</html>