<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->

<?php

	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	require_once('../modeles/bd.php');
	require_once('../modeles/ue.php');

	// On vérifie si les champs ne sont pas vides, sinon on renvoie vers la page de connexion avec un message d'erreur
	if (!isset($_POST['nom_ue']) || !isset($_POST['coefficient'])) {
		header("refresh=2;url=../vues/administrateur/"); // A COMPLETER
		echo 'Il manque des informations';
		exit;
	} else {

		$nom_ue = $_POST['nom_ue'];
		$coefficient = $_POST['coefficient'];


		// On se connecte à la base de données
		$bd = new bd();
		$co = $bd->connexion();

		new ue(
			$co,
			$nom_ue,
			$coefficient
		);

		$bd->deconnexion();

		header('Location: ../index.php');
		exit;
	}

?>