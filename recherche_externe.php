<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employeur</title>
    <style>
        /* Styles de base */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        /* Menu */
        .menu {
            background-color: #0275d8;
            padding: 15px 0;
            text-align: center;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            transition: color 0.3s, background-color 0.3s;
        }

        .menu a:hover {
            background-color: #025aa5;
            border-radius: 5px;
        }

        /* Conteneur principal */
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        /* Styles de titre */
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        /* Styles du formulaire */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form label {
            font-weight: 500;
        }

        form input[type="text"], form input[type="range"], form select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Styles des boutons */
        input[type="submit"], input[type="reset"] {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            color: white;
        }

        input[type="submit"] {
            background-color: #5cb85c;
        }

        input[type="reset"] {
            background-color: #d9534f;
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        input[type="reset"]:hover {
            background-color: #c9302c;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="#">Accueil</a>
        <a href="#">Recherche</a>
        <a href="#">Contact</a>
    </div>
    <div class="container">
        <h1>Bienvenue dans notre Espace Employeur</h1>
        <form id="rechercheForm" method="post" action="recherche_candidats.php">
            <label for="recherche_globale">Compétences :</label>
            <input type="text" name="recherche_globale">

            <label for="id_candidat">ID Candidat :</label>
            <input type="text" name="id_candidat">

            <label for="disponibilite">Disponibilité :</label>
            <input type="range" name="disponibilite" min="0" max="100" value="50">

            <label for="niveau_etude">Niveau d'études :</label>
            <input type="text" name="niveau_etude">

            <label for="langue">Langue :</label>
            <input type="text" name="langue">

            <label for="competences_cles">Compétences Clés :</label>
            <select name="competences_cles[]" multiple>
                <option value="communication">Communication</option>
                <option value="developpement_web">Développement Web</option>
                <!-- Ajoutez d'autres compétences clés ici -->
            </select>

            <input type="submit" name="trouver_profil" value="Trouver un profil">
            <input type="reset" value="Réinitialiser">
        </form>

        <div class="resultats-container">
            <!-- Les résultats de la recherche seront affichés ici -->
        </div>
    </div>
    <script>
        document.getElementById('rechercheForm').addEventListener('submit', function(event) {
            var rechercheGlobale = document.forms['rechercheForm']['recherche_globale'].value;
            if (rechercheGlobale.trim() === '') {
                alert("Le champ 'Compétences' ne peut pas être vide.");
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
