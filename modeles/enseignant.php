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
	 * Time: 16:52
	 */
	class enseignant
	{
		private $nom_enseignant;
		private $prenom_enseignant;
		private $id_enseigant;
		private $email_enseignant;
		private $password;
		private $role;


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

				// On crée un objet en récupérant dans la base de données ADMINISTRATEUR les informations associées aux données passées en paramètres
				case 2 :
					$this->co = $args[0];
					$this->email_enseignant = $args[1];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					$result = mysqli_query($this->co, "SELECT * 
                                                    FROM enseignant
                                                    WHERE email_enseignant='$this->email_enseignant'")
					or die("Connexion impossible : Connexion enseignant");

					$row = mysqli_fetch_assoc($result);
					$this->id_enseigant = $row["id_enseigant"];
					$this->nom_enseignant = $row["nom_enseignant"];
					$this->prenom_enseignant = $row["prenom_enseignant"];
					$this->email_enseignant = $row["email_enseignant"];
					$this->password = $row['password'];

					$this->role = "enseignant";
					break;

				// On insere dans la table
				case 5 :
					$this->co = $args[0];
					$this->nom_enseignant = mysqli_real_escape_string($this->co, $args[1]);
					$this->prenom_enseignant = mysqli_real_escape_string($this->co, $args[2]);
					$this->email_enseignant = mysqli_real_escape_string($this->co, $args[3]);
					$this->password = mysqli_real_escape_string($this->co, $args[4]);
					$this->role = "enseignant";

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					mysqli_query($this->co, "INSERT INTO enseignant VALUES(
                '$this->nom_enseignant',
                '$this->prenom_enseignant',
                '',
                '$this->email_enseignant',
                '$this->password'
               )")
					or die ("Connexion impossible : Insertion administrateur");
					break;
			}
		}




		/**
		 * Tableau de tous les enseignants
		 * @return array
		 */
		public function tableauEnseignants()
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$result = mysqli_query($this->co,
								   "SELECT id_enseignant, nom_enseignant, prenom_enseigant
                  FROM enseignant")
			or die("Connexion impossible : Connexion tableauEnseignants()");

			$enseignant = Array ();

			// On remplit un tableau avec toutes les informations de la requête ligne par ligne
			while ($row = mysqli_fetch_array($result)) {
				$tab = Array (
					"NOM"      => "<a href='modify_enseignant.php?ref=" . $row['id_enseignant'] . "'> " . $row['nom_enseignant'] . " </a>",
					"PRENOM"       => $row['prenom_enseigant']
				);
				array_push($enseignant, $tab);
			}

			return $enseignant;
		}




		/**
		 * Recupere toutes les informations de l'enseignant demandé
		 *
		 * @return array
		 */
		public function infoEnseignant($id_enseignant)
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$result = mysqli_query($this->co, "SELECT * 
                                            FROM enseignant 
                                            WHERE id_enseignant=$id_enseignant")
			or die("Connexion impossible : Connexion infoEnseignant(...)");

			// On recupere les informations de la requête (une ligne ici)
			$row = mysqli_fetch_array($result);
			$nom_enseignant = $row['nom_enseignant'];
			$prenom_enseignant = $row['prenom_enseigant'];
			$email_enseignant = $row['email_enseignant'];
			$password = $row['password'];

			return array ($nom_enseignant, $prenom_enseignant, $email_enseignant, $password);
		}




		public function modifierEnseignant($id, $nom, $prenom, $email)
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$this->nom_enseignant = mysqli_real_escape_string($this->co, $nom);
			$this->prenom_enseignant = mysqli_real_escape_string($this->co, $prenom);
			$this->email_enseignant = mysqli_real_escape_string($this->co, $email);

			mysqli_query($this->co, "UPDATE enseignant
                                            SET nom_enseignant='$this->nom_enseignant',
                                                prenom_enseigant='$this->prenom_enseignant',
                                                email_enseignant='$this->email_enseignant'
                                            WHERE id_enseignant='$id'")
			or die ("Connexion impossible : modifierEnseignant(...)");
		}







		public function connexion()
		{

			// a mettre en get et pas en session
			session_start();
		}


		public function deconnexion()
		{
			session_destroy();
		}



		/**
		 * @return string
		 */
		public function getNomEnseignant()
		{
			return $this->nom_enseignant;
		}



		/**
		 * @return string
		 */
		public function getPrenomEnseignant()
		{
			return $this->prenom_enseignant;
		}



		/**
		 * @return mixed
		 */
		public function getIdEnseigant()
		{
			return $this->id_enseigant;
		}



		/**
		 * @return string
		 */
		public function getEmailEnseignant()
		{
			return $this->email_enseignant;
		}



		/**
		 * @return string
		 */
		public function getPassword()
		{
			return $this->password;
		}



		/**
		 * @return string
		 */
		public function getRole()
		{
			return $this->role;
		}

		


	}

?>