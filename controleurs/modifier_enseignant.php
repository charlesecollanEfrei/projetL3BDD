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
	if (!isset($_POST['id']) || !isset($_POST['nom_enseignant']) || !isset($_POST['prenom_enseignant']) || !isset($_POST['email_enseignant'])) {
		header("refresh=2;url=../vues/administrateur/"); // A COMPLETER
		echo 'Il manque des informations';
		exit;
	} else {

		$id = $_POST['id'];
		$nom_enseignant = $_POST['nom_enseignant'];
		$prenom_enseignant = $_POST['prenom_enseignant'];
		$email_enseignant = $_POST['email_enseignant'];

		// On se connecte à la base de données
		$bd = new bd();
		$co = $bd->connexion();

		$enseignant = new enseignant($co);
		$enseignant->modifierEnseignant($id, $nom_enseignant, $prenom_enseignant, $email_enseignant);

		$bd->deconnexion();

		header('Location: ../index.php');
		exit;
	}

?>