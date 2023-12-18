<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
    // Récupère les informations de session de l'utilisateur
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];
    $matricule=$_SESSION['matricule'];
    //crée une instance de la classe crudPostier.php
require_once "crudPostier.php";
$crud = new crudPostier();
//Appelle la méthode findP() de la classe crudPostier pour récupérer une entrée de la table des heures correspondant au matricule spécifié. Le résultat est stocké dans la variable $postier.
$postier=$crud->findP($matricule); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Recherche</title>
    <style>
     
        body {
  font-family:serif;
 
  margin: 0;
  padding: 0;
  width:100%;
  background-size:cover;
}
        table{
            width:1000px;
           border:solid #F5CC53 5px ;
            margin-top:50px;
            box-shadow:1px 1px 3px 1px ;
            font-family:serif;
        }
        td{color:black;}
       img{width:20px;
    height:20px;
background:none;
background-color:none;}
        .retour{
            margin-top:-70px;
            margin-left:-120px;
            background:none;
background-color:none;
            border-radius:5px;
            width:50px;
        }
        i{color:black;}
        .fa-icon {
  width: 50px;
}
h2{
    text-align:center;
            font-family:verdana;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
}
h2 span{
    color:#D69F20;
}
#th{
    color:#D69F20;
    background-color:#CFD1C2;
    
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
   width:1365px;
   margin-left:-20px;
   
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
   margin-top:330px;
   width:1350px;
   margin-left:-35px;
  
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
				<li><a href="infosperson.php?matricule=<?=$matricule?>">Informations Personnels</a></li>
				<li><a href="poste_nuit.php?matricule=<?=$matricule?>">l'indemnités heure de nuit</a></li>
				<li><a href="demandes.php?matricule=<?=$matricule?>">Les demandes d'absences</a></li>
				
			</ul>
</nav></header> 
<main>
<a href="accueilpos.php"><i class="fas fa-arrow-left" style="color:#121773;"></i> </a>
<table id="example" class="table table-secondary table-hover" style="width:100%">
<tr>
        <th  id="th">Matricule</th>
        <th  id="th">CIN</th>
        <th  id="th">Nom</th>
        <th  id="th">Prénom</th>
        <th  id="th">Date de naissance</th>
        <th  id="th">Grade</th>
        <th  id="th">Adresse</th>
        <th  id="th">Salaire</th>
        <th  id="th">DEA</th>
        <th  id="th">Direction</th>
        
       
</tr>
</thead>
<tbody>
</main>
    <?php
    //if cette matricule est disponible
    if ($postier !=""){ 
        echo "<tr>";
        //Afficher tout les informations de cette postier 
        foreach ($postier as $value){
            echo "<td>$value</td>";
           
        }    
        echo "</tr>
        <tr></tbody></table>";
    }//sinon afficher le message alerte suivant 
        else { echo"<script> alert('Cette matricule introuvable !!!')</script>";
            header("location:findAllP.php");}
            ?>
    
    <footer>	</h6>Tous droits réservés © 2023  </h6>
	</footer>
            </body>
            </html>