<?php
    $id="";$nom="";$prenom="";$fil="";
    $db = new PDO('mysql:host=127.0.0.1;dbname=gestion_etudiants', 'root', '');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if(isset($_POST['btn']) && $_POST['btn']=="ajouter"){
		$db->query('INSERT INTO etudiants(nom,prenom,filiere_id) VALUES("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['fil'].'")');
	}

    $filieres = $db->query("SELECT * FROM filieres");
?>
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

        <form action="index.php" method="POST">
            <input type="hidden" name="id">
            <input type="text" placeholder="Nom" name="nom" value="<?=$nom ?>"><br>
            <input type="text" placeholder="Prenom" name="prenom" value="<?=$prenom ?>"><br>
            <select name="fil" id="">
                <option selected disabled value="">filter_id</option>
                <?php while($row = $filieres->fetch()): ?>
			        <option value="<?= $row['id'] ?>"><?= $row['nom'] ?></option>
		        <?php endwhile; ?>
            </select><br>
            <input type="submit" name="btn" value="ajouter">
        </form>
    </div>
</body>
</html>