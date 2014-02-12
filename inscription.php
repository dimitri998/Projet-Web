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

				<fieldset>
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
					<legend class="h1">Inscription</legend>
						<div class="posIns">
							<form action="inscription.php" method="POST">						
								<div class="form-group">
									<label for="login">Entrer votre nom d utilisateur:</label>
									<input class="form-control" type="text" name="login" placeholder="Entrez votre user" />
								</div>
								<div class="form-group">
									<label for="pswd">Entrez votre mot de passe</label>
									<input class="form-control" type="password" name="pswd" placeholder="Entrez votre password" />
								</div>
								<input class="btn btn-default" type="submit" name="Envoyer" value="Envoyer" />
								<?php 
									require('connect.php');
													
									$dsn="mysql:dbname=".BASE.";host=".SERVER;
									$connexion=new PDO($dsn, USER, PASSWD);
													
													
									if(!empty($_POST['login']) && !empty($_POST['pswd'])){
										$stmt=$connexion->prepare("INSERT INTO utilisateur VALUES(:log, :pswd)");
										$stmt2=$connexion->prepare("SELECT * FROM utilisateur where login=:log");
										$login=$_POST['login'];
										$password=$_POST['pswd'];
														
										$stmt->bindParam(':log', $login);
										$stmt->bindParam(':pswd', md5($password));
														
										$stmt2->bindParam(':log', $login);
										$stmt2->execute();
										$row=$stmt2->fetch();
										if($stmt2->rowCount() != 1){
											if($row[0] != $_POST['login']){
												$stmt->execute();
												echo "user enregistré";
											}
										}
										else{
											echo "User deja utilise";
										}

									}
								?>
							</form>
						</div>					
				</fieldset>