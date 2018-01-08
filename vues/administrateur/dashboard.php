<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php
    include("../../modeles/administrateur.php");
    include ("../../controleurs/fonctions.php");
    session_start();
    if(!isset($_SESSION['membre']) || $_SESSION['membre']->getRole() != "admin") {
        header('Location: /index.php');
        exit;
    }

    
?>
<!DOCTYPE html>
<html>
<?php include ("../../layout/header.php"); ?>
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
                    <h5><a href="#"><?php echo $_SESSION['membre']->getNomAdmin()." ".$_SESSION['membre']->getPrenomAdmin(); ?></a></h5>
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
                            <a href="/index.php" class="waves-effect active"><i class="zmdi zmdi-view-dashboard"></i> <span> Dashboard </span> </a>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi-account-add"></i> <span> Gestion des personnes </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="create_eleve.php">Ajouter un élève</a></li>
                                <li><a href="create_enseignant.php">Ajouter un enseignant</a></li>
                                <li><a href="create_promo.php">Ajouter une promotion</a></li>
                                <li><a href="ajouter_note.php">Ajouter une note</a></li>
                            </ul>
                        </li>

                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="zmdi zmdi zmdi-assignment"></i> <span> Gestion des enseignements </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="create_ue.php">Ajouter un UE</a></li>
                                <li><a href="create_matiere.php">Ajouter une matière</a></li>
                                <li><a href="assigner_ue.php">Assigner un UE à une promotion</a></li>
                                <li><a href="assigner_matiere.php">Assigner une matière à un professeur</a></li>
                                <li><a href="ajouter_epreuve.php">Ajouter une épreuve</a></li>
                            </ul>
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
        <div class="content">
            <div class="container">
                <div class="row">
                    <!-- Ajout des informations par rapport à l'école -->
                    <div class="col-xs-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Liste des élèves</h4>
                                        <?php $bd = new bd();
                                        $co = $bd->connexion();

                                        $resultat = mysqli_query($co, "SELECT * FROM eleve");
                                        if(mysqli_num_rows($resultat) > 0) {
                                            echo "<div class='table-wrapper'>";
                                            echo "<div class='table-responsive b-0'>";
                                            echo "<table class='table table-stripped'>";
                                            echo "<thead>";
                                            echo "<tr>";
                                            echo "<th>Matricule</th>";
                                            echo "<th>Nom</th>";
                                            echo "<th>Prénom</th>";
                                            echo "</tr>";
                                            echo "</thead>";
                                            echo "<tbody>";

                                                while($row = mysqli_fetch_row($resultat)) {
                                                    echo "<tr>";
                                                    echo "<td>$row[0]</td>";
                                                    echo "<td>$row[1]</td>";
                                                    echo "<td>$row[2]</td>";
                                                    echo "</tr>";
                                                }
                                                echo "</tbody>";
                                                echo "</table>";
                                                echo "</div>";
                                                echo "</div>";
                                        }else {
                                            echo "<p class='text-muted font-13 m-b-25'>Pas d'élève</p>";
                                        }
                                        ?>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Liste des enseignants</h4>
                                <?php
                                $resultat = mysqli_query($co, "SELECT * FROM enseignant");
                                if(mysqli_num_rows($resultat) > 0) {
                                    echo "<div class='table-wrapper'>";
                                    echo "<div class='table-responsive b-0'>";
                                    echo "<table class='table table-stripped'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Nom</th>";
                                    echo "<th>Prénom</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        while($row = mysqli_fetch_row($resultat)) {
                                            echo "<tr>";
                                            echo "<td>$row[0]</td>";
                                            echo "<td>$row[1]</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                                        echo "</div>";
                                }
                                else {
                                    echo "<p class='text-muted font-13 m-b-25'>Pas d'enseignant</p>";
                                }

                                ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Liste des UE</h4>
                           
                                <?php
                                $resultat = mysqli_query($co, "SELECT * FROM ue");
                                if(mysqli_num_rows($resultat) > 0) {
                                    echo "<div class='table-wrapper'>";
                                    echo "<div class='table-responsive b-0'>";
                                    echo "<table class='table table-stripped'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Nom</th>";
                                    echo "<th>Coefficient</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        while($row = mysqli_fetch_row($resultat)) {
                                            echo "<tr>";
                                            echo "<td>$row[0]</td>";
                                            echo "<td>$row[1]</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                                        echo "</div>";

                                }
                                else {
                                    echo "<p class='text-muted font-13 m-b-25'>Pas d'UE</p>";
                                } 
                                ?>
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="card-box">
                            <h4 class="header-title m-t-0 m-b-30">Liste des matières</h4>
                           
                                <?php
                                $resultat = mysqli_query($co, "SELECT * FROM matiere");
                                if(mysqli_num_rows($resultat) > 0) {
                                    echo "<div class='table-wrapper'>";
                                    echo "<div class='table-responsive b-0'>";
                                    echo "<table class='table table-stripped'>";
                                    echo "<thead>";
                                    echo "<tr>";
                                    echo "<th>Nom</th>";
                                    echo "<th>UE</th>";
                                    echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        while($row = mysqli_fetch_row($resultat)) {
                                            echo "<tr>";
                                            echo "<td>$row[0]</td>";
                                            echo "<td>$row[1]</td>";
                                            echo "</tr>";
                                        }
                                        echo "</tbody>";
                                        echo "</table>";
                                        echo "</div>";
                                        echo "</div>";

                                }
                                else {
                                    echo "<p class='text-muted font-13 m-b-25'>Pas de matière</p>";
                                }
                                $bd->deconnexion(); 
                                ?>
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