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
	require_once('../modeles/enseigne.php');
	
	if(!isset($_POST['nom_ue']) || !isset($_POST['id_enseignant'])) {
		header('Location: /index.php');
		exit;
	}else{
		$nom_ue = $_POST['nom_ue'];
		$enseignant = $_POST['id_enseignant'];
		$bd = new bd();
		$co = $bd->connexion();

		$resultat = mysqli_query($co, "SELECT * FROM matiere WHERE nom_ue = '" . $nom_ue . "'");
		while($row = mysqli_fetch_row($resultat)) {
			new enseigne($co, $enseignant, $row[0]);
		}
		$bd->deconnexion();
		header('Location: /index.php');
		exit;
	}
?>