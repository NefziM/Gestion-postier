<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
// Inclure le fichier crudAb.php qui contient la définition de la classe crudHeure
require_once "crudAb.php";
// Créer une instance de la classe crudAb et l'assigner à la variable $crud
$crud=new crudAb();
$title ="";
// Initialise le tampon de sortie
ob_start();

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout</title>
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
        fieldset{
            width:475px;
            height:450px;
            margin-left:300px;
            position:absolute;
            border:solid #0A0A4F 1px;
            margin-top:50px;
            box-shadow:0px 0px 3px 3px rgb(85,85,85);
            padding-left:10px;
            border-radius:30px;
            color :#C6CEEE;
           padding-left:30px;

           
        }
        form{ margin-left:50px;
        margin-top:40px;
       }
        td{
            letter-spacing:1px;
            color:black;
        }
b{ font-size:14.5 px;}

h3{
    text-align:center;
            font-family:verdana;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
            margin-left:-5px;
}
h3 span{
    color:#D69F20;
}
        hr{
            border:5px solid #3B3D47;
            border-radius:10px;
            width:340px;
            margin-left:50px;
        }
        #submit{
            margin:20px 5px;
            color: #D69F20;
            background-color:#464959;
            width:100px;
            font-size:17px;
            border-radius:15px;
            border:1px solid grey;
            padding:10px;
            margin-left:110px;
            box-shadow:0px 0px 1px 1px rgb(85,85,85);
        }
        #submit:hover{
            color:#0A0A4F;
            background-color:#BFC3D5;
        }
        input{
            font-size:16px;
            border:none;
            outline:none;
            background:none;
            border-bottom:1px solid #2F3342;
            color:black;
            width:150px;
            
       }
       
            select{
            background:none;
            border:none;
            border-bottom:1px solid #2F3342;
            outline:none;
            width:150px;
        }
        option{
            background-size:cover;
            background-color:#B5C2C7;
            cursor:pointer;
            padding:12px 24px;
        }
    </style>
</head>
<body>
   
<fieldset >
<h3><b>Ajouter un nouvel<span> demande d'absence</span></b></h3><hr>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<table>
    <tr><td>
<b>Matricule :</b></td><td> <input type="number"  name="matricule" id="" autocomplete="off"> </td></tr>
<tr><td>
<b>Date d'absence :</b></td><td> <input type="date"  name="date_absence" id="" autocomplete="off"> </td></tr>

<tr><td><label for="type_absence"><b>Type d'Absence :</b></label></td><td>
<select name="type_absence" id="typeab"  id="" autocomplete="off">
  <option value="">Sélectionnez un type</option>
  <option value="L'absence pour maladie">L'absence pour maladie</option>
  <option value="L'absence pour maternité/paternité">L'absence pour maternité/paternité</option>
  <option value="L'absence pour congé payé">L'absence pour congé payé</option>
  <option value="L'absence pour cause personnelle">L'absence pour cause personnelle</option>
  <option value="L'absence pour formation ">L'absence pour formation </option>
  <option value="L'absence pour grève">L'absence pour grève</option>
  <option value="Autre type">Autre type...</option>
  
</select>  </td></tr>
<tr><td> <b> Durée d'absence:</b> </td><td> <input type="number" name="duree" id="" autocomplete="off"></td></tr>
<tr><td><label for="etat_absence"><b>Etat d'Absence :</b></label></td><td>
<select name="etat_absence" id="typeab"  id="" autocomplete="off">
<option value="En attente" selected>En attente</option> 
</select>  </td></tr>
</table>
<button type="submit"  name="ok" id="submit"><b>Envoyer</b> </button>
    </form>
</fieldset>
    <?php
 //Vérifie si le formulaire a été soumis
  if(isset($_POST['ok'])){
          //Crée un nouvel objet PostierA avec les données soumises
     //Utilise la fonction htmlspecialchars pour la sécurité et éviter les attaques XSS
      $postA=new postierA(
            htmlspecialchars($_POST['matricule']),
            htmlspecialchars($_POST['date_absence']),
            htmlspecialchars($_POST['type_absence']),
            htmlspecialchars($_POST['duree']),
            htmlspecialchars($_POST['etat_absence'])
           
        );
   
       //Ajoute l'objet PostierA à la base de données
       $crud->addPA($postA);
    //Redirige l'utilisateur vers la page d'accueil des postiers avec le paramètre "etat" à 3 pour indiquer le succès de l'ajout
     header("location:accueilpos.php?etat=3");
    //Arrête l'exécution du script
    exit;}
    //Nettoie la sortie en cours (le tampon de sortie)
  $container=ob_get_clean();
    //inclue le contenue de page layoutabs1.php dans cette page
  include "layoutabs1p.php";
    ?>
    </body>
</html>