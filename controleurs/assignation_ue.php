<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->

<?php
	require_once('../modeles/bd.php');
	require_once('../modeles/etudie.php');
	if(!isset($_POST['nom_promo']) || !isset($_POST['nom_ue'])) {
		header('Location: /index.php');
		echo "Il manque des informations";
		exit;
	}else{
		$nom_ue = $_POST['nom_ue'];
		$nom_promo = $_POST['nom_promo'];
		$bd = new bd();
		$co = $bd->connexion();
		$resultat = mysqli_query($co, "SELECT * FROM eleve WHERE nom_promo = '" . $nom_promo . "'");
		while($row = mysqli_fetch_row($resultat)) {
			new etudie($co, $row[0], $this->nom_ue);
		}
		header('Location: /index.php');
		$bd->deconnexion();
	}
?>