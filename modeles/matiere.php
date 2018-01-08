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
	 * Time: 17:06
	 */
	class matiere
	{
		private $nom_matiere;
		private $nom_ue;


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
					$this->nom_matiere = $args[1];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					$result = mysqli_query($this->co, "SELECT * 
                                                    FROM matiere
                                                    WHERE nom_matiere='$this->nom_matiere'")
					or die("Connexion impossible : Connexion Matiere");

					$row = mysqli_fetch_assoc($result);
					$this->coeff_ue = $row["coeff_ue"];

					break;


				// On insere dans la table
				case 3 :
					$this->co = $args[0];
					$this->nom_matiere = $args[1];
					$this->nom_ue = $args[2];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					mysqli_query($this->co, "INSERT INTO matiere VALUES(
                '$this->nom_matiere',
                '$this->nom_ue'
               )")
					or die ("Connexion impossible : Insertion matiere");
					break;
			}
		}


		/**
		 * Tableau de toutes les matiere
		 * @return array
		 */
		public function tableauMatieres()
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$result = mysqli_query($this->co,
								   "SELECT nom_matiere FROM matiere")
			or die("Connexion impossible : Connexion tableauMatieres()");

			$matiere = Array ();

			while ($row = mysqli_fetch_array($result)) {
				$matiere[] = $row[0];
			}

			return $matiere;
		}


		/**
		 * @return mixed
		 */
		public function getNomMatiere()
		{
			return $this->nom_matiere;
		}



		/**
		 * @return mixed
		 */
		public function getNomUe()
		{
			return $this->nom_ue;
		}



	}


?>