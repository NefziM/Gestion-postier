<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
 // Initialise le tampon de sortie
 ob_start();
 //crée une instance de la classe crudAb.php
require_once "crudAb.php";
$crud= new crudAb();
//Récupère la valeur du paramètre matricule à partir de l'URL en utilisant la méthode HTTP GET et stocke la valeur dans la variable $matricule.
$matricule=$_GET['matricule'];
//Appelle la méthode findPA() de la classe crudAb pour récupérer une entrée de la table des heures correspondant au matricule spécifié. Le résultat est stocké dans la variable $postier.
$postier=$crud->findPA($matricule); 
$title=" Le postier recherché";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recherche</title>
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
    </style>
</head>
<body>
<table id="example" class="table table-secondary table-hover" style="width:100%">
<tr>
<th id="th">Matricule</th>
        <th id="th">Date d'absence</th>
        <th id="th">Type d'absence</th>
        <th id="th">Durée d'Absence(jours)</th>
        <th id="th">Etat d'absence</th>
        <th colspan="2"  id="th">Action</th>
       
</tr>
</thead>
<tbody>
    <?php
    if ($postier !=""){ 
        echo "<tr>";
        //afficher tout les informations des demandes d'absences  dans un tableau 
        foreach ($postier as $value){
            echo "<td>$value</td>";
           
        }   echo "<td><a href=deletePA.php?matricule=" . $matricule . "> <img src='corbeille.png'> </a></td>";
        echo "<td><a href=updatePA.php?matricule=". $matricule ."> <img src='edit.png'>  </a></td>";
        echo "</tr>
        <tr></tbody></table>";
    }//sinon afficher cette message alerte
        else { echo"<script> alert('Cette matricule introuvable !!!')</script>";
            header("location:findAllP.php");}

    $container =ob_get_clean();
    include "layoutabs.php";
    ?>
    
    
</body>
</html>
