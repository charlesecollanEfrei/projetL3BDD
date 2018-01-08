<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php
	
	/**
	 * Created by PhpStorm.
	 * User: charlesecollan
	 * Date: 27/02/2017
	 * Time: 17:02
	 */
	class enseigne
	{
		private $nom_matiere;
		private $id_enseignant;


		public function __construct() {
			$cpt = func_num_args();
			$args = func_get_args();

			switch($cpt) {
				case 3 : 
				$this->co = $args[0];
				$this->id_enseignant = $args[1];
				$this->nom_matiere = $args[2];


				mysqli_query($this->co, "SET NAMES UTF8");
				mysqli_query($this->co, "INSERT INTO enseigne VALUES('$this->nom_matiere', $this->id_enseignant)") or die ("L'enseignant a déjà été assigné à cette matière !");
				break;
			}
		}
	}


?>