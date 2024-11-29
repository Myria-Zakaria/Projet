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

                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="animation.php"> Nos Recettes</a></li>
                        <li><a href="pad.php">Nos activités</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                        <li><a href="session.php">Connexion</a></li>


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


    <main id="main" class="site-main">
   
        <section class="site-section section-features">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Bienvenue chez ReachSeoul</h2>
                        <p> <?php echo (' <td> '.$config['cfg_mot_du_president'] . ' </td> ');?></p>
                    </div>
                    <div class="col-sm-7 hidden-xs">
                    <img src="assets/img/a1.jpg" alt="">
                    </div>
                </div>
            </div>
        </section><!-- /.section-features -->



<?php

echo "<div class=\"container\">";
echo "<div class=\"text-center\">";
echo "  <h2 class=\"heading-separator\">Latest Work</h2>";
echo " </div>";

$requete="SELECT  * from t_news_new 
order by new_id
DESC limit 5;";
//Affichage de la requête préparée
//echo ($requete);

$result1 = $mysqli->query($requete);

if ($result1 == false) //Erreur lors de l’exécution de la requête
{ // La requête a echoué
    echo "Error: La requête a echoué \n";
    echo "Errno: " . $mysqli->errno . "\n";
    echo "Error: " . $mysqli->error . "\n";
    exit();
}
else //La requête s’est bien exécutée (<=> couleur verte dans phpmyadmin)
{
    echo "<table class=\"table table-bordered\">  <th>Présentation</th> <th>Auteur</th> <th >Date de publication</th>";
    while ($actu = $result1->fetch_assoc()) 
    {
        echo "<tr>";
        echo (' <td> '.$actu['new_titre'] . ' </td> ' .' <td> '. $actu['new_texte'].' </td> ');
        echo (' <td> '.$actu['cpt_pseudo'] . ' </td> ' .' <td> '. $actu['new_date'].' </td> ');
        echo "</tr>";
    }
}

echo "</table>";

echo " </div>";

?>
</div>

        <section class="site-section section-portfolio">
            <div class="container">
                <div class="text-center">
                    <p class="subheading-text">This is some of our best work</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/samgyetang1.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Le Samgyetang</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/dagkalbi.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Le Dakgalbi</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/hoppang.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Le hoppang</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/bibimpap1.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Le Bibimpap</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/kimpab3.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Le Kimpap</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/tteobbokki.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Les Tteobbokkis</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/Bungeoppang.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Les Bungeoppangs</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="portfolio-item">
                            <img src="assets/img/kimchi.jpg" class="img-res" alt="">
                            <h4 class="portfolio-item-title">Le Kimchi</h4>
                            <a href="animation.php"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                        </div><!-- /.portfolio-item -->
                    </div>
                </div>
            </div>
        </section><!-- /.section-portfolio -->

      
    </main><!-- /#main -->

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