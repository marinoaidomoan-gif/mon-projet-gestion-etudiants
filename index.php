<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Etudiants</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js//script.js"></script>
</head>
<body>
    <div id="BE">
        <h2>Gestion des Etudiants</h2><br>

        <form action="traitement.php" method="POST">
            <input type="hidden" name="id">
            <input type="text" placeholder="Nom" name="nom"><br>
            <input type="text" placeholder="Prenom" name="prenom"><br>
            <select name="fil" id="">
                <option selected disabled value="">filter_id</option>
            </select><br>
            <input type="submit" name="btn" value="ajouter">
        </form>
    </div>
</body>
</html>