
<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ReachSeoul</title>

    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keywords" content="">

    <!-- Mobile Specific Metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,600,700" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

    <!-- Favicon
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.png">

    <!-- Stylesheets
    ================================================== -->
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<?php
$mysqli = new mysqli('localhost','zzakarimy','h7dt1wke','zfl2-zzakarimy_1');
if ($mysqli->connect_errno) 
{
 // Affichage d'un message d'erreur
 echo "Error: Problème de connexion à la BDD \n";
 echo "Errno: " . $mysqli->connect_errno . "\n";
 echo "Error: " . $mysqli->connect_error . "\n";
 // Arrêt du chargement de la page
 exit();
}
// Instructions PHP à ajouter pour l'encodage utf8 du jeu de caractères
if (!$mysqli->set_charset("utf8")) {
 printf("Pb de chargement du jeu de car. utf8 : %s\n", $mysqli->error);
 exit();
}
//echo ("Connexion BDD réussie !");
?>
    <header id="masthead" class="site-header">
        
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">

<?php

$sql1 = "SELECT * from t_configuration_t";
$sql1 = $mysqli->query($sql1);

if ($sql1 == false) //Erreur lors de l’exécution de la requête
{ // La requête a echoué
    echo "Error: La requête a echoué \n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit();
}
else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
{
    $config = $sql1->fetch_assoc();    
}
?>                    
                <a class="site-title"><span><?php echo ($config['cfg_nom']); ?></span></a>

                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="agency-navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                    <li ><a href="index.php">Home</a></li>
                        <li><a href="animation.php"> Nos Recettes</a></li>
                        <li><a href="pad.php">Nos activités</a></li>
                        <li><a href="admin_accueil.php">Gestion profils & comptes</a></li>
                        <li class="active"><a href="admin_ateliers.php">Gestions des Ateliers & Ressources</a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>





                    </ul>

                </div>

            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->


<?php 
/* Vérification ci-dessous à faire sur toutes les pages dont l'accès est autorisé à un utilisateur connecté. */
session_start();

   if(!isset($_SESSION['login'])) 
   {
        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        header("Location:session.php");
   }
   
echo "<div id=\"hero\" class=\"hero overlay\">";
echo "<div class=\"hero-content\">";
echo "<div class=\"hero-text\">";
echo "<h1> Espace Administration </h1>";
echo "<h1>";
echo $_SESSION["login"]; 
echo "</h1>";
echo "</div>";
echo "</div>";
echo "</div>";
//echo "<br />";
//echo $_SESSION['role'];   

echo "<br />";

   if(!isset($_SESSION['login'])) //A COMPLETER pour tester aussi le rôle...
   {
        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        header("Location:session.php");
   }
   
?>

<html>
<head>
</head>
<body>

        
<?php 

$id = $_SESSION['login'];   
//echo ($id);
$role = $_SESSION['role'];
//echo ($role);



