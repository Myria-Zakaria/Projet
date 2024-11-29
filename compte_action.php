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

<?php 
//Ouverture d'une session
//session_start();

//1) On récupère et on teste les données saisies

 if ($_POST['pseudoselect']) //2) Tester les autres saisies
 {
    $id=$_POST['pseudoselect'];
    echo ($id);
    
}
 else
 {
 echo "Recommencez";}


  
$sql="SELECT * from t_profil_pfl where cpt_pseudo = '". $id."';";
echo ($sql);

$result = $mysqli->query($sql); 
    
    if ($result == false) //Erreur lors de l’exécution de la requête
    {
      // La requête a echoué
      echo "Error: La requête a échoué \n";
      echo "Query: " . $sql . "\n";
      echo "Errno: " . $mysqli->errno . "\n";
      echo "Error: " . $mysqli->error . "\n";
      exit;
    }
    else //Requête réussie
    {
      $val = $result->fetch_assoc();
      //Modification de la validité d'un profil
        
        if ($val['pfl_validite']=='A')
        {
           $de= "UPDATE t_profil_pfl
                 set pfl_validite ='D' /* pour activation set pfl_validite ='A'*/
                 where cpt_pseudo = '" .$id. "';";
                 //echo($sql2);
                 $req = $mysqli->query($de); 
                            
                if ($req == false) //Erreur lors de l’exécution de la requête
                 { // La requête a echoué
                     echo "Error: La requête a échoué \n";
                     echo "Query: " . $de . "\n";
                     echo "Errno: " . $mysqli->errno . "\n";
                     echo "Error: " . $mysqli->error . "\n";
                     exit;
                 }
                 else //Requête réussie
                {
                     header("Location:admin_accueil.php");
                }

        }

        else 
        {
            $ac= "UPDATE t_profil_pfl
            set pfl_validite ='A' /* pour activation set pfl_validite ='A'*/
            where cpt_pseudo = '" .$id. "';";
            //echo($sql2);
            $req1 = $mysqli->query($ac); 
                       
           if ($req1 == false) //Erreur lors de l’exécution de la requête
            { // La requête a echoué
                echo "Error: La requête a échoué \n";
                echo "Query: " . $req1 . "\n";
                echo "Errno: " . $mysqli->errno . "\n";
                echo "Error: " . $mysqli->error . "\n";
                exit;
            }
            else //Requête réussie
           {
            header("Location:admin_accueil.php");
        }
        }

    }




//Fermeture de la communication avec la base MariaDB
$mysqli->close();

?>
