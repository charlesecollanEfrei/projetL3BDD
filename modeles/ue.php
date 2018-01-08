<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php

	class ue
	{
		private $nom_ue;
		private $coeff_ue;

		public function __construct()
		{
			// On compte et on récupère les arguments
			$cpt = func_num_args();
			$args = func_get_args();

			// En fonction du nombre d'argument
			switch ($cpt) {
				// On crée juste un objet pour accéder à la classe etude et donc à ses méthodes
				case 1 :
					$this->co = $args[0];
					break;

				// On crée un objet en récupérant dans la base de données UE les informations associées aux données passées en paramètres
				case 2 :
					$this->co = $args[0];
					$this->nom_ue = $args[1];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					$result = mysqli_query($this->co, "SELECT * 
                                                    FROM ue
                                                    WHERE nom_ue='$this->nom_ue'")
					or die("Connexion impossible : Connexion UE");

					$row = mysqli_fetch_assoc($result);
					$this->coeff_ue = $row["coeff_ue"];

					break;


				// On insere dans la table
				case 3 :
					$this->co = $args[0];
					$this->nom_ue = $args[1];
					$this->coeff_ue = $args[2];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					mysqli_query($this->co, "INSERT INTO ue VALUES(
                '$this->nom_ue',
                '$this->coeff_ue'
               )")
					or die ("Connexion impossible : Insertion ue");
					break;
			}
		}


		/**
		 * Tableau de toutes les promos
		 * @return array
		 */
		public function tableauUe()
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$result = mysqli_query($this->co,
								   "SELECT nom_ue FROM ue")
			or die("Connexion impossible : Connexion tableauUe()");

			$promo = Array ();

			while ($row = mysqli_fetch_array($result)) {
				$promo[] = $row[0];
			}

			return $promo;
		}
	}


?>