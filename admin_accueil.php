
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
                        <li class="active"><a href="admin_accueil.php">Gestion profils & comptes</a></li>
                        <li><a href="admin_ateliers.php">Gestion Ateliers & Ressources</a></li>
                        <li><a href="deconnexion.php">Déconnexion</a></li>



                    </ul>

                </div>

            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->



<?php 
/* Vérification ci-dessous à faire sur toutes les pages dont l'accès est autorisé à un utilisateur connecté. */
session_start();

echo "<div id=\"hero\" class=\"hero overlay\">";
echo "<div class=\"hero-content\">";
echo "<div class=\"hero-text\">";
echo "<h1> Espace Administration </h1>";
echo "</div>";
echo "</div>";
echo "</div>";

   if(!isset($_SESSION['login'])) 
   {
        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        header("Location:session.php");
   }
   
?>

<html>
<head>
    <!--entête du fichier HTML-->
</head>
<body>


<?php
//echo $_SESSION["role"];
$id = $_SESSION["login"]; 

if ($_SESSION['role'] == 'R')
{
    echo "<br />";
    echo "<div class=\"text-center\">";
    echo "  <h2 class=\"heading-separator\"> Responsable</h2>";
    echo "<h3>";echo $_SESSION["login"];echo "</h3>";
    echo " </div>";
    
    echo "<div class=\"text-center\">";

    $cpt = "SELECT count(*) as nb_compte from t_compte_cpt;";
    $req1 = $mysqli->query($cpt); 
   
    if ($req1==false) 
    {// La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
    }
     else {    
            $compte = $req1->fetch_assoc();    
            echo " Nombre de compte(s): ";
            echo $compte['nb_compte'];
            echo "<br />";

          }

    $pfl = "SELECT count(*) as nb_profil from t_compte_cpt;";
    $req2 = $mysqli->query($pfl); 
    
    if ($req2==false)
    { // La requête a echoué
         echo "Error: La requête a echoué \n";
         echo "Errno: " . $mysqli->errno . "\n";
         echo "Error: " . $mysqli->error . "\n";
         exit();
     }
     else {    
             $profil = $req2->fetch_assoc();   
             echo " Nombre de profil(s): ";
             echo $profil['nb_profil'];
             echo "<br />";    
           }
   
 
    $r1 = "SELECT * from t_compte_cpt
    JOIN t_profil_pfl USING(cpt_pseudo);";
    // where cpt_pseudo = '$id' 
    //echo ($r1);
    $res1 = $mysqli->query($r1); 
    
    if ($res1==false) 
    {// La requête a echoué
     echo "Error: Problème d'accès à la base \n";
     exit();
    }
    else {
           echo "<table class=\"table table-bordered\"> <th>E-mail (Pseudo)</th> <th>Nom</th> <th>Prénom</th> <th>Validité du profil</th> <th>Role</th> <th>Action</th> ";
            while ($l1=$res1->fetch_assoc())
           {
                echo "<tr>";
                echo (' <td> '. $l1['cpt_pseudo'] .' </td> '.' <td> '. $l1['pfl_nom'].' </td> '.' <td> '.$l1['pfl_prenom'] . ' </td> ');
                echo (' <td> '.$l1['pfl_validite'] . ' </td> ' .' <td> '. $l1['pfl_role'].' </td> ');                
                echo ("<td>");
                echo "<form action=\"compte_action.php\" method=\"post\">";
                echo "  <p><input type='hidden' name= 'pseudoselect' value='".$l1['cpt_pseudo']."'/>";
                echo " <button type=\"btn btn-default\">Activer/Désactiver</button>";
                echo "</form>";
                echo ("</td>");
                echo "</tr>";

             }
                echo "</table>";

        }    
        echo " </div>";

}


if ($_SESSION['role'] == 'A')
{
    echo "<div class=\"text-center\">";
    echo " <h2> Animateur</h2>";
    echo "<h3>";echo $_SESSION["login"];echo "</h3>";
    echo " </div>";    
    echo "<br />";

    
    $r2 = "SELECT * from t_compte_cpt
    JOIN t_profil_pfl USING(cpt_pseudo)
    where cpt_pseudo= '" .$id. "';";
   // echo ($r2);
    $res2 = $mysqli->query($r2); 
   
    if ($res2==false) 
    {  // La requête a echoué
      echo "Error: Problème d'accès à la base \n";
      exit();
    }
    else {
            $l2=$res2->fetch_assoc();
            echo "<table class=\"table table-bordered\"> <th>E-mail (Pseudo)</th> <th>Nom</th> <th>Prénom</th> <th>Validité du profil</th> <th>Role</th> <th>Date</th>";
            echo "<tr>";
            echo (' <td> '. $l2['cpt_pseudo'] .' </td> '.' <td> '. $l2['pfl_nom'].' </td> '.' <td> '.$l2['pfl_prenom'] . ' </td> ');
            echo (' <td> '.$l2['pfl_validite'] . ' </td> ' .' <td> '. $l2['pfl_role'].' </td> '.' <td> '. $l2['pfl_date'].' </td> ');
            echo "</tr>";
            echo "</table>";

        }

}
        
        
echo " </div>";

?>

        <footer id="colophon" class="site-footer">
            <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6">
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