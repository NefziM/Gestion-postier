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
//crée une instance de la classe crudAb.php
require_once "crudAb.php";
$crud= new crudAb();
//Cette méthode est utilisée pour récupérer toutes les demandes absences enregistrées dans la base de données.
$lespostiers=$crud->findAllPA();
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
        width:250px;
        margin-left:-30px;
        box-shadow:0px 0px 3px 3px ;
        margin-top:50px;
        font-family:serif;
        
        
       

    }
        td{color:black;
            text-align:center;}
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
    text-align:center;
}
#r{
            color:#A91515;
            background-color:none;
            font-size:14px;
            font-family:serif;
            font-weight:bold;
            position:sticky;
          margin-right:-20px;
            
        }
  #r:hover{
            color:black;
            background-color:#CC1515;
            border: 0.5px solid #121773;
            font-weight:bold;
        }
        #accept{
            color:#187A1D;
            background-color:none;
            font-size:14px;
            font-family:serif;
            font-weight:bold;
            position:sticky;
          margin-right:-8px;
            
        }
  #accept:hover{
            color:black;
            background-color:#78FF3C;
            border: 0.5px solid #121773;
            font-weight:bold;
        }     
        </style>
</head>
<body>
    <?php
    if($lespostiers){?>
<table  class="table table-secondary table-hover" >
<thead>
    <tr>
        <th  id="th" name="matricule">Matricule</th>
        <th id="th">Date d'absence</th>
        <th id="th">Type d'absence</th>
        <th id="th">Durée d'Absence(jours)</th>
       <!-- <th id="th">Raison</th>-->
        <th id="th">Etat d'absence</th>
        <th id="th">Id Demande </th>
        
        <th colspan="2" id="th">Action</th>
       
</tr>
</thead>
<tbody>
    <?php
    //Afficher la liste des demandes
    foreach ($lespostiers as $postier){
        echo "<tr>";
        //afficher les informations de chaque demande
        foreach ($postier as $value){
            echo "<td>$value</td>";
           
        }
        ?>
      
        <td>
       <!-- Lien pour accepter la demande avec le matricule correspondant en paramètre d'URL -->
<a href="accepter_demande.php?id=<?php echo $postier[5]; ?>" onclick="return confirm('Voulez-Vous vraiment accepter cette demande!!!')"><input type="button" value="Accepter" id="accept"></a>
<a href="rejeter_demande.php?id=<?php echo $postier[5]; ?>" onclick="return confirm('Voulez-Vous vraiment rejeter cette demande!!!')"><input type="button" value="Rejeter" id="r"></a>
</td>
     </tr>
     <?php }?>
     </tbody></table>
     <?php
     }
     else echo"<p style='font-family:serif ;color:#AD2012 ;margin-top:50px; font-size:20px;'>Pour le moment , n'est pas des demandes en attent ...</p>"; 
    
   
    $container =ob_get_clean();
    include "layoutabs.php";?>
    </body>
</html>
