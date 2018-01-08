<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->

<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL); 
require_once('../modeles/bd.php');


if(isset($_POST['eleve'])) {
	$bd = new bd();
	$co = $bd->connexion();
	$eleve = $_POST['eleve'];
	$resultat = mysqli_query($co, "SELECT p.nom_epreuves AS pnomep, coeff_epreuve, nom_matiere, note FROM passe p, epreuve e WHERE matricule = $eleve AND p.nom_epreuves = e.nom_epreuves");
	echo "<h4 class='header-title m-t-0 m-b-30'>Liste des notes</h4>";
	if(mysqli_num_rows($resultat) > 0) {
		echo "<div class='table-wrapper'>";
        echo "<div class='table-responsive b-0'>";
        echo "<table class='table table-stripped'>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Nom de l'épreuve</th>";
        echo "<th>Coefficient de l'épreuve</th>";
        echo "<th>Matière</th>";
        echo "<th>Note</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

	    while($row = mysqli_fetch_array($resultat)) {
	    	echo "<tr>";
            echo "<td>$row[pnomep]</td>";
            echo "<td>$row[coeff_epreuve]</td>";
            echo "<td>$row[nom_matiere]</td>";
            echo "<td contenteditable='true' onchange=\"saveDatabase($eleve, '$row[pnomep]', $row[note]);\">$row[note]</td>";
            echo "</tr>";
	    }
	    echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";

	}else {
		echo "<p class='text-muted font-13 m-b-25'>Pas de notes pour cet élève</p>";
	}
	exit;
}
?>