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

    <header id="masthead" class="site-header site-header-white">
        <nav id="primary-navigation" class="site-navigation">
            <div class="container">

                <div class="navbar-header">
                   
                <a class="site-title"><span>ReachSeoul</span></a>

                </div><!-- /.navbar-header -->

                <div class="collapse navbar-collapse" id="agency-navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                    <li ><a href="index.php">Home</a></li>
                    <li><a href="animation.php"> Nos Recettes</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li class="active"><a href="session.php">Connectez-vous</a></li>


                    </ul>

                </div>

            </div>   
        </nav><!-- /.site-navigation -->
    </header><!-- /#mastheaed -->

    <div id="hero" class="hero overlay subpage-hero portfolio-hero">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Sign In</h1>
            </div><!-- /.hero-text -->
        </div><!-- /.hero-content -->
    </div><!-- /.hero -->



<?php 

$mysqli = new mysqli('localhost','zzakarimy','h7dt1wke','zfl2-zzakarimy_1');
if ($mysqli->connect_errno) { 
// Affichage d'un message d'erreur
echo "Error: Problème de connexion à la BDD \n";
// Arrêt du chargement de la page
exit();
}
//Ouverture d'une session
session_start();
/*Affectation dans des variables du pseudo/mot de passe s'ils existent,affichage d'un message sinon*/

if ( (isset($_POST["pseudo"]) && !empty($_POST["pseudo"])) && (isset($_POST["mdp"])  && !empty($_POST["pseudo"]))){
    $id=htmlspecialchars(addslashes($_POST["pseudo"]));
    $mdp=htmlspecialchars(addslashes($_POST["mdp"]));
    

        $sql="SELECT cpt_pseudo,mdp,pfl_validite,pfl_role from t_profil_pfl
        JOIN t_compte_cpt USING(cpt_pseudo)
        where cpt_pseudo='".$id."' AND mdp= MD5('".$mdp."');";
        //echo ($sql);

       $resultat = $mysqli->query($sql); // Exécution de la requête pour vérifier si le compte (=pseudo+mdp) existe !*/
        if ($resultat==false) {
        // La requête a echoué
        echo "Error: Problème d'accès à la base \n";
        exit();
        }
        else 
        {
       $ligne=$resultat->fetch_assoc();
       //echo ($ligne['cpt_pseudo']);

        if($resultat->num_rows == 1 && $ligne["pfl_validite"]=='A')
        {
            echo "<br />";
            echo "<div class=\"text-center\">";
            echo "  <h2 class=\"heading-separator\">Votre profil est activée</h2>";
            echo " </div>";

        } 
        if($resultat->num_rows == 1 && $ligne["pfl_validite"]=='D')
        { 
            echo "<br />";
            echo "<div class=\"text-center\">";
            echo "  <h2 class=\"heading-separator\">Votre profil est désactivé</h2>";
            echo "  <h2 class=\"heading-separator\">Veuillez-contactez un responsable afin d'activer votre compte</h2>";
            echo "<br /><h2><a href=\"./session.php\">Connexion</a></h2>";
            echo "<br /><h2><a href=\"./session.php\">Revenir à la page d'accueil</a></h2>";
            echo " </div>";
        }
    }


        $req1=" SELECT pfl_role from t_profil_pfl 
        JOIN t_compte_cpt USING(cpt_pseudo)
        where cpt_pseudo='".$id."' AND mdp= MD5('".$mdp."');";
        //echo ($req1);
        $res1 = $mysqli->query($req1);

    if ($res1==false) {
        // La requête a echoué
        echo "Error: Problème d'accès à la base \n";
        exit();
        }
        else {
            $r=$res1->fetch_assoc();
            $role= $r['pfl_role'];
    
        }

    if($ligne["pfl_validite"]=='A')
    {
        $_SESSION['login']=$id;
        $_SESSION['role']= $role;         /* Affecter la valeur du rôle à $_SESSION['role']*/
        header("Location:admin_accueil.php"); 
    }
 // else
  //{ // aucune ligne retournée => le compte n'existe pas ou n'est pas valide
   //echo "pseudo/mot de passe incorrect(s) ou profil inconnu !";
   //echo "<br /><a href=\"./session.php\">Cliquez ici pour réafficher le formulaire</a>";
   //}

   

} 
else 
{
    echo "<div class=\"text-center\">";
    echo "<br / ><h2><a href=\"./session.php\">Veuillez entrer vos identifiants à nouveau </a></h2>";
    echo " </div>";
    
}


//Ferme la connexion avec la base MariaDB
$mysqli->close();
?>


<footer id="colophon" class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-4 col-xs-6">
                    <a class="site-title"><span>ReachSeoul</span></a>

                </div>
                <div class="col-lg-offset-4 col-md-3 col-sm-4 col-md-offset-2 col-sm-offset-0 col-xs-6 ">
                    <h3>Keep in touch</h3>
                    <ul class="list-unstyled contact-links">
                        <li><i class="fa fa-envelope" aria-hidden="true"></i>reach@hotmail.fr</li>
                        <li><i class="fa fa-phone" aria-hidden="true"></i>Téléphone: +33 747524028</a></li>
                        <li><i class="fa fa-map-marker" aria-hidden="true"></i>Adresse : 148 Av. d'Italie, 75013 Paris </li>
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
  

</body>
</html>