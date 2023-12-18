<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
// Inclure le fichier crudPostier.php qui contient la définition de la classe crudHeure
require_once "crudPostier.php";
// Créer une instance de la classe crudPostier et l'assigner à la variable $crud
$crud=new crudPostier();
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
            height:500px;
            margin-left:300px;
            position:absolute;
            border:solid #0A0A4F 1px;
            margin-top:35px;
            box-shadow:0px 0px 3px 3px rgb(85,85,85);
            padding-left:10px;
            border-radius:30px;
            color :#C6CEEE;
           padding-left:30px;

           
        }
        form{ margin-left:15px;
        margin-top:20px;
        padding:20px;
       }
        td{
            letter-spacing:1px;
            color:black;
        }

h3{
    text-align:center;
            font-family:verdana;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
            font-size:25px;
}
h3 span{
    color:#D69F20;
}
        hr{
            border:3px solid #3B3D47;
            border-radius:10px;
            width:400px;
            margin-left:25px;
            margin-top:10px;
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
<h3><b>Ajouter un n<span>ouvel postier</span></b></h3><hr>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<table>
    <tr><td>
<b>Matricule :</b></td><td> <input type="number"  name="matricule" id="" autocomplete="off" pattern="\d{5}"> </td></tr>
<tr><td> <b>  CIN :</b></td><td><input type="varchar" name="cin"  id="" autocomplete="off"> 
 </td></tr>
<tr><td> <b>  Nom :</b> </td><td><input type="text" name="nom"  id="" autocomplete="off"> </td></tr>
<tr><td> <b>  Prénom :</b>  </td><td><input type="text" name="prenom"  id="" autocomplete="off"> </td></tr>
<tr><td>  <b> Date de naissance:</b></td><td> <input type="date" name="date_naissance"  id="" autocomplete="off"> </td></tr>
<tr><td><label for="grade"><b>Grade de poste :</b></label></td><td>
<select name="grade" id="grade"  id="" autocomplete="off">
  <option value="">Sélectionnez un grade</option>
  <option value="Employé">Employé</option>
  <option value="Agent">Agent</option>
  <option value="Technicien">Technicien</option>
  <option value="Adjoint administratif">Adjoint administratif</option>
  <option value="Chargé de mission">Chargé de mission</option>
  <option value="Contrôleur financier">Contrôleur financier</option>
  <option value="Conseiller">Conseiller</option>
  <option value="Chef de service">Chef de service</option>
  <option value="Chef de division">Chef de division</option>
  <option value="Directeur">Directeur</option>
</select>  </td></tr>
<tr><td> <b> Adresse:</b> </td><td> <input type="text" name="adresse" id="" autocomplete="off"></td></tr>
<tr><td> <label for="salaire"><b>Salaire </b>:</label></td><td> 
<input type="float" name="salaire" id="" autocomplete="off">
 </td></tr>
<tr><td>  <b> Date de début :</b></td><td> <input type="date" name="date_debut"  id="" autocomplete="off"> </td></tr>
<tr><td>   <label for="direction"><b>Direction de poste :</b></label> </td><td>
<select name="direction" id="direction">
  <option value="">Sélectionnez une direction</option>
  <option value="Ariana">Ariana</option>
  <option value="Béja">Béja</option>
  <option value="Ben Arous">Ben Arous</option>
  <option value="Bizerte">Bizerte</option>
  <option value="Gabès">Gabès</option>
  <option value="Gafsa">Gafsa</option>
  <option value="Jendouba">Jendouba</option>
  <option value="Kairouan">Kairouan</option>
  <option value="Kasserine">Kasserine</option>
  <option value="Kébili">Kébili</option>
  <option value="Le Kef">Le Kef</option>
  <option value="Mahdia">Mahdia</option>
  <option value="La Manouba">La Manouba</option>
  <option value="Médenine">Médenine</option>
  <option value="Monastir">Monastir</option>
  <option value="Nabeul">Nabeul</option>
  <option value="Sfax">Sfax</option>
  <option value="Sidi Bouzid">Sidi Bouzid</option>
  <option value="Siliana">Siliana</option>
  <option value="Sousse">Sousse</option>
  <option value="Tataouine">Tataouine</option>
  <option value="Tozeur">Tozeur</option>
  <option value="Tunis">Tunis</option>
  <option value="Zaghouan">Zaghouan</option>
</select>
 </td></tr></table>
    <button type="submit"  name="ok" id="submit"><b> Ajouter</b></button>
    </form>
</fieldset>
    <?php
     // Vérifie si le formulaire a été soumis avec le bouton "ok"
   if(isset($_POST['ok'])){
         //Crée un nouvel objet Postier avec les données soumises
     //Utilise la fonction htmlspecialchars pour la sécurité et éviter les attaques XSS
     
           $m= htmlspecialchars($_POST['matricule']);
           $c= htmlspecialchars($_POST['cin']);
           $n= htmlspecialchars($_POST['nom']);
           $p= htmlspecialchars($_POST['prenom']);
           $dn= htmlspecialchars($_POST['date_naissance']);
           $g= htmlspecialchars($_POST['grade']);
           $a= htmlspecialchars($_POST['adresse']);
           $s= htmlspecialchars($_POST['salaire']);
            $dd=htmlspecialchars($_POST['date_debut']);
            $d=htmlspecialchars($_POST['direction']);
    
         // vérifier si le matricule existe déjà
  $existePostier = $crud->findP($m);
  if ($existePostier) { 
    echo "<script>alert('Cette Matricule est existe déja !!');</script>";}
  else{    
    $post=new Postier(
        $m ,
        $c,
        $n,
        $p,
        $dn,
        $g,
        $a,
        $s,
         $dd,
         $d
);
        // Ajoute l'objet "Postier" à la base de données
     $res=$crud->addP($post);
    
        header("location:findAllP.php?etat=3");
       // Redirige vers la page de recherche des heures avec un état de succès
    
    } }
    // Stocke le contenu du tampon de sortie dans une variable et affiche la page de mise en forme
    $container=ob_get_clean();
    include "layoutp1.php";
    ?>
    </body>
</html>