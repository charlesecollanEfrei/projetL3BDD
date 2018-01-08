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
	 * Time: 17:04
	 */
	class etudie
	{
		private $matricule;
		private $nom_ue;

		public function __construct () {
			$cpt = func_num_args();
			$args = func_get_args();

			switch($cpt) {
				case 3 :
					$this->co = $args[0];
					$this->matricule = $args[1];
					$this->nom_ue = $args[2];

					mysqli_query($this->co, "SET NAMES UTF8");
					mysqli_query($this->co, "INSERT VALUES INTO etudie VALUE(
						'$this->matricule',
						'$this->nom_ue')
						") or die ("Connexion impossible : Insert etudie");
					break;
			}
		}
	}

?>