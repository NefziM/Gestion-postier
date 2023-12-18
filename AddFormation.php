<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
require_once "crudFormations.php";
// Instanciation de la classe crudFormations pour interagir avec la base de données

$crud=new crudFormations();
$title ="";
 // Initialise le tampon de sortie
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire d'ajout une formation</title>
    <style>
      body{
            padding:0px;
            margin:0px;
            background-color:#D4D9CC;
           background-size:cover;
            position: absolute;
            width:1375px;
        }
        fieldset{
            width:475px;
            height:420px;
            margin-left:300px;
            position:absolute;
            border:solid #0A0A4F 1px;
           margin-top:35px;
            box-shadow:0px 0px 3px 3px rgb(85,85,85);
            border-radius:30px;
            color :#C6CEEE;
           padding-left:12px;

           
        }
        form{ margin-left:10px;
  margin-top:-60px;
       }
        td{ 
            color:black;
        }
h3{
    text-align:center;
            font-family:serif;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
}
h3 span{
    color:#D69F20;
}
        hr{
            border:3px solid #3B3D47;
            border-radius:10px;
            width:400px;
            margin-left:30px;
            margin-top:10px;
        }
        #submit{margin-top:30px;
            color: #D69F20;
            background-color:#464959;
            width:190px;
            font-size:17px;
            border-radius:15px;
            border:1px solid grey;
            padding:10px;
            margin-left:130px;
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
            width:150px;}
        textarea{
          font-size:16px;
            border:1px solid black;
            outline:none;
            background-color:#B5C2C7;
            border-bottom:1px solid #2F3342;
            color:black;
            width:150px;}
            #file {
          font-size:16px;
            border:none;
            color:black;
            width:280px;}
    </style>
</head>
<body>
<fieldset >
<h3><b>Ajouter d'un n<span>ouvel formation</span></b></h3><hr>
  <form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" >
  <table><tr><td><b>Nom de la formation :</b></td><td>
  <input type="text" name="nom_formation" ></td></tr><br>

  <tr><td><b> Date de début :</b></td><td>
  <input type="date" name="date_debut" ></td></tr><br>

  <tr><td><b>Date de fin :</b></td><td>
  <input type="date" name="date_fin" ></td></tr><br>

  <tr><td> <b>Description :</b></td><td>
  <textarea name="description"></textarea></td></tr><br>

  <tr><td><b>Photo :</b></td><td>
  <input type="file" name="photo" id="file"></td></tr></table>

  <button type="submit"  id="submit" name="ok"><b>Ajouter la formation</b></button>
</form>
      </fieldset>
</body>
<?php
//Vérifie si le formulaire a été soumis
if(isset($_POST['ok'])){
 //Crée un nouvel objet formations avec les données soumises
     //Utilise la fonction htmlspecialchars pour la sécurité et éviter les attaques XSS
     $formation=new formations(
    htmlspecialchars($_POST['nom_formation']),
    htmlspecialchars($_POST['date_debut']),
    htmlspecialchars($_POST['date_fin']),
    htmlspecialchars($_POST['description']),
    htmlspecialchars($_POST['photo'])
  );
  //Ajoute l'objet formations à la base de données
  $crud->addF($formation);
   //Redirige l'utilisateur vers la page d'accueil
   header("location:findAllFs.php");
   //Arrête l'exécution du script
   exit;
}
//Nettoie la sortie en cours (le tampon de sortie)
$container=ob_get_clean();
//inclure le contenu du fichier lauoutF dans cette page
include "layoutF.php";
?>
</html>
<?php

