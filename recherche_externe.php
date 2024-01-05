<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employeur</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        h1 {
            color: #3498db;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="range"] {
            width: 100%;
            padding: 8px;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .resultats-container {
            margin-top: 20px;
        }

        h2 {
            color: #333;
        }

        .resultats {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .candidat {
            flex-basis: 48%;
            margin: 10px 0;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: left;
        }

        .candidat p {
            margin: 8px 0;
        }

        a {
            color: #3498db;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue dans notre site</h1>
        <form id="rechercheForm" method="post" action="recherche_candidats.php">
            <label for="recherche_globale">Compétences (séparées par des virgules) :</label>
            <input type="text" name="recherche_globale">

            <label for="experience">Expérience minimale (en années) :</label>
            <input type="range" name="experience" min="0" max="10" step="1" value="0">
            <output for="experience">0</output>

            <input type="submit" name="trouver_profil" value="Rechercher">
        </form>

        <!-- Section des résultats -->
        <div class="resultats-container">
            <?php
            // Affichez les résultats de la recherche ici
            ?>
        </div>
    </div>

    <script>
        // Mise à jour de la valeur de l'expérience en temps réel
        const experienceInput = document.querySelector('input[name="experience"]');
        const experienceOutput = document.querySelector('output[for="experience"]');
        
        experienceInput.addEventListener('input', function() {
            experienceOutput.textContent = this.value;
        });
    </script>
</body>
</html>
