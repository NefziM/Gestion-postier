<?php

// Inclure le fichier crudA.php qui contient la définition de la classe crudHeure
require_once "crudA.php";

// Créer une instance de la classe crudA et l'assigner à la variable $crud
$crud=new crudA();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title><style>

body{
           background-color:#C9CCC0;
            background-size:cover;
            position: absolute;
            font-family:serif;
            height:500px;
            
            
}
header{background-color:#979990;
width:1365px;
height:79px;
margin-left:-10px;
padding-top:30px;
margin-top:-27px;}

header img {
  width: 105px;
  height: 80px;
  margin-right: 1950px;
  margin-top:-55px;
  border-radius:25px;
  margin-left:15px;

}
h2 {
    letter-spacing:1.5px;
  font-size: 30px;
  font-weight: bold;
  color:#F5CC53;
  margin-top:-10px;
  margin-left:200px;
  font-family:serif;
}
#hh{margin-top:20px;}
#im{margin-top:-20px}
h2 span {
    letter-spacing:1.5px;
  color: #121773;
  margin-top:-10px;
  font-size: 30px;
  font-weight: bold;
  margin-left:220px;
  font-family:serif;
}
footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 7px;
  
 margin-left:-9px;
 margin-top:240px;
 height:45px;
 
}

input{
    width: 300px;
    height:40px;
    margin-left:10px;
    background-color:#F8F0E4;
    font-size:16px;
    border-radius:150px;
    
}
input::placeholder{
    font-size:14px;
    font-family:serif;
    /*font-style:italic;*/
    

}
form{
    margin-left:380px;
    margin-top:80px;
    padding-left:20px;
}
#n {     
        width:100px;
        height:40px;
        margin-left:420px;
        border-radius: 150px;
        font-size:16px;
        color:#0A0A4F;;
        }
#nn{margin-top:-45px;}
        #n:hover {
        background-color: rgb(156, 149, 149);
        color:#F5CC53;
        }
h3{text-align:center;
    color: #121773;
    font-family:serif;}</style>
</head>
<body>
<header>
    <div id="hh"><b><h2  ><span>La Poste Tunisienne | </span>البريد التونسي</h2></b></div>
    <div id="im"><img src="logo.GIF" ></div>
</header>
<main>
    <h3>Si vous voulez changer votre mot de passe, veuillez entrer votre matricule </h3><br><br><br>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get"><br>
        
        <b>Matricule : </b><input type="number" name="log" id="log" placeholder="   Entrer votre matricule               ادخل الرقم الخاص بك">
    <div id="nn">  <button type="submit" id="n"  class="btn btn-outline-secondary" name="Envoyer"><b style="font-family:serif;">Envoyer</b></utton></div>
    </form>
</main>
    <footer>
		<p>Tous droits réservés © 2023</p>
	</footer> 
<?php
//Vérifie si le formulaire a été soumis
    if (isset($_GET['Envoyer'])){
       // Récupère la valeur de la variable log en utilisant htmlspecialchars()
        $log=htmlspecialchars($_GET['log']);
        // Redirige l'utilisateur vers la page updateAdmin.php en passant la valeur de log dans l'URL
 header("location:updateAdmin.php?log=$log");
    }
    
     ?>
</body>
</html>