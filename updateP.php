<?php
// Démarre une session
session_start();
//Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
$title="";
//inclure le fichier "crudPostier.php" en utilisant la fonction "require_once" 
require_once "crudPostier.php";
ob_start();
//un nouvel objet "crudPostier" est créé en utilisant le constructeur de la classe "crudH".
$crud= new crudPostier();
//vérifie si la variable GET "matricule" est définie
if (isset($_GET['matricule'])){
    //stocke sa valeur dans la variable $mat
    $mat=$_GET['matricule'];
     //appelée la méthode finP() pour rechercher un postier  dans la base de données
    $postier=$crud->findP($mat);
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
            margin-top:50px;
            box-shadow:0px 0px 3px 3px rgb(85,85,85);
            padding-left:10px;
            border-radius:30px;
            color :#C6CEEE;
           padding-left:30px;

           
        }
        #form{ margin-left:50px;
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
}
h3 span{
    color:#D69F20;
}
        hr{
            border:5px solid #3B3D47;
            border-radius:10px;
            width:280px;
            margin-left:18px;
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
        
  <fieldset>
    <h3><b>Modifier <span>un postier</span></b></h3> 
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" id="form">
<hr><table>
    <tr><td>
<b>Matricule :</b></td><td> <input type="number" readonly name="matricule" value="<?= $postier[0] ?>" id="" autocomplete="off"> 
</td></tr>
<tr><td><b>   CIN :</b></td><td><input type="varchar" name="cin" value="<?= $postier[1] ?>" id="" autocomplete="off" > 
 </td></tr>
<tr><td> <b>  Nom : </b></td><td><input type="text" name="nom" value="<?= $postier[2] ?>" id="" autocomplete="off">
 </td></tr>
<tr><td> <b>  Prénom :</b> </b> </td><td><input type="text" name="prenom" value="<?= $postier[3] ?>" id="" autocomplete="off"> 
</td></tr>
<tr><td>  <b> Date de naissance:</b></td><td> <input type="date" name="date_naissance" value="<?= $postier[4] ?>" id="" autocomplete="off"> 
</td></tr>
<tr><td><label for="grade"><b>Grade de poste :</b></label></td><td>
<select name="grade" id="grade" value="<?= $postier[5] ?>" id="" autocomplete="off">
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
</select>
 
 </td></tr>
<tr><td><b>  Adresse: </b></td><td> <input type="text" name="adresse" value="<?= $postier[6] ?>" id="" autocomplete="off">
</td></tr>
<tr><td> <label for="salaire"><b>Salaire :</b></label></td><td> 
<input type="float" name="salaire" value="<?= $postier[7] ?>" id="" autocomplete="off">
</td></tr>
</td></tr>
<tr><td>  <b> Date de début :</b></td><td> <input type="date" name="date_debut" value="<?= $postier[8] ?>" id="" autocomplete="off"> 
</td></tr>
<tr><td><label for="direction"><b>Direction de poste :</b></label> </td><td>

<select name="direction" id="direction"  id="" autocomplete="off" >
  <option value="<?= $postier[9] ?>">Sélectionnez une direction</option>
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
 
</td></tr>
<tr><td> </td ><td>    
</td></tr>
</table>
<input type="submit" value="Edit" name="edit" id="submit">
 </form>
</fieldset>
<?php
}
//vérifie si le formulaire a été soumis
if(isset($_POST['edit'])){
       //crée un nouvel objet postier en utilisant les valeurs des champs envoyés via POST et en les nettoyant avec la fonction htmlspecialchars() pour éviter les failles XSS.
    $post=new postier(
        htmlspecialchars($_POST['matricule']),
        htmlspecialchars($_POST['cin']),
        htmlspecialchars($_POST['nom']),
        htmlspecialchars($_POST['prenom']),
        htmlspecialchars($_POST['date_naissance']),
        htmlspecialchars($_POST['grade']),
        htmlspecialchars($_POST['adresse']),
        htmlspecialchars($_POST['salaire']),
        htmlspecialchars($_POST['date_debut']),
        htmlspecialchars($_POST['direction'])
    );
         //Cette méthode effectue une mise à jour des données de postier dans la base de données.
    $res=$crud->updateP($post);
    //redirigée vers la page d'accueil
       header("location:findAllP.php");
}  
$container=ob_get_clean();
include "layoutp1.php";
?>
 </body>
    </html>