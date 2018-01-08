<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->

<?php
include("../modeles/administrateur.php"); 
include("../modeles/eleve.php");
include("../modeles/enseignant.php");
session_start();
if(isset($_SESSION['membre'])) {
	$_SESSION['membre']->deconnexion();
}
header('Location: /index.php');
?>

