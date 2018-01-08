<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php
	include("modeles/administrateur.php");
	include("modeles/eleve.php");
	include("modeles/enseignant.php");
	session_start();
	if(!isset($_SESSION['membre'])) {
		header("Location: vues/login.php");
	}else {
		$membre = $_SESSION['membre'];
		switch($membre->getRole()) {
			case "eleve" :
				header('Location: vues/eleve/dashboard.php');
				break;
			case "admin" :
				header("Location: vues/administrateur/dashboard.php");
				break;
			case "enseignant" :
				header('Location: vues/enseignant/dashboard.php');
				break;
		}
		echo 'Déjà connecté';
	}
?>
