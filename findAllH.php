<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
   header("location:login.php");exit;}
  //vérifie si la variable etat est définie dans l'URL. Cela se produit lorsqu'un utilisateur annule un abonnement.
  if(isset($_GET['etat']))
{ $etat=$_GET['etat'];
    switch($_GET['etat'])
    {
        case 1:echo"<script>alert('Ajouter avec succés ...');</script>";
        break;
        case 2:echo"<script>alert('Echec d'ajout !!!');</script>";
        break;
        case 3:echo"<script>alert('Cette matricule est INTROUVABLE!!!');</script>";
        break;
      
                
       
    }
}
$title="";
// Initialise le tampon de sortie
ob_start();
//crée une instance de la classe crudHeure
require_once "crudHeure.php";
$crud= new crudHeure();
//Cette méthode est utilisée pour récupérer toutes les indemnités heures nuit enregistrées dans la base de données.
$lespostiers=$crud->findAllH();
?>
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
    body{
            
            background-color:#D4D9CC;
           background-size:cover;
            position: absolute;
            width:1365px;
        }
        table{
        width:250px;
        box-shadow:0px 0px 3px 3px ;
        margin-top:50px;
        margin-left:-100px;
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
        
        </style>
</head>
<body> <h2><b>Liste des<span> indemnités de nuit</span></b></h2>
<?php if($lespostiers){ ?>
    <table  class="table table-secondary table-hover" >
<thead>
    <tr>
    <th id="th">Réference</th>
        <th id="th">Matricule</th>
        <th id="th">CIN</th>
        <th id="th">Nom</th>
        <th id="th">Prenom</th>
        <th id="th">Date de naissance</th>
        <th id="th">Grade</th>
        <th id="th">Adresse</th>
        <th id="th">Salaire(Dt)</th>
        <th id="th">DEA</th>
        <th id="th">Direction</th>
        <th id="th">Mois</th>
        <th id="th">Annee</th>
        <th id="th">Nombre d'heure</th>
        <th id="th">Gestionnaire</th>
        <th id="th">Brut(Dt)</th>
        <th  id="th">Action</th>
       
</tr>
</thead>
<tbody>
    <?php
    
 //afficher la liste des indemnités heure nuit
 foreach ($lespostiers as $postier){
    $dernier = array_pop($postier); // extraire la dernière valeur de l'array
    echo "<tr>";
    echo "<td>$dernier</td>"; // afficher la dernière valeur en premier
    foreach ($postier as $value){
        echo "<td>$value</td>"; // afficher les autres valeurs dans l'ordre croissant
    };

?>
       <td> <a href="deleteH.php?matricule='<?=$postier[0]?>'" onclick="return confirm('Voulez-Vous vraiment supprimer cette ligne!!!')"> <img src='corbeille.png'></a></td> <!--Si vous voulez effacer cette ligne-->
   </tr>
    <?php
    }}else echo"<p style='font-family:serif ;color:#AD2012 ;margin-top:50px; font-size:20px;'> Il n y a pas des indemnités heures nuit</p>";?>
   </tbody></table>
   <?php

    $container =ob_get_clean();
    include "layoutH.php";
    ?>
    </body>
</html>
