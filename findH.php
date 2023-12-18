<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
// Initialise le tampon de sortie
ob_start();
//crée une instance de la classe crudHeure.php
require_once "crudHeure.php";
$crud = new crudHeure();
//Récupère la valeur du paramètre matricule à partir de l'URL en utilisant la méthode HTTP GET et stocke la valeur dans la variable $matricule.
$matricule=$_GET['matricule'];
//Appelle la méthode findH() de la classe crudHeure pour récupérer une entrée de la table des heures correspondant au matricule spécifié. Le résultat est stocké dans la variable $postier.
$postier=$crud->findH($matricule); 
$title="Le postier recherché";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
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
    
}</style>
<body>
<table id="example" class="table table-secondary table-hover" >
<thead>
    <tr>
        <th id="th">Réference</th>
        <th id="th">Matricule</th>
        <th id="th">Mois</th>
        <th id="th">Annee</th>
        <th id="th">Nombre d'heures</th>
        <th id="th">Gestionnaire</th>
        <th id="th">Brut(Dt)</th>
        <th colspan="2" id="th">Action</th>
       
</tr>
</thead>
<tbody>
    <?php
    if($postier >0){ 
        $dernier = array_pop($postier); // extraire la dernière valeur de l'array
    echo "<tr>";
    echo "<td>$dernier</td>";//afficher la dernière valeur en premier
        foreach ($postier as $value){
            echo "<td>$value</td>";// afficher les autres valeurs d'ordre croissant
           
        }
        echo "<td><a href=deleteH.php?matricule=" . $matricule . "> <img src='corbeille.png'> </a></td>";
 echo "</tr>";
    
    echo "</tbody></table>";}
    else header("location:findAllH.php?etat=3");

    $container =ob_get_clean();
    include "layoutH.php";
    ?>
    
</body>
</html>

 
