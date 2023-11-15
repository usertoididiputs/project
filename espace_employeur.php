<!DOCTYPE html>
<html>
<head>
    <title>Inscription Employeur</title>
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
        label {
            display: block;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 95%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        #emailError {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Inscription Employeur</h1>
        <form method="post" action="traitement_inscription_employeur.php">
            <label for="nom_entreprise">Nom de l'entreprise :</label>
            <input type="text" name="nom_entreprise" required autocomplete="off">
            
            <label for="email_entreprise">Email de l'entreprise :</label>
            <input type="email" name="email_entreprise" required autocomplete="off">
            <span id="emailError"></span>
            
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required autocomplete="off">
            
            <label for="secteur_activite">Secteur d'activité :</label>
            <input type="text" name="secteur_activite" required autocomplete="off">
            
            <label for="adresse">Adresse :</label>
            <input type="text" name="adresse" required autocomplete="off">
            
            <label for="telephone">Numéro de téléphone :</label>
            <input type="text" name="telephone" required autocomplete="off">
            
            <input type="submit" value="S'inscrire">
        </form>
    </div>

    <script>
        const emailInput = document.querySelector('input[name="email_entreprise"]');
        const emailError = document.getElementById('emailError');

        emailInput.addEventListener('input', function () {
            const email = emailInput.value;
            if (!isValidEmail(email)) {
                emailError.textContent = 'Adresse e-mail invalide';
            } else {
                emailError.textContent = '';
            }
        });

        function isValidEmail(email) {
            const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            return emailPattern.test(email);
        }
    </script>
</body>
</html>
