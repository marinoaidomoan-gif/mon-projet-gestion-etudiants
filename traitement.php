<link rel="stylesheet" href="assets/css/style.css">
<?php
	require_once 'config/database.php';
	$id="";$nom="";$prenom="";$fil="";

	if(isset($_GET['task']) && $_GET['task'] == 'supp'){
    			$db->query('DELETE FROM etudiants WHERE id = "'.$_GET['key'].'"');
    			$caption="Etudiants supprimé avec succès !";
	}

    if(isset($_GET['task']) && $_GET['task'] == 'modif'){
		$etudiants_id = $_GET['key'];
		$req = $db->query("SELECT * FROM etudiants WHERE id = '$etudiants_id'");
		$row = $req->fetch();
    
		$nom = $row['nom'];
		$prenom = $row['prenom'];
		$fil = $row['filiere_id'];
	}


	$filieres = $db->query("SELECT * FROM filieres");
	$reqe=$db->query('SELECT *FROM etudiants');

?>
<?php
    echo'<div class="table-container">';
    
	echo'<table border="1" width="1000">';
    echo'<h2>Traitements des Etudiants</h2><br>';
	if($reqe->rowcount() != 0){
		echo'<tr><th>Nom</th><th>Prenom</th><th>id Filiere</th><th colspan="2">Action</th></tr>';
		while($dt=$reqe->fetch()){
			echo'<tr>';
			echo'<td>'.$dt['nom'].'</td>';
			echo'<td>'.$dt['prenom'].'</td>';
			echo'<td>'.$dt['filiere_id'].'</td>';
			echo '<td class="btn-supprimer"><a href="index.php?task=supp&key='.$dt['id'].'" onclick="return confirmSuppression()">supprimer</a></td>';
            echo '<td class="btn-modifier"><a href="update.php?id='.$dt['id'].'">modifier</a></td>';
			echo'</tr>';
		}
	}else{
		echo'<tr><td height="50" align="center">Votre tableau est vide</td></tr>';
	}
	echo'</table>';
    echo'</div>';
?>