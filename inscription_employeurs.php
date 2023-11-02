<!DOCTYPE html>
<html>
<head>
    <title>Inscription Candidat</title>
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
        input[type="password"],
        select {
            width: 95%; /* Réduction de la largeur */
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="file"] {
            width: 95%; /* Réduction de la largeur */
            margin: 10px 0;
        }
        select {
            width: 95%; /* Réduction de la largeur */
            padding: 10px;
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Inscription Candidat</h1>
        <form method="post" action="traitement_inscription_candidat.php" enctype="multipart/form-data">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required>
            
            <label for="prenom">Prénom :</label>
            <input type="text" name="prenom" required>
            
            <label for="email">Email :</label>
            <input type="email" name="email" value="" required>
            
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" value="" required>
            
            <label for="cv">CV (joindre un fichier) :</label>
            <input type="file" name="cv" accept=".pdf, .doc, .docx">
            
            <label for="competences">Compétences :</label>
            <select name="competences">
                <option value=""></option>
                <option value="JAVA">JAVA</option>
                <option value="C#">C#</option>
                <option value="PHP">PHP</option>
                <option value="C++">C++</option>
                <option value="JAVASCRIPT">JAVASCRIPT</option>
            </select>
            
            <label for="experiences">Expérience professionnelle :</label>
            <select name="experiences">
                <option value=""></option>
                <?php
                for ($i = 1; $i <= 20; $i++) {
                    echo "<option value='$i'>$i</option>";
                }
                ?>
            </select>
            
            <input type="submit" value="S'inscrire">
        </form>
    </div>
</body>
</html>