if ($_SESSION['role'] == 'R')
{
    echo "<div class=\"container\">";
 
    echo "<div class=\"text-center\">";
    echo "<h2 class=\"heading-separator\">Ateliers </h2>";
    echo " </div>";

    $atelier= "SELECT * from t_atelier_t
    join t_animation_t using(pad_id);";
    // echo ($atelier);
    $res1 = $mysqli->query($atelier); 
        
    if ($res1==false)
    { // La requête a echoué
         echo "Error: La requête a echoué \n";
         echo "Errno: " . $mysqli->errno . "\n";
         echo "Error: " . $mysqli->error . "\n";
         exit();
     }
     else 
        {   
                echo "<div class=\"text-center\">";
                echo "<table class=\"table table-bordered\"> <th>Id Atelier</th> <th>Intitulé</th>  <th>texte</th> <th>etat</th> <th>pseudo</th> </th>";
            while ($atl = $res1->fetch_assoc())
            {
                echo "<tr>";
                echo (' <td> '. $atl['atl_id'].' </td> ');
                echo (' <td> '. $atl['atl_intitule'] .' </td> '.' <td> '. $atl['atl_texte'].' </td> '.' <td> '.$atl['atl_etat'] . ' </td> ');
                echo "<td>";
            echo " <p><input type=\"submit\" value='".$atl['cpt_pseudo']."'></p>";
           echo "</td>";
                echo "</tr>";

            }
            echo "</table>";    
            echo " </div>";
        }
    
        echo "<div class=\"text-center\">";
        echo "<h2 class=\"heading-separator\"> Activités</h2>";
        echo " </div>";

        $activite= "SELECT * from t_activite_t
        JOIN t_atelier_t USING(pad_id);";
        //echo ($activite);
       $res2= $mysqli->query($activite); 
           
       if ($res2==false)
       { // La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
        }
        else 
           {   
               echo "<div class=\"text-center\">";
               echo "<table class=\"table table-bordered\"> <th>Id Atelier</th> <th>id de l'Activité</th>  <th>Intitule</th> <th>Description</th> <th>Etat</th> <th>Date</th> ";
             while ($act = $res2->fetch_assoc())
             {
               echo "<tr>";
               echo (' <td> '. $act['atl_id'].' </td> '.' <td> '. $act['pad_id'].' </td> ');
             echo (' <td> '. $act['pad_intitule'] .' </td> '.' <td> '. $act['pad_description'].' </td> '.' <td> '. $act['pad_etat'].' </td> '.' <td> '. $act['pad_creation_date'].' </td> ');
               echo "</tr>";
   
            }
            echo "</table>";    
            echo " </div>";
        }

                echo "<div class=\"text-center\">";
                echo "<h2 class=\"heading-separator\"> Ressources</h2>";
                echo " </div>";
            
    
            $ressource= "SELECT * from t_ressources_t
            JOIN t_atelier_t USING(atl_id);";
          //  echo ($ressource);
           $res3 = $mysqli->query($ressource); 
               
           if ($res3==false)
           { // La requête a echoué
                echo "Error: La requête a echoué \n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit();
            }
            else 
               {   
                   echo "<div class=\"text-center\">";
                   echo "<table class=\"table table-bordered\"> <th>Id Atelier</th> <th>Titre</th>  <th>Description</th> <th>Chemin d'accès</th> ";
                 while ($rcs = $res3->fetch_assoc())
                 {
                   echo "<tr>";
                   echo (' <td> '. $rcs['atl_id'].' </td> ');
                 echo (' <td> '. $rcs['rcs_titre'] .' </td> '.' <td> '. $rcs['rcs_description'].' </td> '.' <td> '. $rcs['rcs_chemin_acces'].' </td> ');
                   echo "</tr>";
       
                }
                echo "</table>";    
                echo " </div>";
               }
               echo " </div>";

}

if ($_SESSION['role'] == 'A')
{
    echo "<div class=\"text-center\">";
    echo "  <h2 class=\"heading-separator\"> Ateliers & Ressources</h2>";
    echo " </div>";
    

    $req= "SELECT * from t_atelier_t
    JOIN t_animation_t USING (pad_id)
     where cpt_pseudo = '" .$id. "';";

    //echo ($req);
    $res = $mysqli->query($req); 
        
    if ($res==false)
    { // La requête a echoué
         echo "Error: La requête a echoué \n";
         echo "Errno: " . $mysqli->errno . "\n";
         echo "Error: " . $mysqli->error . "\n";
         exit();
     }
     else 
        {    
            echo "<div class=\"text-center\">";
            echo "<table class=\"table table-bordered\"> <th>Id Atelier</th> <th>Intitulé</th>  <th>texte</th> <th>etat</th>  </th>";
            while ($atelier = $res->fetch_assoc())
            {
            echo "<tr>";
            echo (' <td> '. $atelier['atl_id'].' </td> ');
            echo (' <td> '. $atelier['atl_intitule'] .' </td> '.' <td> '. $atelier['atl_texte'].' </td> '.' <td> '.$atelier['atl_etat'] . ' </td> ');
            echo "<td>";
            echo " <p><input type=\"submit\" value='".$atelier['cpt_pseudo']."'></p>";
           echo "</td>";
            echo "</tr>";

          }
            echo "</table>";    
            echo " </div>";
         
        }

        echo "<div class=\"text-center\">";
        echo "<h2 class=\"heading-separator\"> Activités</h2>";
        echo " </div>";

        $acti= "SELECT * from t_activite_t
        JOIN t_atelier_t USING(pad_id)
        JOIN t_animation_t USING(pad_id)
        where cpt_pseudo = '" .$id. "';";
        //echo ($activite);
       $atv= $mysqli->query($acti); 
           
       if ($atv==false)
       { // La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
        }
        else 
           {   
               echo "<div class=\"text-center\">";
               echo "<table class=\"table table-bordered\"> <th>Id Atelier</th> <th>id de l'Activité</th>  <th>Intitule</th> <th>Description</th> <th>Etat</th> <th>Date</th> ";
             while ($at = $atv->fetch_assoc())
             {
               echo "<tr>";
               echo (' <td> '. $at['atl_id'].' </td> '.' <td> '. $at['pad_id'].' </td> ');
             echo (' <td> '. $at['pad_intitule'] .' </td> '.' <td> '. $at['pad_description'].' </td> '.' <td> '. $at['pad_etat'].' </td> '.' <td> '. $at['pad_creation_date'].' </td> ');
               echo "</tr>";
   
            }
            echo "</table>";    
            echo " </div>";
        }

        echo "<div class=\"text-center\">";
        echo "<h2 class=\"heading-separator\"> Ressources</h2>";
        echo " </div>";

        $rcs1= "SELECT * from t_atelier_t
        JOIN t_animation_t USING(pad_id)
        JOIN t_ressources_t USING(atl_id)
        where cpt_pseudo = '" .$id. "';";
        //echo ($rcs1);
       $rc= $mysqli->query($rcs1); 
           
       if ($rc==false)
       { // La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
        }
        else 
           {   
               echo "<div class=\"text-center\">";
               echo "<table class=\"table table-bordered\"> <th>Id Atelier</th> <th>id de l'Activité</th>  <th>Intitule</th> <th>Description</th> <th>Etat</th> <th>Date</th> ";
             while ($rec = $rc->fetch_assoc())
             {
               echo "<tr>";
               echo (' <td> '. $rec['atl_id'].' </td> '.' <td> '. $rec['rcs_titre'].' </td> ');
             echo (' <td> '. $rec['rcs_description'] .' </td> '.' <td> '. $rec['rcs_chemin_acces'].' </td> ');
               echo "</tr>";
   
            }
            echo "</table>";    
            echo " </div>";
        }

}


