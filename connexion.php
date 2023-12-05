<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #3498db;
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
        .container:hover {
            transform: scale(1.02);
        }
        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        p {
            color: #7f8c8d;
        }
        a {
            text-decoration: none;
            color: #fff;
        }
        .button {
            display: inline-block;
            background-color: #3498db;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            margin: 10px;
            text-align: center;
            font-size: 16px;
        }
        .button:hover {
            background-color: #2980b9;
        }
        .login-form {
            margin-top: 20px;
        }
        .login-form h2 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .login-form input {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .login-form input[type="text"]:focus,
        .login-form input[type="email"]:focus,
        .login-form input[type="password"]:focus {
            border-color: #3498db;
        }
        .login-form input[type="submit"] {
            background-color: #3498db;
            color: #fff;
            padding: 15px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 18px;
        }
        .login-form input[type="submit"]:hover {
            background-color: #2980b9;
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
