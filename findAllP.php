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
//crée une instance de la classe crudPostier.php
require_once "crudPostier.php";
$crud= new crudPostier();
//Cette méthode est utilisée pour récupérer toutes les postiers enregistrées dans la base de données.
$lespostiers=$crud->findAllP();
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
            padding:0px;
            margin:0px;
            background-color:#D4D9CC;

           background-size:cover;
            position: absolute;
            width:1375px;
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
<body>
    <h2><b>Liste de<span>s postier(s)</span></b></h2>

<table  class="table table-secondary table-hover" >
<thead>
    <tr>
        <th id="th"><b>Matricule</b></th>
        <th id="th" ><b>CIN</b></th>
        <th  id="th"><b>Nom</b></th>
        <th id="th"><b>Prénom</b></th>
        <th id="th"><b>D-D-N</b></th>
        <th id="th"><b>Grade<b></th>
        <th id="th">Adresse</b></th>
        <th id="th">Salaire</b></th>
        <th id="th">DEA</b></th>
        <th id="th">Direction</b></th>
        <th id="th" colspan="2">Action</b></th>
       
</tr>
</thead>
<tbody>
    <?php
     //afficher la liste des postiers
    foreach ($lespostiers as $postier){
        echo "<tr>";
        //afficher les informations de chaque postier
        foreach ($postier as $value){
            echo "<td>$value</td>";
           
        }?>
        <td> <a href="deleteP.php?matricule='<?=$postier[0]?>'" onclick="return confirm('Voulez-Vous vraiment supprimer cette ligne!!!')"> <img src='corbeille.png'> </a></td>
        <td><a href="updateP.php?matricule='<?=$postier[0]?>'"> <img src='edit.png'> </a></td>
       
     </tr>
     <?php
     }?>
    </tbody></table>
    <?php

    $container =ob_get_clean();
    include "layoutP.php";
    ?>
    </body>
</html>