?>


<div class="container">
    <form action="ateliers_action.php" method="POST">
    <h4>Intitulé de votre Atelier : </h4>
        <br>
        <input type="text" class="form-control" name="intitule" />
        <h4>Détails : </h4>
        <input type="text" class="form-control" name="texte" />
        <h4>Visibilité de votre Atelier (Public(P)/Caché(C)): </h4>
        <input type="text" class="form-control" name="etat"/>
        <h4>Activité №: </h4>
        <input type="text" class="form-control" name="pad_id" />
        <br>
        <h4><input type="submit" value="Ajouter d'un Atelier"></h4>

    </form>
</div>
<br>

<div class="container">
    <form action="ateliers_action.php" method="POST">
        <br>
        <h4>Atelier №: </h4>
        <input type="text" class="form-control" name="atl_id" />
        <br>
        <h4><input type="submit" value="Supression d'un Atelier"></h4>

    </form>
</div>
 

 
<footer id="colophon" class="site-footer">
            <div class="container">
            <div class="row">
            <div class="col-lg-offset-4 col-md-3 col-sm-4 col-md-offset-2 col-sm-offset-0 col-xs-6 ">
                    <a class="site-title"><span><?php echo ($config['cfg_nom']);?></span></a>
                </div>
                <div class="col-lg-offset-4 col-md-3 col-sm-4 col-md-offset-2 col-sm-offset-0 col-xs-6 ">
                    <h3>Keep in touch</h3>
                    <ul class="list-unstyled contact-links">
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><?php echo ($config['cfg_mail']);?></li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Téléphone: +33 <?php echo ($config['cfg_numero']); ?></a></li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Adresse : <?php echo ($config['cfg_adresse_postale']); ?></li>
                    </ul>
                </div>
                <div class="clearfix visible-xs"></div>
                <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6">
                    <h3>Featured links</h3>
                    <ul class="list-unstyled">
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="recettes.php">Recettes</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xs-8">
                        <div class="social-links">
                            <a class="twitter-bg" href="#"><i class="fa fa-twitter"></i></a>
                            <a class="facebook-bg" href="#"><i class="fa fa-facebook"></i></a>
                            <a class="pinterest" href="#"><i class="fa fa-pinterest"></i></a>
                            <a class="linkedin-bg" href="#"><i class="fa fa-linkedin"></i></a>
                        </div><!-- /.social-links -->
                    </div>
                    <div class="col-xs-4">
                        <div class="text-right">
                            <p>&copy; ReachSeoul</p>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.copyright -->
        </footer><!-- /#footer -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/bootstrap-select.min.js"></script>
<script src="assets/js/jquery.slicknav.min.js"></script>
<script src="assets/js/jquery.countTo.min.js"></script>
<script src="assets/js/jquery.shuffle.min.js"></script>
<script src="assets/js/script.js"></script>

<?php

//Ferme la connexion avec la base MariaDB
$mysqli->close();

?>
</body>
</html>