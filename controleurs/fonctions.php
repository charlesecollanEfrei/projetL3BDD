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

	require_once('../../modeles/bd.php');
	require_once('../../modeles/promo.php');
	require_once('../../modeles/ue.php');
	require_once('../../modeles/enseignant.php');

	function listePromo()
	{
		$bd = new bd();
		$co = $bd->connexion();

		$promo = new promo($co);

		$tableauPromo = $promo->tableauPromo();

		foreach ($tableauPromo as $value) {
			echo $value;
			echo "<br/>";
		}

		$bd->deconnexion();
	}




	function listeUe()
	{
		$bd = new bd();
		$co = $bd->connexion();

		$ue = new ue($co);

		$tableauUe = $ue->tableauUe();

		foreach ($tableauUe as $value) {
			echo $value;
			echo "<br/>";
		}

		$bd->deconnexion();
	}




	function listeEnseignant()
	{
		$bd = new bd();
		$co = $bd->connexion();

		$enseignant = new enseignant($co);
		$tableauEnseignant = $enseignant->tableauEnseignants();

		foreach ($tableauEnseignant as $cle1 => $valeur1) {
			foreach ($valeur1 as $cle2 => $valeur2) {
				echo  $valeur2;
			}
			echo "<br/>";
		}

		$bd->deconnexion();
	}




	function afficherInfoEnseignant($idEnseignant)
	{
		$bd = new bd();
		$co = $bd->connexion();

		$enseignant = new enseignant($co);
		list($nomEnseignant, $prenomEnseignant, $emailEnseignant, $password) = $enseignant->infoEnseignant($idEnseignant);

		$bd->deconnexion();

		return array ($nomEnseignant, $prenomEnseignant, $emailEnseignant, $password);
	}

	function afficherInfoEleve($matricule)
	{
		$bd = new bd();
		$co = $bd->connexion();

		$eleve = new eleve($co);
		list($nom, $prenom, $date_naissance, $ville_naissance, $pays_naissance, $sexe, $date_inscription, $etablissement, $num_rue, $nom_rue, $code_postal, $ville, $tel_domicile, $tel_mobile, $nom_medecin, $prenom_medecin, $tel_medecin, $vaccinations, $allergies, $remarques_medicales) = $eleve->infoEleve($matricule);

		$bd->deconnexion();

		return array($nom, $prenom, $date_naissance, $ville_naissance, $pays_naissance, $sexe, $date_inscription, $etablissement, $num_rue, $nom_rue, $code_postal, $ville, $tel_domicile, $tel_mobile, $nom_medecin, $prenom_medecin, $tel_medecin, $vaccinations, $allergies, $remarques_medicales);
	}

?>