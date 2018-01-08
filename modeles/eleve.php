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
	 * Time: 15:45
	 */
	class eleve
	{
		private $matricule;
		private $nom;
		private $prenom;
		private $date_naissance;
		private $ville_naissance;
		private $pays_naissance;
		private $sexe;
		private $date_inscription;
		private $etablissement_precedent;
		private $num_rue;
		private $nom_rue;
		private $code_postal;
		private $ville;
		private $tel_domicile;
		private $tel_mobile;
		private $email;
		private $nom_medecin;
		private $prenom_medecin;
		private $tel_medecin;
		private $vaccinations;
		private $allergies;
		private $remarques_medicales;
		private $photo;
		private $password;
		private $nom_promo;
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
					$this->email = $args[1];

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");

					$result = mysqli_query($this->co, "SELECT * 
                                                    FROM eleve
                                                    WHERE email='$this->email'")
					or die("Connexion impossible : Connexion eleve");

					$row = mysqli_fetch_assoc($result);
					$this->matricule = $row["matricule"];
					$this->nom = $row["nom"];
					$this->prenom= $row["prenom"];
					$this->email = $row["email"];
					$this->password = $row['password'];

					$this->role = "eleve";
					break;

				// On insere dans la table
				case 24 :
					$this->co = $args[0];
					$this->nom = $args[1];
					$this->prenom = $args[2];
					$this->date_naissance = $args[3];
					$this->ville_naissance = $args[4];
					$this->pays_naissance = $args[5];
					$this->sexe = $args[6];
					$this->date_inscription = mysqli_real_escape_string($this->co, $args[7]);
					$this->etablissement_precedent = $args[8];
					$this->num_rue = $args[9];
					$this->nom_rue = $args[10];
					$this->code_postal = $args[11];
					$this->ville = $args[12];
					$this->tel_domicile = $args[13];
					$this->tel_mobile = $args[14];
					$this->email = $args[15];
					$this->nom_medecin = $args[16];
					$this->prenom_medecin = $args[17];
					$this->tel_medecin = $args[18];
					$this->vaccinations = $args[19];
					$this->allergies = $args[20];
					$this->remarques_medicales = $args[21];
					$this->photo = $args[22];
					$this->password = $args[23];
					$this->nom_promo = NULL;

					$this->role = "eleve";

					// On dit à mysql que l'on veut travailler en UTF-8
					mysqli_query($this->co,"SET NAMES UTF8");
					mysqli_query($this->co, "INSERT INTO eleve VALUES(
				'',
                '$this->nom',
				'$this->prenom',
				'$this->date_naissance',
				'$this->ville_naissance',
				'$this->pays_naissance',
				'$this->sexe',
				'$this->date_inscription',
				'$this->etablissement_precedent',
				'$this->num_rue',
				'$this->nom_rue',
				'$this->code_postal',
				'$this->ville',
				'$this->tel_domicile',
				'$this->tel_mobile',
				'$this->email',
				'$this->nom_medecin',
				'$this->prenom_medecin',
				'$this->tel_medecin',
				'$this->vaccinations',
				'$this->allergies',
				'$this->remarques_medicales',
				'$this->photo',
				'$this->password',
				NULL
               )")
					or die ("Connexion impossible : Insertion eleve");
					break;
			}
		}


		public function infoEleve($matricule)
		{
			// On dit à mysql que l'on veut travailler en UTF-8
			mysqli_query($this->co,"SET NAMES UTF8");
			$result = mysqli_query($this->co, "SELECT * 
                                            FROM eleve 
                                            WHERE matricule=$matricule")
			or die("Connexion impossible : Connexion infoEleve(...)");

			// On recupere les informations de la requête (une ligne ici)
			$row = mysqli_fetch_array($result);
			$nom = $row['nom'];
			$prenom = $row['prenom'];
			$date_naissance = $row['email'];
			$ville_naissance = $row['ville_naissance'];
			$pays_naissance = $row['pays_naissance'];
			$sexe = $row['sexe'];
			$date_inscription = $row['date_inscription'];
			$etablissement = $row['etablissement_precedent'];
			$num_rue = $row['num_rue'];
			$nom_rue = $row['nom_rue'];
			$code_postal = $row['code_postal'];
			$ville = $row['ville'];
			$tel_domicile = $row['tel_domicile'];
			$tel_mobile = $row['tel_mobile'];
			$nom_medecin = $row['nom_medecin'];
			$prenom_medecin = $row['prenom_medecin'];
			$tel_medecin = $row['tel_medecin'];
			$vaccinations = $row['vaccinations'];
			$allergies = $row['allergies'];
			$remarques_medicales = $row['remarques_medicales'];


			return array ($nom, $prenom, $date_naissance, $ville_naissance, $pays_naissance, $sexe, $date_inscription, $etablissement, $num_rue, $nom_rue, $code_postal, $ville, $tel_domicile, $tel_mobile, $nom_medecin, $prenom_medecin, $tel_medecin, $vaccinations, $allergies, $remarques_medicales);
		}

		public function modifierEleve($id, $nom, $prenom, $date_naissance, $pays_naissance, $ville_naissance, $sexe, $etablissement_precedent, $num_rue, $nom_rue, $code_postal, $ville, $tel_domicile, $tel_mobile, $nom_medecin, $prenom_medecin, $tel_medecin, $allergies, $vaccinations, $remarques_medicales) {
			mysqli_query($this->co,"SET NAMES UTF8");
			if(!mysqli_query($this->co, "UPDATE eleve SET 
				nom = '$nom',
				prenom = '$prenom',
				date_naissance = '$date_naissance',
				ville_naissance = '$ville_naissance',
				pays_naissance = '$pays_naissance',
				sexe = '$sexe',  
				etablissement_precedent = '$etablissement_precedent',
				num_rue = '$num_rue',
				nom_rue = '$nom_rue',
				code_postal = '$code_postal',
				ville = '$ville',
				tel_domicile = '$tel_domicile',
				tel_mobile = '$tel_mobile',
				nom_medecin = '$nom_medecin',
				prenom_medecin = '$prenom_medecin',
				tel_medecin = '$tel_medecin',
				vaccinations = '$vaccinations', 
				allergies = '$allergies',
				remarques_medicales = '$remarques_medicales'
				WHERE matricule = '$id'")) {
				printf("Message d'erreur : %s\n", mysqli_error($this->co));
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

		public function getRole()
		{
			return $this->role;
		}

		public function getNomEleve() 
		{
			return $this->nom;
		}

		public function getPrenomEleve() 
		{
			return $this->prenom;
		}

		public function getMatricule()
		{
			return $this->matricule;
		}
	}

?>