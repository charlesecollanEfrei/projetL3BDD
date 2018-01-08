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
	require_once('../modeles/enseignant.php');
	// On vérifie si les champs ne sont pas vides, sinon on renvoie vers la page de connexion avec un message d'erreur

	if (!isset($_POST['nom_enseignant']) || !isset($_POST['prenom_enseignant'])) {
		header("refresh=2;url=../vues/administrateur/"); // A COMPLETER
		echo 'Il manque des informations';
		exit;
	} else {

		$nom_enseignant = $_POST['nom_enseignant'];
		$prenom_enseignant = $_POST['prenom_enseignant'];
		// Génère une adresse du type prenom.nom@darltin.com comme pour efrei
		$email_enseignant = strtolower($prenom_enseignant) . "." . strtolower($nom_enseignant) . "@darltin.com";
		$password = "azerty"; // random generated password + tard

		// On se connecte à la base de données
		$bd = new bd();
		$co = $bd->connexion();
		new enseignant(
			$co,
			$nom_enseignant,
			$prenom_enseignant,
			$email_enseignant,
			$password
		);
		$bd->deconnexion();
		header('Location: ../index.php');
		exit;
	}
?>