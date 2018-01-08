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
	require_once('../modeles/eleve.php');
	// On vérifie si les champs ne sont pas vides, sinon on renvoie vers la page de connexion avec un message d'erreur
	if (!isset($_POST['nom'])
		|| !isset($_POST['prenom'])
		|| !isset($_POST['date_naissance'])
		|| !isset($_POST['pays_naissance'])
		|| !isset($_POST['ville_naissance'])
		|| !isset($_POST['sexe'])
		|| !isset($_POST['etablissement'])
		|| !isset($_POST['num_rue'])
		|| !isset($_POST['nom_rue'])
		|| !isset($_POST['code_postal'])
		|| !isset($_POST['ville'])
		|| !isset($_POST['tel_domicile'])
		|| !isset($_POST['tel_mobile'])
		|| !isset($_POST['nom_medecin'])
		|| !isset($_POST['prenom_medecin'])
		|| !isset($_POST['tel_medecin'])
		|| !isset($_POST['allergie'])
		|| !isset($_POST['vaccinations'])
		|| !isset($_POST['remarques_medicales'])
		|| !isset($_POST['nom_promo'])
	) {
		header("refresh=2;url=../vues/administrateur/");
		echo 'Il manque des informations';
		exit;
	} else {
		$nom = $_POST['nom'];
		$prenom = $_POST['prenom'];
		$date_naissance = date("Y-m-d", strtotime($_POST['date_naissance']));
		$pays_naissance = $_POST['pays_naissance'];
		$ville_naissance = $_POST['ville_naissance'];
		$sexe = $_POST['sexe'];
		$date_inscription = date("Y-m-d");
		$etablissement_precedent = $_POST['etablissement'];
		$num_rue = $_POST['num_rue'];
		$nom_rue = $_POST['nom_rue'];
		$code_postal = $_POST['code_postal'];
		$ville = $_POST['ville'];
		$tel_domicile = $_POST['tel_domicile'];
		$tel_mobile = $_POST['tel_mobile'];
		$email = strtolower($prenom) . "." .  strtolower($nom) . "@darltin.com";

		$nom_medecin = $_POST['nom_medecin'];
		$prenom_medecin = $_POST['prenom_medecin'];
		$tel_medecin = $_POST['tel_medecin'];
		$allergies = $_POST['allergie'];
		$vaccinations = $_POST['vaccinations'];
		$remarques_medicales = $_POST['remarques_medicales'];
		$photo = "";
		$password = "azerty";
		$nom_promo = $_POST['nom_promo'];
		// On se connecte à la base de données
		$bd = new bd();
		$co = $bd->connexion();
		new eleve(
			$co,
			$nom,
			$prenom,
			$date_naissance,
			$ville_naissance,
			$pays_naissance,
			$sexe,
			$date_inscription,
			$etablissement_precedent,
			$num_rue,
			$nom_rue,
			$code_postal,
			$ville,
			$tel_domicile,
			$tel_mobile,
			$email,
			$nom_medecin,
			$prenom_medecin,
			$tel_medecin,
			$vaccinations,
			$allergies,
			$remarques_medicales,
			$photo,
			$password
		);
		$bd->deconnexion();
		header('Location: ../index.php');
		exit;
	}
?>