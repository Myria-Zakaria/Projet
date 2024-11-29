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

                        <li><a href="index.php">Home</a></li>
                        <li><a href="animation.php"> Nos Recettes</a></li>
                        <li class="active"><a href="pad.php">Nos activités</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="session.php">Connectez-vous</a></li>


                    </ul>

                </div>

            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->

    <div id="hero" class="hero overlay">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Travel & Discover With Us</h1>
                <p>Your clients on the internet. Learn how to receive them.</p>
                
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->


    <?php

echo "<div class=\"container\">";
echo "<div class=\"text-center\">";
echo "<br />";
echo "  <h2 class=\"heading-separator\"> Détails du pad</h2>";
echo " </div>";

    if(isset($_GET['code']) && isset($_GET['id'])){ //Et récupérez dans une variable la valeur passée en paramètre dans l’URL !
       // if (isset($_GET['code'])){
         //  echo ("Valeur du code : ");
          // echo ($_GET['code']);
           $code = ($_GET['code']);
      /*if (isset($_GET['id'])){
       echo ("Valeur de id : ");
       echo ($_GET['id']);*/
       $id_pad = ($_GET['id']);
      }
        else {
        echo ("Vous avez oublié le paramètre !");
        exit();
        }


        $req ="SELECT * FROM t_activite_t
        JOIN t_atelier_t USING(pad_id)
        JOIN t_ressources_t USING(atl_id)
        where pad_code ='" .$code. "';";

        $resulat = $mysqli->query($req);
      // echo ($req);

        if ($resulat == false) //Erreur lors de l’exécution de la requête
        { // La requête a echoué
            echo "Error: La requête a echoué \n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit();
        }      
         else
         {
            echo "<br />";
            echo "<table class=\"table table-bordered\"> <th>Lien vers l'Atelier</th>  <th>Intitule de la Ressource</th> <th>Intitule && Lien hypertexte vers la ressource </th>  <th>Date </th>";
            while ($pad = $resulat->fetch_assoc())
            {  
                     echo "<tr>";
                    echo ('<td>'."<a href='./atelier.php?code=". $pad['pad_code'] . "&id=". $pad['pad_id']."'>" . $pad['atl_intitule'] . "</a>". ' </td> '.' <td> '.$pad['rcs_titre'] . ' </td> ');
                    echo (' <td> '."<a href=". $pad['rcs_chemin_acces'] . ">".$pad['rcs_description'] . "</a>".' </td> '.' <td> '.$pad['pad_creation_date'] . ' </td> ');
                    echo "</tr>";
                    
        } 

            echo "<br />";

        }
        echo "</table>";

        echo " </div>";

        $req2 ="SELECT pad_code,pad_id,atl_id,rcs_id FROM t_activite_t
        JOIN t_atelier_t USING(pad_id)
        JOIN t_ressources_t USING(atl_id)
        where pad_code ='" .$code. "';";

        $resulat2 = $mysqli->query($req2);
       //echo ($req2);

        if ($resulat2 == false) //Erreur lors de l’exécution de la requête
        { // La requête a echoué
            echo "Error: La requête a echoué \n";
          //  echo "Errno: " . $mysqli->errno . "\n";
            //echo "Error: " . $mysqli->error . "\n";
            exit();
        }      
         else
         { 
            $id = $resulat2->fetch_assoc();
           // echo ($id['atl_id']);
           if (isset($id['atl_id'])==NULL) 
                {
                    echo "Il n'y encore aucune information concernant cette activité pour le moment...";
                }
            
            }



        
        ?>
        </div>


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
