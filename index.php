<?php
	require_once 'config/database.php';
	$id="";$nom="";$prenom="";$fil="";

	if(isset($_POST['btn']) && $_POST['btn']=="ajouter"){
		$db->query('INSERT INTO etudiants(nom,prenom,filiere_id) VALUES("'.$_POST['nom'].'","'.$_POST['prenom'].'","'.$_POST['fil'].'")');
	}
	if(isset($_GET['task']) && $_GET['task'] == 'supp'){
    			$db->query('DELETE FROM stock WHERE id = "'.$_GET['key'].'"');
    			$caption="Etudiants supprimé avec succès !";
	}

	$filieres = $db->query("SELECT * FROM filieres");
	$reqe=$db->query('SELECT *FROM etudiants');

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
<?php
	echo'<table border="1" width="1000">';
	if($reqe->rowcount() != 0){
		echo'<tr><th>Nom</th><th>Prenom</th><th>id Filiere</th><th>&nbsp</th></tr>';
		while($dt=$reqe->fetch()){
			echo'<tr>';
			echo'<td>'.$dt['nom'].'</td>';
			echo'<td>'.$dt['prenom'].'</td>';
			echo'<td>'.$dt['filiere_id'].'</td>';
			echo'<td><a href="index.php?controller=etudiants&task=supp&key='.$dt['id'].'">supprimer</a></td>';
			echo'</tr>';
		}
	}else{
		echo'<tr><td height="50" align="center">Votre tableau est vide</td></tr>';
	}
	echo'</table>';
?>