<?php
// Démarre une session
session_start();
// Récupère les informations de session de l'utilisateur
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
    // Initialise le tampon de sortie
    ob_start();
    $title="";
    if(isset($_GET['etat']))
{ $etat=$_GET['etat'];
    switch($_GET['etat'])
    {
        case 1:echo"<script >alert('Mot de passe et/ou login incorrecte');</script>";
                break;
        case 2:echo"<script>alert('Vous devez remplir tout les champs !!!');</script>";
        break;
        case 3:echo"<script>alert('Envoi avec succés');</script>";
        break;
        case 4:echo"<script>alert('Bienvenue $nom $prenom ');</script>";
                break; 

                
       
    }
}
   ?>
   <!DOCTYPE html>
   <html lang="en">
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Accueil</title>
    <style>
    body{
        padding:0px;
            margin:0px;
            font-family:serif;
            font-weight:bold;
            background-color:#ACB5AC;
            background-size:cover;
            position: absolute;
             width:1355px;
            height:550px;
        }
        #img1{
            width:50px;
            height:50px;
            margin-left:50px;
            margin-top:40px;
            color:#9C9687;
        }
        #img2{
            width:110px;
            height:60px;
            margin-left:25px;
            margin-top:40px;
            color:#9C9687;
        }
        h1{
            font-size:28px;
           
            margin-left:80px;
            
        }
        .postier{margin-left:70px;
            margin-top:160px;
            border-radius:45px;
            border:solid #F5CC53 3px;
            box-shadow:5px 5px 20px 1px rgb(85,85,85);
        width:180px;
    height:160px;
    padding-left:10px;
    background-color:#EFF5E0;
}
footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 7px;
  width:1378px;
 margin-left:-130px;
 margin-top:220px;
 height:45px;
 
}
.absence{
    margin-left:450px;
            margin-top:-160px;
            border-radius:45px;
            border:solid #F5CC53 3px;
            box-shadow:5px 5px 20px 1px rgb(85,85,85);
        width:180px;
    height:160px;
    padding-left:10px;
    background-color:#EFF5E0;
}
.formation{
    margin-left:800px;
            margin-top:-160px;
            border-radius:45px;
            border:solid #F5CC53 3px;
            box-shadow:5px 5px 20px 1px rgb(85,85,85);
        width:180px;
    height:160px;
    padding-left:10px;
    background-color:#EFF5E0;}


#ab{
    width:100px;
    height:90px;
    padding-top:-10px;
    padding-left:22px;
    
}
#h{
    margin-left:65px;
}
h6{
    color:#0D1059;
    text-align:center;
    font-weight:bold;
}
        </style>
   </head>
   <body>
    <div class="postier">
    <a href="infosperson.php"  > <img src="postier.png" id="img1"> </a> <br><h6>Informations personnels </h6> </div>
    <div class="absence">
    <a href="addDemande.php"  ><img src="absence.PNG" id="img1"></a> <br><h6>Construire demande absence </h6> </div>   
    <div class="formation">
    <a href="AccueilFormation.php" ><img src="formation.png" id="img2"></a> <br><h6>Gestion des formations</h6> </div>
    <footer>
		<h7>Tous droits réservés © 2023</h7>
	</footer> 
</body>
   </html>
    <?php
   // Récupère le contenu généré et nettoie la mémoire tampon de sortie
   $container=ob_get_clean();
   // Inclut le fichier de mise en page pour afficher le contenu généré
   include "layout.php";
    ?>