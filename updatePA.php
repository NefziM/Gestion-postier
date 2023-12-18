<?php
// Démarre une session
session_start();
//Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
$title="";
//inclure le fichier "crudAb.php" en utilisant la fonction "require_once" 
require_once "crudAb.php";
ob_start();
//un nouvel objet "crudAb" est créé en utilisant le constructeur de la classe "crudH".
$crud= new crudAb();
//vérifie si la variable GET "matricule" est définie
if (isset($_GET['matricule'])){
    //stocke sa valeur dans la variable $mat
    $mat=$_GET['matricule'];
      //appelée la méthode finPA() pour rechercher un demande d'absence  dans la base de données
      $postier=$crud->findPA($mat);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mise à jour</title>
        <style>
       body{
            padding:0px;
            margin:0px;
            background-color:#D4D9CC;

           background-size:cover;
            position: absolute;
            width:1365px;
        }
        fieldset{
            width:455px;
            height:390px;
            margin-left:300px;
            position:absolute;
            border:solid #0A0A4F 1px;
            margin-top:50px;
            box-shadow:0px 0px 3px 3px rgb(85,85,85);
            padding-left:10px;
            border-radius:30px;
            color :#C6CEEE;
           padding-left:30px;
           font-size:15px;
           font-family:serif;
           line-height:25px;

           
        }
        #form{ margin-left:30px;
        margin-top:40px;
       }
        td{
            letter-spacing:1px;
            color:black;
        }

h3{
    text-align:center;
            font-family:serif;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
            margin-left:-13px;
            font-size:24px;
            font-weight:bold;
}
h3 span{
    color:#D69F20;
    font-size:22px;
   
}
       hr{
            border:3px solid #3B3D47;
            border-radius:10px;
            width:330px;
            margin-left:30px;
        }
        #submit{
            margin:20px 5px;
            color: #D69F20;
            background-color:#464959;
            width:120px;
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
            width:180px;
            line-height:25px;
            
       }
       
            select{
            background:none;
            border:none;
            border-bottom:1px solid #2F3342;
            outline:none;
            width:180px;
            line-height:25px;
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
        
  <fieldset>
    <h3><b>Modifier la <span>demande d'absence</span></b> </h3> <hr>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="form">
<table>
    <tr><td>
<b>Matricule :</b></td><td> <input type="number" readonly name="matricule" value="<?= $postier[0] ?>" id="" autocomplete="off"> 
</td></tr><tr><td>
<b>Date d'absence :</b></td><td> <input type="date" name="date_absence" value="<?= $postier[1] ?>" id="" autocomplete="off"> 
</td></tr>
<tr><td><label for="type_absence"><b>Type d'Absence :</b></label></td><td>
<select name="type_absence" id="typeab" value="<?= $postier[2] ?>" id="" autocomplete="off">
  <option value="">Sélectionnez un type</option>
  <option value="L'absence pour maladie">L'absence pour maladie</option>
  <option value="L'absence pour maternité/paternité">L'absence pour maternité/paternité</option>
  <option value="L'absence pour congé payé">L'absence pour congé payé</option>
  <option value="L'absence pour cause personnelle">L'absence pour cause personnelle</option>
  <option value="L'absence pour formation ">L'absence pour formation </option>
  <option value="L'absence pour grève">L'absence pour grève</option>
  <option value="Autre type">Autre type</option>
  
</select>  </td></tr>

 </td></tr>
<tr><td> <b>  Durée d'absence  : </b></td><td><input type="number" name="duree" value="<?= $postier[3] ?>" id="" autocomplete="off">
 </td></tr>
<tr><td><label for="etat_absence"><b>Type d'Absence :</b></label></td><td>
<select name="etat_absence" id="typeab"  id="" autocomplete="off" value="<?= $postier[4]?>" >
<option value="En attente" selected>En attente</option> 
<option value="approuvé">approuvé</option>
  <option value="rejeté">rejeté</option>
</select>  </td></tr>
</table><br>
<input type="submit" value="Enregistrer" name="edit" id="submit">
 </form>
</fieldset>
<?php
}
//vérifie si le formulaire a été soumis
if(isset($_POST['edit'])){
         //crée un nouvel objet postierA en utilisant les valeurs des champs envoyés via POST et en les nettoyant avec la fonction htmlspecialchars() pour éviter les failles XSS.
         $postA=new postierA(
        htmlspecialchars($_POST['matricule']),
            htmlspecialchars($_POST['date_absence']),
            htmlspecialchars($_POST['type_absence']),
            htmlspecialchars($_POST['duree']),
            htmlspecialchars($_POST['etat_absence'])
           
       
    );
           //Cette méthode effectue une mise à jour des données  dans la base de données.
  $res=$crud->updatePA($postA);
   //redirigée vers la page d'accueil
       header("location:findAllPA.php");
}  
$container=ob_get_clean();
include "layoutabs1.php";
?>
 </body>
    </html>