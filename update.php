<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js//script.js"></script>
<?php
require_once 'config/database.php';

$id = $_GET['id'];
$etudiant = $db->query("SELECT * FROM etudiants WHERE id = $id")->fetch();
$filieres = $db->query("SELECT * FROM filieres");

if($_POST) {
    $db->query("UPDATE etudiants SET nom='{$_POST['nom']}', prenom='{$_POST['prenom']}', filiere_id='{$_POST['fil']}' WHERE id=$id");
    header('Location: index.php');
}
?>
<div class="container">
    <div id="BE">
        <h2>Mofification Etudiant</h2><br>

        <form method="POST">
            <input name="nom" value="<?= $etudiant['nom'] ?>">
            <input name="prenom" value="<?= $etudiant['prenom'] ?>">
            <select name="fil">
                <?php while($f = $filieres->fetch()): ?>
                    <option value="<?= $f['id'] ?>" <?= $f['id']==$etudiant['filiere_id']?'selected':'' ?>><?= $f['nom'] ?></option>
                <?php endwhile; ?>
            </select>
            <input type="submit" value="modifier">
            <a href="index.php">Annuler</a>
        </form>
    </div>
</div>