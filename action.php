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

//echo ("Connexion BDD réussie !");
?>    

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                    <a href="index.php" class="site-title"><span>Reach</span>Seoul</a>

                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="agency-navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

           
                        <li><a href="index.php">Home</a></li>
                        <li><a href="animation.php"> Nos Recettes</a></li>
                        <li><a href="pad.php">Nos activités</a></li>
                        <li class="active"><a href="inscription.php">Inscription</a></li>
                        <li><a href="session.php">Connexion</a></li>

                    </ul>
                </div>
            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->

    <div id="hero" class="hero overlay subpage-hero portfolio-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Bienvenue</h1>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->


<?php
$nom=htmlspecialchars(addslashes($_POST['pfl_nom']));
$prenom=htmlspecialchars(addslashes($_POST['pfl_prenom']));
$id=htmlspecialchars(addslashes($_POST['cpt_pseudo']));
$mdp=htmlspecialchars(addslashes($_POST['mdp']));
$mdp1=htmlspecialchars(addslashes($_POST['mdp1']));

if ( (isset($nom) && !empty($nom) ) && (isset($prenom) && !empty($prenom)) && (isset($id) && !empty($id)) && (isset($mdp) && !empty($mdp)) &&(isset($mdp1) && !empty($mdp) ))
{                    
        $sql2="INSERT INTO t_compte_cpt VALUES('" .$id. "','" .MD5($mdp). "');";
        //echo($sql2);
        $result2 = $mysqli->query($sql2); 
            
        if ($result2 == false) //Erreur lors de l’exécution de la requête
        {
        // La requête a echoué
        echo "Error: La requête a échoué \n";
        echo "Query: " . $sql2 . "\n";
        echo "Errno: " . $mysqli->errno . "\n";
        echo "Error: " . $mysqli->error . "\n";
        exit;
        }
        else 
        {//Requête réussie
           //     echo "compte ajouté";
        }
        $sql1="INSERT INTO t_profil_pfl(pfl_nom,pfl_prenom,pfl_role,pfl_validite,pfl_date,cpt_pseudo)
        VALUES('" .$nom. "','" .$prenom. "','A','D',CURDATE(),'" .$id. "');";
        //echo($sql1);
        $result1 = $mysqli->query($sql1); 


        if ($result1 == false) //Erreur lors de l’exécution de la requête
        {
            // La requête a echoué
            echo "Error: La requête a échoué \n";
            echo "Query: " . $sql1 . "\n";
            echo "Errno: " . $mysqli->errno . "\n";
            echo "Error: " . $mysqli->error . "\n";
            exit;
        }

     else if(strcmp($mdp,$mdp1) !==0 )
        {
           echo "<div class=\"text-center\">";
           echo "  <h2>Vos mots de passe ne correspondent pas ! </h2>";
           echo " </div>";          

          // echo "<a href = 'inscription.php'> Cliquez ici pour vous inscrire à nouveau </a>." ;

            $r1="DELETE from t_profil_pfl where cpt_pseudo = '" .$id. "';";
           // echo($r1);
             $result5 = $mysqli->query($r1); 
            if ($result5 == false) //Erreur lors de l’exécution de la requête
            {
                // La requête a echoué
                echo "Error: La requête a échoué \n";
                echo "Query: " . $r1 . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }
            else 
            {
                echo "<br />";
              //  echo "Suppression accomplie du profil et du compte associé";
              echo "<div class=\"text-center\">";
              echo "<h2>";
              echo "<a href = 'inscription.php'> Veuillez-vous inscrire à nouveau </a>." ;
              echo "</h2>";
              echo " </div>";               }
            
            $r2="DELETE from t_compte_cpt where cpt_pseudo = '" .$id. "';";
            //echo($r2);
            $result6 = $mysqli->query($r2); 
                if ($result6 == false) //Erreur lors de l’exécution de la requête
                {
                    // La requête a echoué
                    echo "Error: La requête a échoué \n";
                    echo "Query: " . $r2 . "\n";
                    echo "Errno: " . $mysqli->errno . "\n";
                    echo "Error: " . $mysqli->error . "\n";
                    exit;
                }else {
                    echo "<br />";
                   // echo "Suppression accomplie du compte";

                }
            
        }
        else //Requête réussie
        {
        // echo "<br />";
            echo "<div class=\"text-center\">";
            echo " <h2 class=\"heading-separator\">Inscription Réussi</h2>";
            echo "<a href = 'index.php'> Cliquez ici pour revenir vers l'accueil </a>." ;
            echo " </div>";          
        }  
}
else 
{
    echo "<div class=\"text-center\">";
    echo "<h2>";
    echo "<a href = 'inscription.php'> Veuillez-vous inscrire à nouveau </a>." ;
    echo "</h2>";
    echo " </div>";   
}
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
    $mysqli->close();
    ?>
</body>
</html>