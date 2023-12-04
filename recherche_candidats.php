<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Espace Employeur</title>
    <style>
        /* Vos styles CSS ici */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .menu {
            background-color: #3498db;
            padding: 10px;
            width: 100%;
            text-align: center;
        }

        .menu a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }

        .container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            padding: 20px;
            width: 80%;
            text-align: center;
            transition: transform 0.3s;
            margin-top: 20px;
        }

        .container:hover {
            transform: scale(1.02);
        }

        h1 {
            text-align: center;
            color: #3498db;
        }

        .info {
            margin-top: 20px;
            text-align: left;
        }

        .info p {
            margin: 5px 0;
            color: #333;
        }

        input[type="submit"], input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s;
            display: block;
            margin: 20px auto;
        }

        input[type="submit"]:hover, input[type="reset"]:hover {
            background-color: #0056b3;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-top: 10px;
            color: #2c3e50;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        /* Style pour masquer la section des résultats par défaut */
        .resultats-container {
            display: none;
            margin-top: 20px;
        }

        /* Style pour les résultats */
        .resultats {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        .resultats th, .resultats td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .resultats th {
            background-color: #007bff;
            color: white;
        }

        .resultats tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .resultats tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="menu">
        <a href="accueil.php">Accueil</a>
        <a href="profil.php">Profil</a>
        <a href="offres.php">Offres</a>
        <a href="candidats.php">Candidats</a>
        <a href="deconnexion.php">Déconnexion</a>
        <a href="mes_offres.php">Mes Offres</a>

        <!-- Ajout du lien vers la page de publication d'offres -->
        <a href="publier_offre.php">Publier une offre d'emploi</a>
    </div>
    <div class="container">
        <h1>Bienvenue dans l'espace employeur de <?php echo $nom_entreprise; ?></h1>
        <form id="rechercheForm" method="post" action="recherche_candidats.php">
            <label for="nom_candidat">Nom du candidat :</label>
            <input type="text" name="nom_candidat">

            <label for="competence">Compétence :</label>
            <input type="text" name="competence">

            <label for="experience">Expérience (en années) :</label>
            <input type="number" name="experience" min="0">

            <input type="submit" value="Rechercher des candidats">
            <input type="reset" value="Réinitialiser" onclick="resetForm()">
        </form>

        <!-- Section des résultats -->
        <div class="resultats-container">
            <?php
            // Affichez les résultats de la recherche
            if (!empty($resultats)) {
                echo "<h2>Résultats de la recherche</h2>";
                echo "<table class='resultats'>";
                echo "<tr><th>Nom</th><th>Prénom</th><th>Email</th><th>CV</th><th>Compétences</th><th>Expériences professionnelles</th></tr>";
                foreach ($resultats as $resultat) {
                    echo "<tr>";
                    echo "<td>" . $resultat['nom'] . "</td>";
                    echo "<td>" . $resultat['prenom'] . "</td>";
                    echo "<td>" . $resultat['email'] . "</td>";
                    echo "<td>" . $resultat['cv'] . "</td>";
                    echo "<td>" . $resultat['competences'] . "</td>";
                    echo "<td>" . $resultat['experiences_professionnelles'] . " années</td>";
                    echo "</tr>";
                }
                echo "</table>";
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
