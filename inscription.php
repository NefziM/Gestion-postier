<?php
// Démarre une session
session_start();
// Redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
if(!isset($_SESSION['matricule'])|| !isset($_SESSION['pw']) ){
    header("location:login.php");exit;}
    //crée une instance de la classe crudInscription.php
require_once "crudInscription.php";
$crud=new crudInscription();
$title ="";
// Initialise le tampon de sortie
ob_start();
//Récupère la valeur du paramètre nom_formation à partir de l'URL en utilisant la méthode HTTP GET et stocke la valeur dans la variable $matricule.
$formation = htmlspecialchars($_GET['nom_formation']);
 // Récupère les informations de session de l'utilisateur
$matricule=$_SESSION['matricule'];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

	<title>Inscription</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <style>
              body {
  font-family:serif;
  margin: 0;
  padding: 0;
  width:100%;
}
nav {
  background-color:#BDB7A4 ;
  color: #00529c;
  text-align: center;
  padding: 10px;
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
  width:1330px;
  margin-left:-20px;
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
  max-width: 1375px;
  margin: 0 auto;
  padding: 20px;
 
  
  background-color:#fbfbfb;
}

form label {
	display: block;
	margin-bottom: 10px;
	font-weight: bold;
}
footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 10px;
 
}

form input, form textarea {
	display: block;
	width: 100%;
	padding: 10px;
	margin-bottom: 20px;
	border: 1px solid #ccc;
	border-radius: 5px;
}

form button {
	display: block;
	padding: 10px 20px;
	background-color:#BDB7A4;
	color:#121773;
	border: none;
	border-radius: 5px;
	cursor: pointer;
}

form button:hover {
	background-color: #555;
	color:#F5CC53;
}
h1 {
  font-size: 36px;
  font-weight: bold;
  color:#F5CC53;
  margin-top:-70px;
}

h1 span {
  color: #121773;
}
select{margin-left:230px;
margin-top:-20px;
display: block;
	
	padding: 10px;
	
	border: 1px solid #ccc;
	border-radius: 5px;}
	h2{color:#F5CC53;}
	header img {
  width: 100px;
  height: 100px;
  margin-right: 2000px;
  margin-top:-10px;
  border-radius:25px;
}
    </style>
</head>
<body>
	<header>
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
	</header>
	<main>
		<h2>Remplissez le formulaire d'inscription</h2>
		<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		<label for="name">Matricule</label>
			<input type="number" id="matricule" name="matricule" placeholder="Entrez votre matricule" required>
			<label for="email">Adresse e-mail</label>
			<input type="email" id="email" name="mail" placeholder="Entrez votre adresse e-mail" required>
			<b>Les formations disponibles</b>
			<input type="text" value=" <?= $formation ?>" name="nom_formation"><br><br><br>
			<button type="submit" name="ok">Inscription</button>
		</form>
	</main>
	<footer>
		<p>Tous droits réservés © 2023</p>
	</footer>
	<?php
//Vérifie si le formulaire a été soumis
	 if(isset($_POST['ok'])){
		 //Crée un nouvel objet inscription avec les données soumises
     //Utilise la fonction htmlspecialchars pour la sécurité et éviter les attaques XSS
     $post=new inscriptions(
			 htmlspecialchars($_POST['matricule']),
			 htmlspecialchars($_POST['mail']),
			 htmlspecialchars($_POST['nom_formation'])
			);
      //Redirige l'utilisateur vers la page d'accueil
	  	$crud->addInscription($post);
       //Redirige l'utilisateur vers la page d'accueil
	   header("location:AccueilFormation.php?etat=1");
       //Arrête l'exécution du script
   exit;
	    }
	
	
	 
	 ?>
</body>
</html>
