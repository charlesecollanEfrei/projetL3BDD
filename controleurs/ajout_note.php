<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->

<?php
	require_once("../modeles/bd.php");
	require_once("../modeles/passe.php");

	if(!isset($_POST['id_eleve']) || !isset($_POST['nom_epreuve']) || !isset($_POST['note_epreuve'])) {
		header('Location: /index.php');
		exit;
	}else {
		$matricule = $_POST['id_eleve'];
		$nom_epreuve = $_POST['nom_epreuve'];
		$note_epreuve = $_POST['note_epreuve'];

		$bd = new bd();
		$co = $bd->connexion();

		new passe($co, $nom_epreuve, $matricule, $note_epreuve);
		header('Location: /index.php');
		exit;
	}
?>


