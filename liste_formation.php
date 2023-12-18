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
//inclut le fichier crudInscription.php qui contient la classe crudInscription.
require_once "crudInscription.php";
//crée une instance de la classe crudFormations
$crud= new crudInscription();
//Cette méthode est utilisée pour récupérer toutes les formations enregistrées dans la base de données.
$lespostiers=$crud->findAllI();
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
font-family:serif;
           background-size:cover;
            position: absolute;
            width:1375px;
        }
        table{
            width:1330px;
           border:solid #F5CC53 5px ;
            margin-top:50px;
            box-shadow:1px 1px 3px 1px ;
        }
        td{color:black;}
h2{
    text-align:center;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
            text-align:center;
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
    <h2><b>Liste de<span>s Inscrit(s)</span></b></h2>
    <?php if($lespostiers){?>
<table  class="table table-secondary table-hover" >
<thead>
    <tr>
    <th id="th">Matricule</th>
        <th id="th">CIN</th>
        <th id="th">Nom</th>
        <th id="th">Prénom</th>
        <th id="th">Adresse</th>
        <th id="th">Adresse mail</th>
        <th id="th">Nom de la formation</th>
              
</tr>
</thead>
<tbody>
    <?php
// Boucle à travers les résultats et afficher la liste des inscrits
foreach ($lespostiers as $postier){
        echo "<tr>";
        foreach ($postier as $value){
            echo "<td>$value</td>";
           
        }?>
        
     </tr>
     <?php
     }}else echo "<p style='font-family:serif ;color:#AD2012 ;margin-top:50px; font-size:20px;'>Pour le moment , n'est pas employés inscrits</p>"; 
     ?>
    </tbody></table> <!--</main>
   <footer>	</h6>Tous droits réservés © 2023  </h6>
	</footer>-->
    </body>
</html>
<?php
$container =ob_get_clean();
include "layoutF.php";?>