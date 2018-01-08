<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php
include('../../modeles/eleve.php');
include('../../controleurs/fonctions.php');
session_start(); 
if(!isset($_SESSION['membre']) || $_SESSION['membre']->getRole() != "eleve") {
	header('Location: /index.php');
	exit;
}
?>
<!DOCTYPE HTML>
<html>
<?php include("../../layout/header.php"); ?>
<body class="fixed-left">
	<div id="wrapper">
	<!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/index.php" class="logo"><span>Darltin<span>School</span></span><i class="zmdi zmdi-layers"></i></a>
            </div>

            <!-- Button mobile view to collapse sidebar menu -->
            <div class="navbar navbar-default" role="navigation">
                <div class="container">

                    <!-- Page title -->
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left">
                                <i class="zmdi zmdi-menu"></i>
                            </button>
                        </li>
                        <li>
                            <h4 class="page-title">Tableau de bord</h4>
                        </li>
                    </ul>

                    <!-- Right(Notification and Searchbox -->
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <!-- Notification -->
                            <div class="notification-box">
                                <ul class="list-inline m-b-0">
                                    <li>
                                        <a href="javascript:void(0);" class="right-bar-toggle">
                                            <i class="zmdi zmdi-notifications-none"></i>
                                        </a>
                                        <div class="noti-dot">
                                            <span class="dot"></span>
                                            <span class="pulse"></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Notification bar -->
                        </li>
                        <li class="hidden-xs">
                            <form role="search" class="app-search">
                                <input type="text" placeholder="Search..."
                                       class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                </div><!-- end container -->
            </div><!-- end navbar -->
        </div>
        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="sidebar-inner slimscrollleft">

                <!-- User -->
                <div class="user-box">
                    <div class="user-img">
                        <img src="/assets/images/users/logo.png" alt="user-img" title="Darltin School" class="img-circle img-thumbnail img-responsive">
                        <div class="user-status offline"><i class="zmdi zmdi-dot-circle"></i></div>
                    </div>
                    <h5><a href="#"><?php echo $_SESSION['membre']->getNomEleve()." ".$_SESSION['membre']->getPrenomEleve(); ?></a></h5>
                    <ul class="list-inline">
                        <li>
                            <a href="../../controleurs/deconnexion.php" class="text-custom">
                                <i class="zmdi zmdi-power"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End User -->

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <ul>
                    	<li class="text-muted menu-title">Navigation</li>

                        <li>
                            <a href="/index.php" class="waves-effect"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>

                        <li>
                        	<a href="page_matieres.php" class="waves-effect"><i class="zmdi zmdi-assignment"></i> <span> Vos matières </span> </a>
                        </li>

                        <li>
                        	<a href="releve_notes.php" class="waves-effect"><i class="zmdi zmdi-assignment"></i> <span> Votre relevé de notes </span> </a>
                        </li>

                        <li>
                            <a href="informations.php" class="waves-effect active"><i class="zmdi zmdi-assignment"></i> <span> Modifier vos informations personnelles </span> </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Left Sidebar End -->
	</div>
	<div class="content-page">
		<div class="container">
			<div class="content">
				<div class="container">
					<div class="row">
						<div class="col-xs-12">
							<div class="card-box">
								<h4 class="header-title m-t-0 m-b-30"></h4>
                                    <?php 
                                    $id = $_SESSION['membre']->getMatricule();
                                    list($nom, $prenom, $date_naissance, $ville_naissance, $pays_naissance, $sexe, $date_inscription, $etablissement, $num_rue, $nom_rue, $code_postal, $ville, $tel_domicile, $tel_mobile, $nom_medecin, $prenom_medecin, $tel_medecin, $vaccinations, $allergies, $remarques_medicales) = afficherInfoEleve($id);

                                    ?>
                                    <div class="row">
                                        <div class="col-xs-12">
                                        <form class="form-horizontal" role="form" action="../../controleurs/modifier_eleve.php" method="POST">
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="nom">Nom de l'élève</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="nom" class="form-control" value="<?php echo $nom; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="prenom">Prénom de l'élève</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="prenom" class="form-control" value="<?php echo "$prenom";?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="date_naissance">Date de naissance</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" name="date_naissance" class="datepicker" value="<?php echo date('Y-m-d', strtotime($date_naissance)) ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="pays_naissance">Pays de naissance</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="pays_naissance" class="form-control" value="<?php echo $pays_naissance ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="ville_naissance">Ville de naissance</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="ville_naissance" class="form-control" value="<?php echo $ville_naissance ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="sexe">Sexe</label>
                                                    <div class="col-sm-7">
                                                        <select name="sexe">
                                                            <option value="Homme">Homme</option>
                                                            <option value="Femme">Femme</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="etablissement">Etablissement précédent</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="etablissement" class="form-control" value="<?php echo $etablissement; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="num_rue">Numéro de rue</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="num_rue" class="form-control" value="<?php echo $num_rue; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="nom_rue">Nom de rue</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="nom_rue" class="form-control" value="<?php echo $nom_rue; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="code_postal">Code postal</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="code_postal" class="form-control" value="<?php echo $code_postal ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="ville">Ville</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="ville" class="form-control" value="<?php echo $ville ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="tel_domicile">Téléphone domicile</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="tel_domicile" class="form-control" value="<?php echo $tel_domicile; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="tel_mobile">Téléphone mobile</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="tel_mobile" class="form-control" value="<?php echo $tel_mobile ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="nom_medecin">Nom du médecin</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="nom_medecin" class="form-control" value="<?php echo $nom_medecin; ?>">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="tel_mobile">Prénom du médecin</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="prenom_medecin" class="form-control" value="<?php echo $prenom_medecin; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="tel_medecin">Téléphone du médecin</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="tel_medecin" class="form-control" value="<?php echo $tel_medecin; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="allergie">Allergie(s)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="allergie" class="form-control" value="<?php echo $allergies; ?>">
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="vaccinations">Vaccination(s)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="vaccinations" class="form-control" value="<?php echo $vaccinations; ?>">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-4 control-label" for="remarques_medicales">Remarque(s) médicale(s)</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" name="remarques_medicales" class="form-control" value="<?php echo $remarques_medicales; ?>">
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <div class="col-sm-offset-4 col-sm-8">
                                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Mettre à jour vos informations</button>
                                                    </div>
                                                </div>
                                        </form> 
                                    </div>
                                </div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	<?php include("../../layout/footer.php"); ?>
</body>
</html>
</html>