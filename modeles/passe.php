<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php

class passe {
	private $nom_epreuve;
	private $matricule;
	private $note;

	public function __construct() {
		$cpt = func_num_args();
		$args = func_get_args(); 

		switch($cpt) {
			case 4:
				$this->co = $args[0];
				$this->nom_epreuve = $args[1];
				$this->matricule = $args[2];
				$this->note = $args[3];

				if(!mysqli_query($this->co, "INSERT INTO passe VALUES('$this->note', '$this->matricule', '$this->nom_epreuve')")) {
					printf("Message d'erreur : %s\n", mysqli_error($this->co));
				}
		}
	}
}

?>