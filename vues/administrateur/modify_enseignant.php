<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php
	include("../../modeles/administrateur.php");
	session_start();
	if(!isset($_SESSION['membre']) || $_SESSION['membre']->getRole() != "admin") {
		header('Location: /index.php');
		exit;
	}

	include("../../controleurs/fonctions.php");
?>
<!DOCTYPE html>
<html>
	<?php include ("../../layout/header.php"); ?>
	<body>
		<div class="container">
			<h2>Gestion des enseignants</h2>

			<?php

				if (empty($_GET['ref'])){
					listeEnseignant();
				}else{
					$id = $_GET['ref'];
					list($nomEnseignant, $prenomEnseignant, $emailEnseignant, $pawword) = afficherInfoEnseignant($_GET['ref']);
			?>


			<form class="col s12" method="POST" action="../../controleurs/modifier_enseignant.php">
				<div class="row">
					<div class="input-field s12 m12">
						<input type="hidden" class="validate" id="id" name="id" value="<?php echo $id; ?>">
					</div>
					<div class="input-field s12 m12">
						<input type="text" class="validate" id="nom_enseignant" name="nom_enseignant" value="<?php echo $nomEnseignant; ?>">
						<label for="nom_enseignant">Nom de l'enseignant</label>
					</div>
					<div class="input-field s6 m6">
						<input type="text" class="validate" id="prenom_enseignant" name="prenom_enseignant" value="<?php echo $prenomEnseignant; ?>">
						<label for="prenom_enseignant">Prénom de l'enseignant</label>
					</div>
				</div>
				<div class="row">
					<div class="input-field s12 m12">
						<input type="email" class="validate" id="email_enseignant" name="email_enseignant" value="<?php echo $emailEnseignant; ?>">
						<label for="email_enseignant">Email de l'enseignant</label>
					</div>
				</div>
				<div class="row">
					<button class="waves-effect waves-light btn" type="submit">Modifier un enseignant</button>
				</div>
			</form>

			<?php
				}
			?>
		</div>
	</body>
</html>