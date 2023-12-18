<?php
// Démarre une session
session_start();
  // Récupère les informations de session de l'utilisateur
$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$matricule=$_SESSION['matricule'];
//Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        body {
   font-family: Arial, sans-serif;
   margin: 0px;
   padding: 0;
   width:1375px;;
 }
 
 header {
   background-color:#9C9687;
   color:#0A0A4F;
   text-align: center;
   padding: 20px;
   
   height:90px;
 }
 
 nav {
   background-color:#BDB7A4 ;
   color: #00529c;
   text-align: center;
   padding-top: 10px;
   margin-top:20px;
   margin-left:-19px;
   
 }
 
 nav ul {
   list-style-type: none;
   margin: 0;
   padding: 0;
 }
 
 nav li {
   display: inline-block;
   margin-right: 20px;
 }
 
 nav a {
   color: #00529c;
   text-decoration: none;
 }
 
 nav a:hover {
   text-decoration: underline;
 }
 
 header h1 {
     margin-left: 0px;
 }
 
 
 
 main {
     padding: 20px;
     max-width: 1300px;
   margin: 0 auto;
   
   text-align: justify;
   height:340px;
   background-color:#fbfbfb;
 }
 
 h2 {
     font-size: 32px;
     margin-bottom: 20px;
 }
 
 h3 {
     font-size: 15px;
     margin-right: 1850px;
     margin-left:50px;
     margin-top:-35px;
     font-family:serif;
     
     
 }
 
 ul {
     margin-bottom: 20px;
 }
 
 ul li {
     margin-bottom: 10px;
 }
 
 footer {
   background-color: #0E144E;
   color: white;
   text-align: center;
   padding: 10px;
  
 }
 
 h1 {
   font-size: 36px;
   font-weight: bold;
   color:#F5CC53;
   margin-top:-70px;
 }
 
 h1 span {
   color: #121773;
 }
 header img {
   width: 100px;
   height: 50px;
   margin-left: -1300px;
   
 }
 </style>
</head>
<body>
   <header>
    <img src="user.png"><b> <h3> <?=$nom."_".$prenom?></h3></b>
<nav>
<ul>
  <!--des liens redériger pour les informations de cette postier -->
				<li><a href="infosperson.php?matricule=<?=$matricule?>">Informations Personnels</a></li>
				<li><a href="poste_nuit.php?matricule=<?=$matricule?>">l'indemnités heure de nuit</a></li>
				<li><a href="demandes.php?matricule=<?=$matricule?>">Les demandes d'absences</a></li>
				
			</ul>
</nav></header> 
   <main></main>
   <footer>	</h6>Tous droits réservés © 2023  </h6>
	</footer>
</body>
</html>