<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
$title="";
// Initialise le tampon de sortie
ob_start();
//vérifie si la variable etat est définie dans l'URL. Cela se produit lorsqu'un utilisateur annule un abonnement.
if(isset($_GET['etat']))
{ $etat=$_GET['etat'];
    switch($_GET['etat'])
    {
        case 1:echo"<script>alert('Effacer avec succées');</script>";
                break;
        
        case 2:echo"<script>alert('Cette Matricule introuvable !!');</script>";
                break; 
        case 3:echo"<script>alert('Ajouter avec succés ...');</script>";
                break;     
       
    }
}
//inclut le fichier crudFormations.php qui contient la classe crudFormations.
require_once "crudFormations.php";
//crée une instance de la classe crudFormations
$crud= new crudFormations();
//Cette méthode est utilisée pour récupérer toutes les formations enregistrées dans la base de données.
$formations=$crud->findAllFs();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Accueil</title>
    <style>
         /* Style pour les formations */
    body{
            padding:0px;
            margin:0px;
            background-color:#D4D9CC;
font-family:serif;
           background-size:cover;
            position: absolute;
            width:1375px;
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
     
.formations {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
}

.formation {
    width: 200px;
    margin: 20px;
    padding: 10px;
    background-color: #f7f7f7;
    border-radius: 5px;
    box-shadow:2px 8px 5px 2px rgba(0, 0, 0, 0.3);
}

.formation h2 {
    font-size: 1.5rem;
    margin-top: 0;
}

.formation img {
    width: 100%;
    height: auto;
    margin-bottom: 10px;
    border-radius: 5px;
}

.formation p {
    font-size: 14px;
    margin-bottom: 10px;
}

.formation button {
    display: block;
    margin: 10px auto 0;
    padding: 5px 10px;
    background-color: #f44336;
    color:black;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight:bold;
}

.formation button:hover {
    background-color:#CC1515;
}
  
        </style>
</head>
<body> <h2><b>Liste des<span> formations disponibles</span></b></h2>
    <div class="formations">
<?php 

// Boucle à travers les résultats et afficher les formations
foreach ($formations as $formation) {
    echo "<div class='formation'>";
    echo "<h2>".$formation[1]."</h2>";
    echo "<img src='".$formation[5]."' alt='".$formation[1]."' />";
    echo "<p>".$formation[4]."</p>";
    echo "<form action='deleteformation.php' method='get'>";
    echo "<input type='hidden' name='id' value='".$formation[0]."' />";
    echo "<button type='submit' value='Effacer'>Effacer</button>";
   echo" </div>"; echo "</form>";
}
echo "</div>";
$container =ob_get_clean();
include "layoutF.php";
?>
