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

        .menu {
            background-color: #333;
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
            background-color: #555;
        }
/*0 à 1 année d’expérience
2 à 4 années d’expérience
 5 à 9 années d’expérience
plus de 10 ans d’expérience*/
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
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        label {
            flex-basis: 48%;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="reset"] {
            background-color: #ff9800;
            margin-left: 10px;
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
    <div class="menu">
        <!-- Ajoutez vos liens de menu ici -->
    </div>
    <div class="container">
        <h1>Bienvenue dans notre site</h1>
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
            // Affichez les résultats de la recherche
            if (!empty($resultats)) {
                echo "<h2>Résultats de la recherche</h2>";
                echo "<div class='resultats'>";
                foreach ($resultats as $resultat) {
                    echo "<div class='candidat'>";
                    echo "<p><strong>Nom:</strong> " . $resultat['nom'] . "</p>";
                    echo "<p><strong>Prénom:</strong> " . $resultat['prenom'] . "</p>";
                    echo "<p><strong>Email:</strong> " . $resultat['email'] . "</p>";
                    echo "<p><strong>CV:</strong> <a href='{$resultat['cv']}' target='_blank'>Télécharger le CV</a></p>";
                    echo "<p><strong>Compétences:</strong> " . $resultat['competences'] . "</p>";
                    echo "<p><strong>Expériences professionnelles:</strong> " . $resultat['experiences_professionnelles'] . " années</p>";
                    echo "<p><strong>Disponibilité:</strong> " . $resultat['disponibilite'] . "</p>";
                    echo "<p><strong>Fourchette Salariale:</strong> " . $resultat['fourchette_salariale'] . " k€</p>";
                    echo "<p><strong>Langues:</strong> " . $resultat['langues'] . "</p>";
                    echo "</div>";
                }
                echo "</div>";
            }
            ?>
        </div>

        <script>
            function resetForm() {
                // Réinitialise le formulaire
                document.getElementById("rechercheForm").reset();
                // Cache la section des résultats
                document.querySelector(".resultats-container").style.display = 'none';
            }
        </script>
    </div>
</body>
</html>
