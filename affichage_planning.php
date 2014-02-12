<!DOCTYPE html>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Affichage Planning</title>

    <link href="affichage_planning.css" rel="stylesheet" type="text/css">
    <link href="bootstrap_3/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="bootstrap_2/docs.css" rel="stylesheet" type="text/css">
    <link href="bootstrap_2/bootstrap-responsive.css" rel="stylesheet" type="text/css">   
    <link href="style.css" rel="stylesheet" type="text/css">
    <script href="bootstrap_2/js/bootstrap.js" type="text/javascript" rel="javascript"></script>

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
    <center>

      <header>

	<h1 id="semaine">
	  Semaine du 
	  <?php

	     $i = 0;
	     $nom_jour_semaine = date("D") ;


	     if( $nom_jour_semaine == "Tue" )
	       $i = -1;
	     else
	       if( $nom_jour_semaine == "Wed" )
	         $i = -2;
	       else
	         if( $nom_jour_semaine == "Thu" )
	           $i = -3;
	         else
	           if( $nom_jour_semaine == "Fri" )
	             $i = -4;
	           else
	             if( $nom_jour_semaine == "Sat" )
	               $i = -5;
	             else
	               if( $nom_jour_semaine == "Sun" )
	                 $i = -6;
	          
 
        if( !empty($_GET["pnbsemaines"]) ){
             $jour_semaine = date("d" , time() + 24 * 60 * 60 * 7 * $_GET["pnbsemaines"] + 24 * 60 * 60 * $i);
	     $annee_semaine = date("Y", time() + 24 * 60 * 60 * 7 * $_GET["pnbsemaines"]);
	     $mois_semaine = date("m" , time() + 24 * 60 * 60 * 7 * $_GET["pnbsemaines"]);
	} 
	else
       if( !empty($_GET["nnbsemaines"]) ){
             $jour_semaine = date("d" , time() - 24 * 60 * 60 * 7 * $_GET["nnbsemaines"] + 24 * 60 * 60 * $i);
	     $annee_semaine = date("Y", time() - 24 * 60 * 60 * 7 * $_GET["nnbsemaines"]);
	     $mois_semaine = date("m" , time() - 24 * 60 * 60 * 7 * $_GET["nnbsemaines"]);
	}
	else{
	  $jour_semaine = date("d" , time() + 24 * 60 * 60 * $i);
	     $annee_semaine = date("Y");
	     $mois_semaine = date("m");
	}
	     echo " " . $jour_semaine . " / " . $mois_semaine . " / " . $annee_semaine;
	     ?>


      </h1>

<nav>
<ul>
<li>
<a href= <?php 
if( !empty($_GET['nnbsemaines']) ){
  $nnbsemaines = $_GET["nnbsemaines"]+1;
  echo "affichage_planning.php?nnbsemaines=" . $nnbsemaines;
}
else
  if( !empty($_GET['pnbsemaines']) ){
    $pnbsemaines = $_GET["pnbsemaines"]-1;

    if( $_GET['pnbsemaines'] != 0 )
      echo "affichage_planning.php?pnbsemaines=" . $pnbsemaines;
    else
      echo "affichage_planning.php?nnbsemaines=1";
  }
  else
    echo "affichage_planning.php?nnbsemaines=1";
    
      
?> >
<--
</a>

<a href=
<?php 

if( !empty($_GET['pnbsemaines']) ){
  $pnbsemaines = $_GET["pnbsemaines"]+1;
  echo "affichage_planning.php?pnbsemaines=" . $pnbsemaines;
}
else
  if( !empty($_GET['nnbsemaines']) ){
    $nnbsemaines = $_GET["nnbsemaines"]-1;
    if( $_GET['nnbsemaines'] != 0 )
      echo "affichage_planning.php?nnbsemaines=" . $nnbsemaines;
    else
      echo "affichage_planning.php?pnbsemaines=1";
  }
  else
    echo "affichage_planning.php?pnbsemaines=1";
    
      
?> >

-->
</a>
</li>
</ul>
</nav>

      </header>

      <table>
	<tr>
	  <th/>
	  <th class="label label-default" style="font-size:16px" > Lundi </th>
	  <th class="label label-default" style="font-size:16px"> Mardi </th>
	  <th class="label label-default" style="font-size:16px"> Mercredi </th>
	  <th class="label label-default" style="font-size:16px"> Jeudi </th>
	  <th class="label label-default" style="font-size:16px"> Vendredi </th>
	  <th class="label label-default" style="font-size:16px"> Samedi </th>
	  <th class="label label-default" style="font-size:16px"> Dimanche </th>
	</tr>


      <?php
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

      $lundi = $jour_semaine;
      $h = 8;
	while( $h < 20 ){ 
	  $jour_semaine = $lundi;
	  echo "<tr> <td class='label label-default'  style='font-size:16px'>" . $h . " h</td>";

          while( $jour_semaine < $lundi+7 ){

	  $planning = $connexion->prepare("Select nom,ID from Activite where ID = (Select ID_activite from faire_activite where login = :log and jour = :jour and heure = :heure)");

	  $planning -> bindParam(':log' , $_SESSION['login']);  

	  $date = $annee_semaine."-".$mois_semaine."-".$jour_semaine;

	  $planning -> bindParam(':jour' , $date);
	  $planning -> bindParam(':heure' , $h);
	  $planning -> execute(); 


	$res = $planning->fetch();

	  if( $planning->rowCount() > 0 ){
	    if( $res[1] == 0 )
	      echo "<td class='label  label-warning' style='font-size:16px;'>" . $res[0] . "</td>";
	    else
	      if( $res[1] == 1 )
	        echo "<td class='label' style='background-color:#BD8D46; font-size:16px'>" . $res[0] . "</td>";
	    else
	      if( $res[1] == 2 )
	        echo "<td class='label label-success' style='font-size:16px'>" . $res[0] . "</td>";
	    else
	      if( $res[1] == 3 )
	        echo "<td class='label' style='background-color:#375D81; font-size:16px'>" . $res[0] . "</td>";
	    else
	      if( $res[1] == 4 )
	        echo "<td class='label' style='background-color:#1A1D26; font-size:16px'>" . $res[0] . "</td>";
	    else
	      if( $res[1] == 5 )
	        echo "<td class='label' style='background-color:#8FCF3C;font-size:16px'>" . $res[0] . "</td>";
	  }
	  else
	    echo "<td style='width:14%'></td>";

	  $jour_semaine++;
	}
	$h++;
	echo "</tr>";
      }

      ?>

      </table>
    </center>




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
