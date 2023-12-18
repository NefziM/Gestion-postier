<?php
// Démarre une session
session_start();
//inclure le fichier "crudA.php" en utilisant la fonction "require_once" 
require_once "crudA.php";
//un nouvel objet "crudA" est créé en utilisant le constructeur de la classe "crudA".
$crud=new crudA();
//vérifie si la variable GET "log" est définie
if(isset ($_GET['log'])){
    //stocke sa valeur dans la variable $log
    $log=$_GET['log'];
    //appelée la méthode findA() pour rechercher un administrateur dans la base de données
    $admin=$crud->findA($log);
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
           background-color:#C9CCC0;
            background-size:cover;
            position: absolute;
            font-family:serif;
            height:500px;
            
            
}
        h2{
            font-size:15px;
            font-family:verdana;
            color:#172046;
            margin-left:65px;
        }
        #h2{
            font-size:15px;
            font-family:verdana;
            color:#172046;
            margin-left:105px;
        }
        input{
            width:300px;
            height:35px;
            margin-left:65px;
            background-color:#F8F0E4;
            font-size:16px;
            margin-top:15px;
            border-radius:150px;
            
        }
        footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 7px;
  width:1365px;
 margin-left:-10px;
 margin-top:40px;
 height:35px;
 
}
header{background-color:#979990;
width:1370px;
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

h2 span {
    letter-spacing:1.5px;
  color: #121773;
  margin-top:-10px;
  font-size: 30px;
  font-weight: bold;
  margin-left:220px;
  font-family:serif;
}
input::placeholder{
    font-size:13px;
    font-family:serif;
}
#hh{margin-top:20px;}
#im{margin-top:-20px}
        form{  
            margin-top:40px;
            margin-left:450px;
            width:420px;
            height:420px;
            border:solid #0A0A4F  1px;
            border-radius:100px;
            box-shadow: 1px 1px 3px 2px   ;
            padding-left:20px;
            font-size:14px;
            font-family:serif;
            letter-spacing:1px;

        }
        #n {
            margin-top:30px;
            margin-bottom:20px;
        width:180px;
        height:40px;
        margin-left:120px;
        border-radius: 150px;
        font-size:18px;
        color:#0A0A4F;;
        }

        #n:hover {
        background-color: rgb(156, 149, 149);
        color:#F5CC53;
        }
        h3{text-align:center;
    color: #121773;
    font-family:serif;
    font-size:18px;
margin-top:-10px;}
    </style>
</head>
<body>
<header>
    <div id="hh"><b><h2  ><span>La Poste Tunisienne | </span>البريد التونسي</h2></b></div>
    <div id="im"><img src="logo.GIF" ></div>
</header>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" ><br>
    <h3><u>Ajouter un nouvel mot de passe</u></h3><br>
     <b>Matricule :</b><br><input type="number" readonly name="log" value="<?= $admin[0] ?>" id="" autocomplete="off"> <br><br>
<b>Nouvel Mot de passe :</b><input type="password"  name="pw"  id="" autocomplete="off" placeholder="  Entrez un nouvel mot de passe              ادخل كلمة سر جديدة"> <br><br>
<b>Verifier le Mot de passe :</b><input type="password"  name="pw1"  id="" autocomplete="off" placeholder="  Vérifier le nouvel mot de passe     التاكد من كلمة السر الجديدة"> <br><br>
<button type="submit"  name="ok" id="n" ><b>Enregistré</b></button>
</table></form>
<footer>
		<p>Tous droits réservés © 2023</p>
	</footer> 
  <?php
}
//vérifie si le formulaire a été soumis
if(isset($_POST['ok'])){
    //crée un nouvel objet admin en utilisant les valeurs des champs 'log' et 'pw' envoyés via POST et en les nettoyant avec la fonction htmlspecialchars() pour éviter les failles XSS.
    $admin= new admin(
        htmlspecialchars($_POST['log']),
        htmlspecialchars($_POST['pw'])
    );
    // si le mot de passe saisi dans le champ 'pw' est égal à celui saisi dans le champ 'pw1'.
    if($_POST['pw']== $_POST['pw1']){ 
        //Si les deux mots de passe sont égaux, alors la méthode updateA() de l'objet $crud est appelée avec l'objet admin comme argument. 
        //Cette méthode effectue une mise à jour des données de l'administrateur dans la base de données.
    $res=$crud->updateA($admin);
    //redirigée vers la page de connexion
    header("location:login.php");}
}

?></body></html>