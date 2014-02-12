<!DOCTYPE HTML>

<html lang="fr">
	<head>
		<title>Connecte</title>
		<meta charset='utf-8' />
		<link href="bootstrap_2/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="style.css" rel="stylesheet" type="text/css">
		<link href="bootstrap_2/bootstrap-theme.css" rel="stylesheet" type="text/css">
		<link href="bootstrap_2/bootstrap-responsive.css" rel="stylesheet" type="text/css">
		<link href="bootstrap_2/docs.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"></link>

		
	</head>
	<body>
		<?php
			session_start();
		   if( empty($_SESSION['login'] ) )
		   header('Location:authentification.php');
		?>



		<div class="container">
			<div class="row">
				<nav class="navbar navbar-inner">
					<ul class="nav">
						<li class="col-md-2" class="active"><a href="connecte.php">Accueil</a></li>
						<li class="col-md-3" class="nav2" class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Espace membre<b class="carret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="ajouter_activite.php">Ajouter une activite</a></li>
								<li><a href="supression_activite.php">Supprimer une activite</a></li>
								<li><a href="affichage_planning.php">Afficher le planning</a></li>
							</ul>
						</li>
						<li class="col-md-2" class="nav2"><a href="inscription.php">Inscription</a></li>
						
						<div class="posCo">
						
						
						<ul class="nav pull-right">
							<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Connecte en tant que <?php
									echo $_SESSION['login'];
									?>
							</a> 
							<ul class="dropdown-menu">
								<li><a href="deconnecte.php">Déconnexion</a> </li>
							</ul>
							</li>
						</ul>
						</div>
						
					</ul>
					
				</nav>
				<h1 class="h1" class="col-md-12">Bienvenue sur l'application de gestion de planning</h1>
				<p>Cette application vous permet de gérer votre planning d'activités</p>
				<p>Une activité ne vous interesse plus ? Supprimez la de votre emploi du temps !</p>
				<p>Vous pouvez aussi ajoutez une activité qui vous interesse !</p>
				<p>Et aussi afficher le planning en temps réel !</p>
				<h2>Mais quelles sont les activités que propose cette application ?</h2><br/><br/>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="divgris">
						<div class="textvertical"> 
							JAVA 
						</div>
					</div>
				</div> 
				<div class="col-md-4">
					<div class="divgrisclair">
						<div class="textvertical">  
							PYTHON 
						</div>
					</div>
				</div> 
				<div class="col-md-4">
					<div class="divgris">
						<div class="textvertical"> 
							PHP 
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="divgrisclair">
						<div class="textvertical"> 
							ANGLAIS 
						</div>
					</div>
				</div> 
				<div class="col-md-4">
					<div class="divgris">
						<div class="textvertical"> 
							REPOS 
						</div>
					</div>
				</div> 
				<div class="col-md-4">
					<div class="divgrisclair"> 
						<div class="textvertical"> 
							CAFE 
						</div>
					</div>
				</div>
			</div>
		</div>

		<script src="bootstrap_2/js/jquery.js"></script>
		<script src="bootstrap_2/js/bootstrap-transition.js"></script>
		<script src="bootstrap_2/js/bootstrap-alert.js"></script>
		<script src="bootstrap_2/js/bootstrap-modal.js"></script>
		<script src="bootstrap_2/js/bootstrap-dropdown.js"></script>
		<script src="bootstrap_2/js/bootstrap-scrollspy.js"></script>
		<script src="bootstrap_2/js/bootstrap-tab.js"></script>
		<script src="bootstrap_2/js/bootstrap-tooltip.js"></script>
		<script src="bootstrap_2/js/bootstrap-popover.js"></script>
		<script src="bootstrap_2/js/bootstrap-button.js"></script>
		<script src="bootstrap_2/js/bootstrap-collapse.js"></script>
		<script src="bootstrap_2/js/bootstrap-carousel.js"></script>
		<script src="bootstrap_2/js/bootstrap-typeahead.js"></script>

		

	</body>
</html>
