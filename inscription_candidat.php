<!DOCTYPE html>
<html>
<head>
    <title>Inscription Candidat</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        h1 {
            color: #333;
        }
        form {
            width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
        label {
            display: block;
            margin: 10px 0;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 5px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="file"] {
            width: 100%;
            margin: 5px 0;
        }
        select {
            width: 100%;
        }
        input[type="submit"] {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <h1>Inscription Candidat</h1>
    <form method="post" action="traitement_inscription_candidat.php" enctype="multipart/form-data">
        <label for="nom">Nom :</label>
        <input type="text" name="nom" required><br>
        
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" required><br>
        
        <label for="email">Email :</label>
        <input type="email" name="email" value="" required><br>
        
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" value="" required><br>
        
        <label for="cv">CV (joindre un fichier) :</label>
        <input type="file" name="cv" accept=".pdf, .doc, .docx"><br>
        
        <label for="competences">Compétences :</label>
        <select name="competences">
            <option value=""></option>
            <option value="JAVA">JAVA</option>
            <option value="C#">C#</option>
            <option value="PHP">PHP</option>
            <option value="C++">C++</option>
            <option value="JAVASCRIPT">JAVASCRIPT</option>
        </select><br>
        
        <label for="experiences">Expérience professionnelle :</label>
        <select name="experiences">
            <option value=""></option>
            <?php
            for ($i = 1; $i <= 20; $i++) {
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select><br>
        
        <input type="submit" value="S'inscrire">
    </form>
</body>
</html>