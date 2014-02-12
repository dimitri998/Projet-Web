<!DOCTYPE html>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajout Activité</title>

    
    <link rel="stylesheet" type="text/css" href="bootstrap_2/bootstrap.css" /> 


    <link rel="stylesheet" type="text/css" href="bootstrap_2/bootstrap-responsive.css" /> 
    <link rel="stylesheet" type="text/css" href="bootstrap_2/docs.css" /> 
    <link rel="stylesheet" type="text/css" href="style.css" /> 

    <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"></link>
    <script src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

    <link rel="stylesheet" href="/resources/demos/style.css"></link>

    <script>
      $(function() {
      $( "#choix_date" ).datepicker();
      });
    </script>

  </head>

  <body>
    



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
		    Connecte en tant que <?php session_start();
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

	<style>
	  .formu{
	  background-color: #57B8FF;
	  border-radius:8px;
	  padding-top:17px;
	  }
	  .centre{
	  position:relative;
	  test-align:center;
	  top:150px;
	  }
	  .centrerform{
	  display:inline-block;
	  }
	</style>
	
	<div class="centre">


	  <center>
	    <h1 style="color:#57B8FF;">Ajouter une activité


    <?php
       if( empty($_SESSION['login']) )
       header("Location:authentification.php");	    

       require_once('connect.php');

       $dsn = "mysql:dbname=".BASE.";host=".SERVER;
       try
       {
       $connexion = new PDO($dsn,USER,PASSWD);
       }

       catch(PDOException $e)
       {
       printf("echec de la connexion : %s\n" , $e->getMessage());
    exit();
    }


    if( !empty($_GET["choixactivite"]) and !empty($_GET["choix_date"]) and !empty($_GET["choix_heure"]) ){


    $test = $connexion->prepare("Select * from faire_activite where login = :login and jour = :jour and heure = :heure");

    $date = date_create($_GET['choix_date']);
    $date =  date_format( $date , 'Y-m-d');

    $test -> bindParam(':login', $_SESSION['login'] );
    $test -> bindParam(':jour', $date);
    $test -> bindParam(':heure', $_GET['choix_heure'] );
    $test -> execute();

    if( $test -> rowCount() > 0)
    echo "<br/>Impossible d'ajouter une activite à se moment, une autre activité est déjà prévu.";
    else{
    
    $stmt = $connexion->prepare("INSERT INTO faire_activite VALUES( :login , :idactivite , :jour , :heure )");

    $q = $connexion->prepare("Select ID from Activite where nom= :nomact");
    $q -> bindParam(':nomact', $_GET['choixactivite']);
    $q -> execute();
    $act = $q->fetch(); 


    $stmt -> bindParam(':login', $_SESSION['login'] );
    $stmt -> bindParam(':idactivite', $act[0] );
    $stmt -> bindParam(':jour', $date);
    $stmt -> bindParam(':heure', $_GET['choix_heure'] );

    $stmt -> execute();

    echo "<br/> Ajout effectué !";
    }
    }
    ?>
   
	    </h1>

	    <div class="container">
	      
	      <div class="row">	
		<div class="span8 offset2">
		  <div class="formu">
		    
		    <form action="ajouter_activite.php" method="GET">

			<label  class="btn btn-primary">
			  <input id="Java" type="radio" name="choixactivite" value="Java" required/> Java
			</label>
			

			<label class="btn btn-primary">
			  <input id="Python" type="radio" name="choixactivite" value="Python" required/> Python
			</label>

			
			<label class="btn btn-primary">
			  <input id="Anglais" type="radio" name="choixactivite" value="Anglais" required/> Anglais
			</label>

			<label class="btn btn-primary">
			  <input id="Repos" type="radio" name="choixactivite" value="Repos" required/> Repos
			</label>

			<label class="btn btn-primary">
			  <input id="Cafe" type="radio" name="choixactivite" value="Cafe" required/> Café
			</label>

			<label class="btn btn-primary">
			  <input id="PHP" type="radio" name="choixactivite" value="PHP" required/> PHP
			</label>


		      <p>
			<div class="form-group">
			  <label for="choix_date" style="font-size:20px;">Choix date :</label><br/>
			  <input id="choix_date" type="text" name="choix_date"  placeholder="Selectionner date" required=""/>
			</div>
		      </p>

		      <p>
			<label for="choix_heure" style="font-size:20px;">Choix heure :</label><br/>
			<select id="choix_heure" name="choix_heure" size="1" required>
			  <option>8</option>  
			  <option>9</option>  
			  <option>10</option>  
			  <option>11</option>  
			  <option>12</option>  
			  <option>13</option>  
			  <option>14</option>  
			  <option>15</option>  
			  <option>16</option>  
			  <option>17</option>  
			  <option>18</option>  
			  <option>19</option>  
			</select>
		      </p>

		      <p>
			<input type="submit" value="Valider" class="btn btn-primary btn-medium"/>
			<br></br>
		      </p>

		    </form>
		  </div>
		</div>
	      </div>
	    </div>
	  </center>
	</div>


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
