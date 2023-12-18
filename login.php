<?php
// Démarre une session
session_start();
// définir les informations nécessaires pour se connecter à la base de données
$dsn = "mysql:host=localhost;dbname=gestionposte";
//définir le nom d'utilisateur pour se connecter à la base de données 
$user = "root";
//définir le mot de passe pour se connecter à la base de données
$pw = "";
//créer une instance de la classe PDO (PHP Data Objects) pour établir une connexion à la base de données
$cnx = new PDO($dsn, $user, $pw);
//définie et exécute un code en fonction de sa valeur
if(isset($_GET['etat']))
{ $etat=$_GET['etat'];
    switch($_GET['etat'])
    {
         case 1:echo"<script>alert('Mot de passe et/ou login INCORRECT !!!');</script>";
                break; 
        case 2:echo"<script>alert('Vous devez authentifier...');</script>";
                break;   
         
        case 3:echo"<script>alert('Ajout avec succés');</script>";
                break;    
         case 4:echo"<script>alert('Vous êtes déconnecter ');</script>";
                break; 
                case 5:echo"<script>alert('Enregistrement avec succés !!!');</script>";
                break;         
    }
}
//vérifie si le formulaire de connexion a été soumis avec succès.
if(isset($_POST['Envoyer'])){
    //stockent les valeurs récupérées des champs du formulaire de connexion, afin de pouvoir être utilisées plus tard pour l'authentification.
   //récupère la valeur entrée dans le champ matricule et pw
    $matricule=$_POST['matricule'];
    $pw=$_POST['pw'];
      //stockent les valeurs récupérées des champs du formulaire de connexion, afin de pouvoir être utilisées plus tard pour l'authentification.
  $_SESSION['matricule']=$matricule;
    $_SESSION['pw']=$pw;
    //La requête SQL $sql utilise une jointure entre les tables postier et admin pour sélectionner les enregistrements qui correspondent aux valeurs de matricule et pw entrées dans le formulaire de connexion.
    $sql="SELECT admin.* , postier.* FROM postier , admin WHERE postier.matricule='$matricule' AND admin.pw='$pw' ";
    //exécute la requête SQL et stocke le résultat dans la variable 
    $reponse=$cnx->query($sql);
    //si la requête SQL a renvoyé au moins un enregistrement, ce qui signifie que les informations de connexion sont valides.
    if($reponse->rowCount() > 0){
        //récupère la première ligne du résultat de la requête SQL sous forme de tableau associatif
        $donnees=$reponse->fetch();
        //stockées dans des variables de session
        $_SESSION['nom'] = $donnees['nom'];
        $_SESSION['prenom'] = $donnees['prenom'];
        $_SESSION['grade'] = $donnees['grade'];
        //Si l'utilisateur authentifié est un administrateur
        if ($_SESSION['grade'] === 'Adjoint administratif') {
            // Rediriger le directeur vers la page d'accueil
            header('Location: accueil.php?etat=1');
            exit;
        } //Sinon
        else if ($matricule=="" && $pw==""){
            header("location:login.php?etat=2");exit;
        }
        else {
            // Rediriger l'employé vers une autre page
            header('Location: accueilpos.php?etat=4');
            exit;
        }
       
        
    } else {
        //$erreur = "Matricule ou mot de passe incorrect";
        header("location:login.php?etat=1");exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
<link rel="icon" href="path/to/favicon.ico">
    <title>login</title>
    <style>
        body{
            background-color: #C9CCC0;
            background-size: cover;
            margin: 0;
            font-family: serif;  
       
}
        script{
            background-color:blue;
            color:red;
        }
        .global{

            margin:450px;
            margin-top:60px;
            width:410px;
            height:370px;
            border:solid #0A0A4F  1px;
            border-radius:100px;
            box-shadow: 1px 1px 3px 2px   ;
           
        }
        form{margin-top:-30px;
        }
     h1{
            text-align:center;
            font-size:20px;
            font-family:verdana;
            margin-top:25px;   
        }
        h2{
            font-size:15px;
            font-family:verdana;
            color:#172046;
            margin-left:85px;
        }
        .input{
            width:300px;
            height:40px;
            margin-left:65px;
            background-color:#F8F0E4;
            font-size:16px;
            border-radius:150px;
            
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
  .profil{
    width:100px;
    position:absolute;
    background-color:#C9CCC0;
   margin-left:598px;
   margin-top:25px;
 border:solid #F9BB46 3px;;
    border-radius:50%;
    box-shadow:0px 2px 2px 0px ;
    
}

#a2{  
    border-radius:15px;
    
    margin-left:25px;
    box-shadow:5px;
    font-size:13px;
        color: #0A0A4F;
}
#a1{ border-radius:15px;
    margin-left:110px;
    box-shadow:5px;
    font-size:13px;
        color: #0A0A4F;}
footer {
  background-color: #0E144E;
  color: white;
  text-align: center;
  padding: 7px;
  width:1365px;
 margin-left:-475px;
 margin-top:200px;
 height:35px;
 
}
#a2:hover{
    color:#F9BB46; 
        
}
#a1:hover{
    color:#F9BB46; 
        
}
i{margin-left:50px;
position:absolute;
margin-left:45px;
margin-top:15px;
height:30px;
}
h1 span {
  color:#F9BB46;
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
    /*font-style:italic;*/
    

}
#hh{margin-top:20px;}
#im{margin-top:-20px}
    </style>
</head>
<body>
<header>
    <div id="hh"><b><h2  ><span>La Poste Tunisienne | </span>البريد التونسي</h2></b></div>
    <div id="im"><img src="logo.GIF" ></div>
</header>

<img class="profil" src="user.png" alt="" >
    <div class="global">
        <br>
        <h1 style="color:#0C0C59; font-family:georgia;letter-spacing:1.5px; "><b>Se connecter</b></h1><br><br><br>
    <form action="<?= $_SERVER['PHP_SELF']?>" method="post">
    <i class="fas fa-user" style=" color:#040C23;"></i>
 
<input type="text" name="matricule" id="" placeholder="   Entrez votre matricule                    ادخل الرقم الخاص بك" class="input"  autocomplete="off" ><br><br><br>
        
 <i class="fas fa-lock" style=" color:#040C23;"></i>
 <input type="password" name="pw" id="" placeholder="   Entrez votre mot de passe                      ادخل كلمة السر"  class="input" autocomplete="off"><br>
 

     <button type="submit" name="Envoyer" class="btn btn-outline-secondary" id="n"> <b>Connexion</b></button>
    </form>
    <a href="addAdmin.php" id="a2" class="btn btn-outline-secondary"><b>Creér un nouvel admin</b></a>
    <a href="adminup.php" id="a1" class="btn btn-outline-secondary"><b>Mot de passe oubliè?</b></a>
 
    <?php if(isset($erreur)){ ?>
            <div class="alert alert-danger" role="alert"><?php echo $erreur; ?></div>
        <?php } ?>
        <footer>
		<p>Tous droits réservés © 2023</p>
	</footer>     
</div>

</body>
</html>
