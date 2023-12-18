<?php
session_start();
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
ob_start();
require_once "crudHeure.php";
$crud = new crudHeure();
$matricule=$_GET['matricule'];
$postier=$crud->findH($matricule); 
$title=""; 

$nom=$_SESSION['nom'];
$prenom=$_SESSION['prenom'];
$matricule=$_SESSION['matricule'];
        

                
       

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
            font-family:serif;
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
  /* background-color:#A9A8B3;*/
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
<?php  if($postier){  ?>
<table id="example" class="table table-secondary table-hover" style="width:100%">
<tr>
<th id="th">Matricule</th>
        <th id="th">Mois</th>
        <th id="th">Année</th>
        <th id="th">Nombre d'heures</th>
        <th id="th">Gestionnaire</th>
        <th id="th">Brut(Dt)</th>
       <!-- <th>Valide</th>-->
        <!--<th>Date validation</th>-->
        <th id="th">Réference</th>
        
       
</tr>
</thead>
<tbody>
</main>
<?php
   
    echo "<tr>";
        foreach ($postier as $value){
            echo "<td>$value</td>";
           
        }
        echo "</tr>";
    
    echo "</tbody></table>";}
            else echo" <p style='color:red;margin-top:73px;  font-family:serif;font-size:26px; text-align:center; font-weight:bold;'>Aucune Idemnité heure nuit pour le moment...</p> ";?>
    
    <footer>	</h6>Tous droits réservés © 2023  </h6>
	</footer>
            </body>
            </html>