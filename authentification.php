<!DOCTYPE HTML>

<html lang="fr">
	<head>
		<title>Formulaire d authentification</title>
		<meta charset='utf-8' />
		<link href="bootstrap_2/bootstrap.css" rel="stylesheet" type="text/css">
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div class="container">
			<div class="row">
				<nav class="navbar navbar-inner">
					<ul class="nav">
						<li class="col-md-2" class="active"><a href="connecte.php">Accueil</a></li>
						<li class="col-md-3" class="nav2"><a href="#">Espace membre</a></li>
						<li class="col-md-2" class="nav2"><a href="inscription.php">Inscription</a></li>
						<form class="form-inline" action="authentification.php" method="POST">
							<div class="form-group">
								<label class="sr-only" for="login">Login :</label>
								<input type="text" class="form-control" name="login" placeholder="Login"/>
							</div>
							<div class="form-group">
								<label class="sr-only" for="password">Password :</label>
								<input type="password" class="form-control" name="password" placeholder="Password" />
							</div>
							<input type="submit" class="btn btn-default" value="Se logger" />
						</form>
					</ul>
				</nav>

				<center style="color:red;font-size:16px;">

				<?php				
					
				require('connect.php');

				$dsn="mysql:dbname=".BASE.";host=".SERVER;
				try{
				$connexion=new PDO($dsn, USER, PASSWD);
				}
				catch(PDOException $e){
				printf("Echec de la connexion : %s\n", $e->getMessage());
				exit();
				}

				$errorMessage='';
						
                		if(!empty($_POST)){//Les identifiants sont transmis ?

				if(!empty($_POST['login']) && !empty($_POST['password'])){

				$stmt=$connexion->prepare("SELECT * from utilisateur where login=:log and password=:pswd");
				$login = $_POST['login'];
				$pswd = explode('.', md5($_POST['password']));
				$pswd = end($pswd);
				$stmt->bindParam(':log', $login);
				$stmt->bindParam(':pswd', $pswd);
				$stmt->execute();
				if($stmt->rowCount() != 1){
				$errorMessage="Pb connexion";
				}
				else{ //Tout va bien
				//On ouvre la session
				session_start();
				$_SESSION['login']=$_POST['login'];//On enregistre le login en session
				//On redirige vers le fichier suite.php
				header('Location:connecte.php');
				}
				}
				else{
				$errorMessage='Veuillez inscrire vos identifiant svp !';
				}
				}

				if(!empty($errorMessage)){
					echo $errorMessage;
				}
				?>

				</center>

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
		

	</body>
</html>
