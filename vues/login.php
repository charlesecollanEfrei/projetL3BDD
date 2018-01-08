<!--
David HA
Charles ECOLLAN
Quentin LECAILLE

PROMO L'3 2019
GROUPE A

PROJET Bases de données (2)
-->


<?php session_start();
if(isset($_SESSION['membre'])) header('Location: /index.php');
?>
<!DOCTYPE HTML>
<html lang="en">
<?php include("../layout/header_connexion.php"); ?>
<body>
<div class="preloader"></div>
<!-- Navbar -->
<?php include("../layout/navbar_connexion.php"); ?>
<!-- Navbar end -->
<div id="hero" class="hero">
	<div class="cta with-form">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="trial-form">
						<h3>Connexion</h3>
						<form action="../controleurs/connexion.php" method="POST">
							<div class="form-group">
								<i class="fa fa-envelope" aria-hidden="true"></i>
								<input type="text" class="form-control" name="identifiant" placeholder="Identifiant">
							</div>
							<div class="form-group">
								<i class="fa fa-lock" aria-hidden="true"></i>
								<input type="password" class="form-control" name="password" placeholder="Mot de passe">
							</div>
							<div class="form-group">
								<label for="role">Role</label>
								<select name="role" id="role" class="form-control">
									<option value=1>Elève</option>
									<option value=2>Enseignant</option>
									<option value=3>Administration</option>
								</select>
							</div>
							
							<button type="submit" name="loginBtn" class="btn btn-secondary btn-full">Se connecter</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

<div id="particles-js"></div>
<div class="overlay"></div>
</div>

<?php include("../layout/footer_connexion.php"); ?>
</body>
</html>
