<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php
	
	// Pour afficher les eventuelles erreurs (Utilisateurs MAC)
	ini_set('display_errors', 1);
	error_reporting(E_ALL);

	class administrateur
	{
		private $nom_admin;
		private $prenom_admin;
		private $id_admin;
		private $email_admin;
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
					$this->email_admin = $args[1];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					$result = mysqli_query($this->co, "SELECT * 
                                                    FROM administrateur
                                                    WHERE email_admin='$this->email_admin'")
					or die("Connexion impossible : Connexion administrateur");

					$row = mysqli_fetch_assoc($result);
					$this->id_admin = $row["id_admin"];
					$this->nom_admin = $row["nom_admin"];
					$this->prenom_admin = $row["prenom_admin"];
					$this->email_admin = $row["email_admin"];
					$this->password = $row['password'];

					$this->role = "admin";
					break;

				// On insere dans la table
				case 5 :
					$this->co = $args[0];
					$this->nom_admin = mysqli_real_escape_string($this->co, $args[1]);
					$this->prenom_admin = mysqli_real_escape_string($this->co, $args[2]);
					$this->email_admin = mysqli_real_escape_string($this->co, $args[3]);
					$this->password = mysqli_real_escape_string($this->co, $args[4]);
					$this->role = "admin";

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					mysqli_query($this->co, "INSERT INTO administrateur VALUES(
                '$this->nom_admin',
                '$this->prenom_admin',
                '',
                '$this->email_admin',
                '$this->password'
               )")
					or die ("Connexion impossible : Insertion administrateur");
					break;
			}
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
		public function getNomAdmin()
		{
			return $this->nom_admin;
		}



		/**
		 * @return string
		 */
		public function getPrenomAdmin()
		{
			return $this->prenom_admin;
		}



		/**
		 * @return mixed
		 */
		public function getIdAdmin()
		{
			return $this->id_admin;
		}



		/**
		 * @return string
		 */
		public function getEmailAdmin()
		{
			return $this->email_admin;
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