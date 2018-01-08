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

	class bd
	{
		private $host;
		private $user;
		private $bdd;
		private $passwd;
		private $co;
		private $link;


		public function __construct()
		{
			$this->host = "localhost";
			$this->user = "root";
			$this->bdd = "bdd";
			$this->passwd = "root";

			//$this->host = "charlesdtsbdd.mysql.db";
			//$this->user = "charlesdtsbdd";
			//$this->bdd = "charlesdtsbdd";
			//$this->passwd = "Base2017";
		}


		public function connexion()
		{
			$this->co = mysqli_connect($this->host, $this->user, $this->passwd, $this->bdd) or die ("Connexion impossible : BDD");

			return $this->co;
		}


		public function deconnexion()
		{
			return mysqli_close($this->co);
		}
		


	}


?>