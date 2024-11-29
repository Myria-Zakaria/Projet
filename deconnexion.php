<?php 

$mysqli = new mysqli('localhost','zzakarimy','h7dt1wke','zfl2-zzakarimy_1');
if ($mysqli->connect_errno) { 
 // Affichage d'un message d'erreur
 echo "Error: Problème de connexion à la BDD \n";
 // Arrêt du chargement de la page
 exit();
 }

 session_start();

        //Si la session n'est pas ouverte, redirection vers la page du formulaire
        // destruction de la session
        session_destroy(); 
        unset($_SESSION['login']);

        header("Location:session.php");

  //Ferme la connexion avec la base MariaDB
  $mysqli->close();

  ?>