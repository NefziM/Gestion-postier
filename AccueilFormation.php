<?php
 if(isset($_GET['etat']))
 { $etat=$_GET['etat'];
     switch($_GET['etat'])
     {
         case 1:echo"<script >alert('Inscription avec succés');</script>";
                 break;
         
 
                 
        
     }}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Gestion des formations | Poste Tunisien</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
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

section {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
  text-align: justify;
  height:369px;
  background-color:#fbfbfb;
}

footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 10px;
 
}


header img {
  width: 120px;
  height: 100px;
  margin-right: 2000px;
  margin-top:-10px;
  border-radius:25px;
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

i{margin-left:-250px;}
    </style>
  </head>
  <body>
    <header>
    <a href="accueil.php"><img src="logo.GIF"></a>
    <h1>Gestion des formations |<span> Poste Tunisien</span></h1>
    </header>
    <nav>
      <ul>
        <li><a href="AccueilFormation.php">Accueil</a></li>
        <li><a href="formationdispo.php">Formations disponibles</a></li>
        
      </ul>
    </nav>
    <section>
    <a href="accueilpos.php"><i class="fas fa-arrow-left" style="color:#121773;"></i> </a>

      <h2>Bienvenue dans notre système de gestion des formations</h2>
      <p>Ici, vous pouvez trouver toutes les informations sur les formations disponibles et les inscriptions pour les sessions de formation. Nous proposons des formations en rapport avec les métiers postaux, tels que la distribution de courrier, la gestion des bureaux de poste et la sécurité des colis.</p>
      <p>Nous offrons également des formations sur les compétences professionnelles, telles que la communication interpersonnelle, la résolution de problèmes et la gestion du temps. Nous croyons que ces compétences sont importantes pour tous nos employés, quelle que soit leur fonction.</p>
      <p>Explorez nos formations et inscrivez-vous pour développer vos compétences professionnelles et améliorer votre performance au travail.</p>
    </section>
    <footer>
      <p>&copy; 2023 Poste Tunisien | Gestion des formations</p>
    </footer>
  </body>
</html>
