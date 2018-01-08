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
	class epreuve
	{
		private $nom_epreuve;
		private $date_epreuve;
		private $coeff_epreuve;
		private $nom_matiere;

		public function __construct() {
			$cpt = func_num_args();
			$args = func_get_args();

			switch($cpt) {
				case 5 : 
					$this->co = $args[0];
					$this->nom_epreuve = $args[1];
					$this->date_epreuve = $args[2];
					$this->coeff_epreuve = $args[3];
					$this->nom_matiere = $args[4];

					mysqli_query($this->co,"SET NAMES UTF8");
					mysqli_query($this->co, "INSERT INTO epreuve VALUES('$this->nom_epreuve', '$this->date_epreuve', '$this->coeff_epreuve', '$this->nom_matiere')");
			}
		}
	}

?>