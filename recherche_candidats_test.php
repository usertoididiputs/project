<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employeur</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #333;
            color: white;
            text-align: center;
            padding: 20px 10px;
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
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: all 0.3s ease;
        }

        form:hover {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #3498db;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s;
        }

        input[type="reset"] {
            background-color: #ff9800;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            opacity: 0.9;
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
            margin-bottom: 20px;
            padding: 15px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: box-shadow 0.3s;
        }

        .candidat:hover {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        .candidat p {
            margin: 5px 0;
        }

        a {
            color: #3498db;
            text-decoration: none;
            transition: color 0.3s;
        }

        a:hover {
            color: #1a8cd8;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bienvenue dans l'espace employeur</h1>
    </div>
    <div class="container">
        <h1>Résultats de la recherche</h1>
        <form id="rechercheForm" method="post" action="recherche_candidats.php">
            <label for="recherche_globale">Compétences :</label>
            <input type="text" name="recherche_globale">

            <label for="id_candidat">ID Candidat :</label>
            <input type="text" name="id_candidat">

            <label for="disponibilite">Disponibilité :</label>
            <input type="text" name="disponibilite">

            <label for="niveau_etude">Niveau d'études :</label>
            <input type="text" name="niveau_etude">

            <label for="langue">Langue :</label>
            <input type="text" name="langue">

            <input type="submit" name="trouver_profil" value="Trouver un profil">
            <input type="reset" value="Réinitialiser" onclick="resetForm()">
        </form>

        <!-- Section des résultats -->
        <div class="resultats-container">
            <?php
            // Affichez les résultats de la recherche ici
            ?>
        </div>
    </div>

    <script>
        function resetForm() {
            document.getElementById("rechercheForm").reset();
            document.querySelector(".resultats-container").style.display = 'none';
        }
    </script>
</body>
</html>
