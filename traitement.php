<link rel="stylesheet" href="assets/css/style.css">
<?php
	require_once 'config/database.php';
	$id="";$nom="";$prenom="";$fil="";

	if(isset($_GET['task']) && $_GET['task'] == 'supp'){
    			$db->query('DELETE FROM stock WHERE id = "'.$_GET['key'].'"');
    			$caption="Etudiants supprimé avec succès !";
	}

	$filieres = $db->query("SELECT * FROM filieres");
	$reqe=$db->query('SELECT *FROM etudiants');

?>
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