<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
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
//crée une instance de la classe crudFormations.php
require_once "crudFormations.php";
$crud= new crudFormations();
//Cette méthode est utilisée pour récupérer toutes les formations enregistrées dans la base de données.
$formations=$crud->findAllFs();
?><!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gestion des formations | Poste Tunisien</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
  font-family:serif;
  margin: 0;
  padding: 0;
  width:100%;
}

header {
 /* background-color:#A9A8B3;*/
  background-color:#9C9687;
  color: white;
  text-align: center;
  padding: 20px;
}

nav {
  background-color:#BDB7A4 ;
  color: #00529c;
  text-align: center;
  padding: 10px;
}

nav ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

nav li {
  display: inline-block;
  margin-right: 20px;
}

nav a {
  color: #00529c;
  text-decoration: none;
}

nav a:hover {
  text-decoration: underline;
}

main {
  width: 1375px;
  margin: 0 auto;
  padding-left: 20px;
  height:100%;
  background-color:#fbfbfb;
}

footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 10px;
 height:20px;
 margin-top:30px;
}
footer p{margin-top:-5px;}

header img {
  width: 100px;
  height: 100px;
  margin-right: 2000px;
  margin-top:-10px;
  border-radius:25px;
}
h1 {
  font-size: 36px;
  font-weight: bold;
  color: #121773;
  margin-top:-70px;
}

h1 span {
  color:#F5CC53;
}
img{ width:100px; height:80px;}
#div1{ color:#0E144E;
background-color:lightgray;
width:110px;
height:100px;
padding:20px;
font-size: 13px;
margin-left:200px;
box-shadow:  1px 2px;
border-radius: 10px;}
#div2{ color:#0E144E;
background-color:lightgray;
width:110px;
height:100px;
padding:20px;
margin-left: 480px;
margin-top: -140px;
font-size: 13px;
box-shadow: 1px 2px;
border-radius: 10px;}
#div3{ color:#0E144E;
background-color:lightgray;
width:110px;
height:100px;
padding:20px;
margin-left: 750px;
margin-top: -140px;
font-size: 13px;
box-shadow: 1px 2px;
border-radius: 10px;}
#div4{ color:#0E144E;
background-color:lightgray;
width:110px;
height:100px;
padding:20px;
margin-left: 1020px;
margin-top: -140px;
font-size: 13px;
box-shadow: 1px 2px;
border-radius: 10px;}
h2{color: #0E144E;
padding-bottom: 30px;}
.formations {
    display: flex;
   flex-wrap: wrap;
    justify-content: space-around;
   
}

.formation {
    width: 200px;
    margin: 20px;
    padding: 10px;
    background-color: #f7f7f7;
    border-radius: 5px;
    box-shadow:2px 8px 5px 2px rgba(0, 0, 0, 0.3);
}

.formation h2 {
    font-size: 16px;
    margin-top: 0;
    font-weight:bold;
    text-align:center;
}

.formation img {
    width: 100%;
    height: auto;
    border-radius: 5px;
    margin-top:5px;
    margin-bottom: 10px;
}

.formation p {
    font-size: 13px;
    margin-bottom: 10px;
    
}
#p{ font-size: 13px;
    margin-bottom: 10px;
    border:1px solid black;
padding-left:15px;}
.formation button {
    display: block;
    margin: 10px auto 0;
    padding: 5px 10px;
    background-color:#187A1D;
    color:black;
    border: none;
    border-radius: 3px;
    cursor: pointer;
    transition: all 0.3s ease;
    font-weight:bold;
}

.formation button:hover {
    background-color:#78FF3C;
}
    </style>
  </head>
  <body>
    <header>
    <a href="accueilpos.php"><img src="logo.GIF"></a>
    <h1>Gestion des formations |<span> Poste Tunisien</span></h1>
    </header>
    <nav>
        <ul>
            <li><a href="AccueilFormation.php">Accueil</a></li>
            <li><a href="formationdispo.php">Formations disponibles</a></li>
            
          
          </ul>
    </nav>
    <main>
        <h2>Formations disponibles</h2>
        <div class="formations">
<?php
// Afficher la liste des demandes

    
    foreach ($formations as $formation) {
        // Afficher les informations de chaque formation
        echo "<div class='formation'>";
        echo "<h2 name='nom_formation'>".$formation[1]."</h2>";
        echo "<img src='".$formation[5]."' alt='".$formation[1]."' />";
        echo "<p> <b>date de début :</b>".$formation[2]."</p>";
        echo "<p> <b>date fin :</b>".$formation[3]."</p>";
        echo "<p id='p'>".$formation[4]."</p>";
        echo "<form action='inscription.php' method='get'>";
        echo "<input type='hidden' name='nom_formation' value='".$formation[1]."' />";
        echo "<input type='hidden' name='id' value='".$formation[0]."' />";
        echo "<button type='submit' >Inscrire</button>";
        echo "</form>";
        echo "</div>";
    }
    

echo "</div>";

?>
 </main>
 
    <footer>
      <p>&copy; 2023 Poste Tunisien | Gestion des formations</p>
    </footer>
  </body>
</html>