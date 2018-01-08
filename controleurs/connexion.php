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
	require_once('../modeles/administrateur.php');
	require_once('../modeles/eleve.php');
	require_once('../modeles/enseignant.php');

	// On vérifie si les champs ne sont pas vides, sinon on renvoie vers la page de connexion avec un message d'erreur
	if (!isset($_POST['identifiant']) || !isset($_POST['password'])) {
		header("refresh=1;url=../vues/login.php");
		echo 'Il manque des informations';
		exit;
	} else {
		$identifiant = $_POST['identifiant'];
		$password = $_POST['password'];
		$role = $_POST['role'];

		// On se connecte à la base de données
		$bd = new bd();
		$co = $bd->connexion();

		// Verification
		switch($role) {
			case 1:
				$resultat = mysqli_query($co, "SELECT email FROM eleve WHERE email = '$identifiant' AND password='$password'");
				if(mysqli_num_rows($resultat) > 0) {
					$membre = new eleve($co, $identifiant);
				}else{
					header("refresh=2;url=../vues/login.php");
					echo 'Vous n etes pas dans la base de donnees en tant qu eleve';
					exit;
				}

				break;
			case 2:
				$resultat = mysqli_query($co, "SELECT email_enseignant FROM enseignant WHERE email_enseignant = '$identifiant' AND password='$password");
				if(mysqli_num_rows($resultat) > 0){
					$membre = new enseignant($co, $identifiant);
				}else{
					header("refresh=2;url=../vues/login.php");
					echo 'Vous n etes pas dans la base de donnees en tant qu enseignant';
					exit;
				}
				break;

			case 3:
				$resultat = mysqli_query($co, "SELECT email_admin FROM administrateur WHERE email_admin = '$identifiant' AND password='$password'");
				if(mysqli_num_rows($resultat) > 0) {
					$membre = new administrateur($co, $identifiant);
				}else{
					header("refresh=2;url=../vues/login.php");
					echo 'Vous n etes pas dans la base de donnees en tant qu administrateur';
					exit;
				}
				break;
			default:
				header('Location: ../index.php');
				exit;
		}
		$membre->connexion();
		$_SESSION['membre'] = $membre;

		$bd->deconnexion();

		header('Location: ../index.php');
		exit;
	}

?>