<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employeur</title>
    <style>
        /* Styles de base */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        /* Menu */
        .menu {
            background-color: #0275d8;
            padding: 10px;
            text-align: center;
        }

        .menu a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            margin: 0 8px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .menu a:hover {
            background-color: #025aa5;
        }

        /* Conteneur principal */
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Formulaire */
        form {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        form label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        form input[type="text"],
        form input[type="range"],
        form select,
        form input[type="submit"],
        form input[type="reset"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Boutons */
        input[type="submit"],
        input[type="reset"] {
            cursor: pointer;
            border: none;
            outline: none;
            background-color: #5cb85c;
            color: white;
        }

        input[type="reset"] {
            background-color: #d9534f;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            opacity: 0.8;
        }

        /* Section des résultats */
        .resultats-container {
            margin-top: 20px;
        }

        .candidat {
            background-color: #ecf0f1;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .candidat:hover {
            background-color: #d1d8db;
        }

        /* Responsive */
        @media (max-width: 768px) {
            form {
                grid-template-columns: 1fr;
            }
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
            <input type="reset" value="Réinitialiser" onclick="resetForm()">
        </form>

        <div class="resultats-container">
            <!-- Les résultats de la recherche seront affichés ici -->
        </div>
    </div>
    <script>
        function resetForm() {
            document.getElementById("rechercheForm").reset();
            document.querySelector(".resultats-container").style.display = 'none';
        }

        document.getElementById("rechercheForm").addEventListener("submit", function(event) {
            var isValid = true;
            var rechercheGlobale = document.forms["rechercheForm"]["recherche_globale"].value;
            if (rechercheGlobale == "") {
                alert("Le champ 'Compétences' ne peut pas être vide.");
                isValid = false;
            }

            if (isValid) {
                this.submit();
            } else {
                event.preventDefault();
            }
        });
    </script>
</body>

</html>
