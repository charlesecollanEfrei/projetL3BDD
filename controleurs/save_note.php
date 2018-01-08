<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->

<?php
include('../modeles/bd.php');
if(isset($_POST['matricule']) && isset($_POST['epreuve']) && isset($_POST['new_note'])) {
	$bd = new bd();
	$co = $bd->connexion();
	$matricule = $_POST['matricule'];
	$nom_epreuve = $_POST['epreuve'];
	$new_note = $_POST['new_note'];
	mysqli_query($co, "UPDATE passe SET note = $new_note WHERE nom_epreuves = '$nom_epreuve' AND matricule = $matricule");
}
?>