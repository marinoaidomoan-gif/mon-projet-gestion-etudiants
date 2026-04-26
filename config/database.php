<?php
	try {
		$db = new PDO('mysql:host=127.0.0.1;dbname=gestion_etudiants', 'root', '');
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
	} catch(PDOException $e) {
		// En cas d'erreur, afficher un message et arrêter le script
		die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>