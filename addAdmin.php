<?php
// Instanciation de la classe crudA pour interagir avec la base de données
require_once "crudA.php";
$crud=new crudA();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <title>Ajouter utilisateur</title>
</head>
<style>
        body{
           background-color:#C9CCC0;
            background-size:cover;
            position: absolute;
             width:650px;
            height:500px;
            font-family:serif;
            
}
        script{
            background-color:blue;
            color:red;
        }
        form{

            margin-top:20px;
            width:450px;
            height:380px;
            border:solid blue 1px;
            border-radius:100px;
            box-shadow:0 0 5px 5px ;
            margin-left:450px;
            padding-top:20px;
           
        }
    
        h2{
            font-size:15px;
            font-family:verdana;
            color: #121773;
            margin-left:15px;
            text-align:center;
        }
        b{margin-left:10px;}
        input{
            width:300px;
            height:45px;
            margin-left:70px;
            background-color:#F8F0E4;
            font-size:16px;
            border-radius:150px;
            margin-left:10px;
            
        }
        #n {
            margin:40px;
        width:225px;
        height:45px;
        margin-left:115px;
        border-radius: 150px;
        font-size:20px;
        color:#0A0A4F;
        border :solid #404745 2px;;
        }

        #n:hover {
        background-color: rgb(156, 149, 149);
        color:#F5CC53;
        }
  .profil{
    width:120px;
    position:absolute;
    background-color:#C9CCC0;
   margin-left:610px;
   margin-top:10px;
 border:solid #F0CE18 3px;;
    border-radius:50%;
    box-shadow:0px 2px 2px 0px ;

}

#a2{  
    border-radius:15px;
    margin-left:155px;
    box-shadow:5px;
    font-size:15px;
        color:#162347;
}
footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 7px;
  width:1365px;
  margin-left:-10px;
 margin-top:45px;
 height:45px;
 
}
#a2:hover{
    
        color: #0A0A4F;;
}
i{margin-left:50px;
position:absolute;
margin-left:45px;
margin-top:15px;
height:30px;
}
h2 span {
    color: #121773;
}
input::placeholder{
    font-size:13px;
    font-family:serif;
}
nav{
    background-color:#979990;
width:1365px;
height:58px;
margin-left:-15px;
margin-top:-10px;
padding-top:40px;
padding-bottom:-40px;}
#im{
    width:300px;
    height:120px;
    margin-top:-12px;
    margin-left:1100px;
    
   

}
a{margin-left:-45px;
}
#h21 {
    letter-spacing:1.5px;
  font-size: 25px;
  font-weight: bold;
  color:#F5CC53;
  margin-top:-10px;
  text-align:center;
  font-family:serif;
}

#h21 span {
    letter-spacing:1.5px;
  color: #121773;
  margin-top:-10px;
  font-size: 25px;
  font-weight: bold;
  
  font-family:serif;
}
nav img {
  width: 105px;
  height: 80px;
  margin-right: 1950px;
  margin-top:-90px;
  border-radius:25px;
  margin-left:15px;

}
    </style>
<body>
   <nav><h2 id="h21" ><span><b >La Poste Tunisienne |</b> </span><b>البريد التونسي</b></h2>
   <img src="logo.GIF" ></nav>
  
   <a href="login.php"><i class="fas fa-arrow-left" style="color:#121773;"></i> </a>

    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" ><br>
    <h2 style="margin-top:-5px; font-size:23px; margin-left:-3px; font-family:serif;"><b>Créer un nouvel utilisateur</b></h2><h2 id="h2"><span><b><!--Construire cette formulaire !!! --></b></span></h2><br>
    <b style="color:#353B38; font-family:serif;">Matricule  &nbsp &nbsp &nbsp :</b><input type="number" name="log" id="" autocomplete="off" placeholder=" Entrer votre matricule                       ادخل الرقم الخاص بك"><br><br><br>
    <b style="color:#353B38; font-family:serif;">Mot  de passe :</b><input type="password" name="pw" id="" autocomplete="off" placeholder=" Entrer votre mot de passe                            ادخل كلمة السر"><br>
    <button type="submit" id="n" class="btn btn-outline-secondary"  name="ok" ><b style="margin-left:-5px; font-size:18px;font-family:serif;">Enregistrer</b></button><br>
</form>
<footer>
		<p>Tous droits réservés © 2023</p>
	</footer> 
</body>
<?php
// Vérifie si le formulaire a été soumis
if(isset($_POST['ok'])){
    
    // Crée un nouvel objet "admin" avec les données du formulaire
    
        $l=htmlspecialchars($_POST['log']);
       $pw= htmlspecialchars($_POST['pw']);
       $existeAdmin = $crud->findA($l);
       if ($existeAdmin) { 
         echo "<script>alert('Cette compte est existe déja !!');</script>";}
    else{
    // Crée un nouvel objet "admin" avec les données du formulaire
    $admin=new admin(
      $l,
      $pw
    );
    // Ajoute le nouvel administrateur à la base de données en utilisant la méthode "add_admin" de la classe "crud"
    $res=$crud->add_admin($admin);
    
    //redirige l'utilisateur vers la page de connexion avec un message d'état
    header('Location: login.php');
    
}}
    



