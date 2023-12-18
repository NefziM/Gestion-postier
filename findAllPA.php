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
            font-family:serif;
           background-size:cover;
            position: absolute;
            width:1375px;
            
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
        
        </style>
</head>
<body>

    <h2><b>Liste des dem<span>andes d'absences</span></b></h2>
<?php
// Remplacez les noms d'hôte, d'utilisateur, de mot de passe et de base de données par les vôtres
$pdo = new PDO('mysql:host=localhost;dbname=gestionposte', 'root', '');
// Récupérer la liste des demandes
$sql = "SELECT * FROM absence";
$res = $pdo->query($sql);

// Afficher la liste des demandes
while ($row = $res->fetch()) {
// Afficher les informations de chaque demande
    echo "<b>Numéro du demande : </b>" . $row['id'] . "<br>";
    echo "<b>Matricule :</b>" . $row['matricule'] . "<br>";
    echo "<b>Date d'absence : </b>" . $row['date_absence'] . "<br>";
    echo "<b>Type d'absence : </b>" . $row['type_absence'] . "<br>";
    echo "<b>Durée d'absence :</b> " . $row['dure_absence'] . "<br>";
    echo "<b>État de la demande :</b> " . $row['etat_absence'] . "<br>";
  

// Afficher les boutons "Accepter" et "Rejeter" correspondants
if ($row['etat_absence'] == "En attente") {
    echo "<a href='accepter_demande.php?id=". $row['id'] ."' onclick=\"return confirm('Voulez-vous vraiment accepter cette demande ?')\">Accepter</a>
    <a href='rejeter_demande.php?id=". $row['id'] ."' onclick=\"return confirm('Voulez-vous vraiment rejeter cette demande ?')\">Rejeter</a>";
}


 // Ajouter un séparateur entre chaque demande
    echo "<hr>";}

    $container =ob_get_clean();
    include "layoutabs.php";
    ?>
    </body>
</html>
