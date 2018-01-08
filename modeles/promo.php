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
	 * Time: 17:08
	 */
	class promo
	{
		private $nom_promo;


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

				// On insere dans la table
				case 2 :
					$this->co = $args[0];
					$this->nom_promo = $args[1];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					mysqli_query($this->co, "INSERT INTO Promo VALUES(
                '$this->nom_promo'
               )")
					or die ("Connexion impossible : Insertion Promo");
					break;
			}
		}


		/**
		 * Tableau de toutes les promos
		 * @return array
		 */
		public function tableauPromo()
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$result = mysqli_query($this->co,
								   "SELECT nom_promo FROM Promo")
			or die("Connexion impossible : Connexion tableauPromo()");

			$promo = Array ();

			while ($row = mysqli_fetch_array($result)) {
				$promo[] = $row[0];
			}

			return $promo;
		}
	}

?>