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
	require_once("../modeles/epreuve.php");

	if(!isset($_POST['nom_matiere']) || !isset($_POST['nom_epreuve']) || !isset($_POST['date_epreuve']) || !isset($_POST['coefficient_epreuve'])) {
		header('Location: /index.php');
		exit;
	}else {
		$nom_matiere = $_POST['nom_matiere'];
		$nom_epreuve = $_POST['nom_epreuve'];
		$date_epreuve = date("Y-m-d", strtotime($_POST['date_epreuve']));
		$coefficient_epreuve = $_POST['coefficient_epreuve'];

		$bd = new bd();
		$co = $bd->connexion();

		new epreuve($co, $nom_epreuve, $date_epreuve, $coefficient_epreuve, $nom_matiere);
		header('Location: /index.php');
		exit;
	}
?>