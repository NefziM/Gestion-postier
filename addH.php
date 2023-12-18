<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
    $nom=$_SESSION['nom'];
    $prenom=$_SESSION['prenom'];
    $admin=$nom." ".$prenom;
// Inclure le fichier crudHeure.php qui contient la définition de la classe crudHeure
require_once "crudHeure.php";
// Créer une instance de la classe crudHeure et l'assigner à la variable $crud
$crud=new crudHeure();
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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>Formulaire d'ajout</title>
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
            height:430px;
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
b{ font-size:14.5 px;}

h3{
    text-align:center;
            font-family:verdana;
            color:#0A0A4F;
            letter-spacing:0.5px;
            margin-top:20px;
}
h3 span{
    color:#D69F20;
}
        hr{
            border:5px solid #3B3D47;
            border-radius:10px;
            width:350px;
            margin-left:50px;
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
        #brut{
            margin-bottom:0px;
            width:27px;
            height:27px;
            border:none;
            background-color:#0A0A4F;
            padding:2px;
            margin-left:15px;
            margin-top:7px;
           
      border-radius: 5px;
     
      color: #F5CC53;
      border: none;
           
        }
        #brut:hover{
            color:black;
            background-color:#BFC3D5;

        }
    </style>
</head>
<body>
   
<fieldset >
<h3><b>Ajouter <span>un postier</span></b></h3><hr>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
<table>
    <tr><td><b>
Matricule :</b></td><td> <input type="number"  name="matricule" id="m" autocomplete="off"  > </td></tr>
<tr><td>  <b> Mois :</b></td><td>
<select name="mois" id="mo">
<option value="">Selectionnez un mois</option>
  <option value="Janvier">Janvier</option>
  <option value="Février">Février</option>
  <option value="Mars">Mars</option>
  <option value="Avril">Avril</option>
  <option value="Mai">Mai</option>
  <option value="Juin">Juin</option>
  <option value="Juillet">Juillet</option>
  <option value="Août">Août</option>
  <option value="Septembre">Septembre</option>
  <option value="Octobre">Octobre</option>
  <option value="Novembre">Novembre</option>
  <option value="Décembre">Décembre</option>
</select>

 </td></tr>
<tr><td>   <b> Année : </b></td><td><input type="number" id="an" name="annee" min="1900" max="2100" autocomplete="off" required>    </td></tr>
<tr><td> <b>   Gestionnaire:</b></td><td> <input type="text" name="gestionnaire" value="<?= $admin ?>" id="gest" autocomplete="off"> </td></tr>
<?php
// Affiche une ligne de tableau contenant un champ pour entrer le nombre d'heures travaillées
// La valeur affichée dans le champ est celle passée en paramètre s'il existe ou une chaîne vide sinon
  echo '<tr><td> <b>  Nombre d heures:  </b></td><td><input type="number" step="0.01" name="heure"  id="h" autocomplete="off" value="' . ($heures ?? '') . '"> </td>';
 // Affiche un bouton de soumission et une icône pour calculer le salaire brut
 echo '<td><button type="submit" name="submit" id="brut"><i class="fas fa-calculator"></i></button></td></tr>';
 // Affiche une ligne de tableau contenant un champ en lecture seule pour afficher le salaire brut calculé
// La valeur affichée dans le champ est celle passée en paramètre s'il existe ou une chaîne vide sinon
echo '<tr><td>  <b>  Brut :</b> </td><td><input type="float" step="0.01" name="brut" id="b" autocomplete="off" value="' . ($brutNuit ?? '') . '" readonly > </td>';
// Définit une fonction qui calcule le salaire brut pour les heures travaillées la nuit
  function calculBrutNuit($heuresTravaillees) {
    $tauxHoraire = 2.5; // taux horaire pour les heures de nuit
    $tauxBrut = $heuresTravaillees * $tauxHoraire  ; //calcule le salaire brut
    return $tauxBrut;// retourne le salaire brut calculé
  }
?>
</table>
<button type="submit"  name="ok" id="submit" autocomplete="off"><b>Ajouter</b></button>
    </form>
</fieldset>
    <?php
// Vérifie si le formulaire a été soumis
if(isset($_POST['submit'])){
   // Récupère les valeurs du formulaire et les stocke dans des variables
   $m=htmlspecialchars($_POST['matricule']);
    $mo=htmlspecialchars($_POST['mois']);
    $an=htmlspecialchars($_POST['annee']);
    $gest=htmlspecialchars($_POST['gestionnaire']);
    $h=htmlspecialchars($_POST['heure']);
    $b=calculBrutNuit($h);
   // Affiche les valeurs récupérées dans les champs correspondants du formulaire
    echo "<script>document.getElementById('m').value = '$m';</script>";
    echo "<script>document.getElementById('mo').value = '$mo';</script>";
    echo "<script>document.getElementById('an').value = '$an';</script>";
    echo "<script>document.getElementById('gest').value = '$gest';</script>";
    echo "<script>document.getElementById('h').value = '$h';</script>";
    echo "<script>document.getElementById('b').value = '$b';</script>";
}  
  // Vérifie si le formulaire a été soumis avec le bouton "ok"
    if(isset($_POST['ok'])){
         //Crée un nouvel objet heure_nuit avec les données soumises
     //Utilise la fonction htmlspecialchars pour la sécurité et éviter les attaques XSS
     $posth=new heure_nuit(
           $m= htmlspecialchars($_POST['matricule']),
            $mo=htmlspecialchars($_POST['mois']),
            $an=htmlspecialchars($_POST['annee']),
            $h=htmlspecialchars($_POST['heure']),
            $gest=htmlspecialchars($_POST['gestionnaire']),
            $b=htmlspecialchars($_POST['brut'])
        );
       
       // Ajoute l'objet "heure_nuit" à la base de données
       $crud->addH($posth);
         // Redirige vers la page de recherche des heures avec un état de succès
      header("location:findAllH.php?etat=1");exit;
      
   
    }
    
   // Stocke le contenu du tampon de sortie dans une variable et affiche la page de mise en forme
    $container=ob_get_clean();
    include "layouth1.php";
    ?>
    </body>
</html>