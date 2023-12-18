<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
   
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    

    <title><?= $name = "Gestion De Poste" ?></title>
    <style>
        body{font-family:serif;
        }
    .search{
        display:flex;
        align-items:center;
    }
    #input{
        width:200px;
        padding:0px;
        border-radius:15px;
        height:35px;
        /*background-color:#838D90;*/
    }
    #input::placeholder {
  color:#0A0A4F;
  font-style: italic;
  /**text-transform: uppercase;*/
  font-size: 15px;
}

    #button{
       height:35px;
       width:15px;
        border radius:-25px 5px 5px 5px;
        border:none;


    }
 #i{
    margin-left:-8px;
    margin-top:-28px;
 }
 #n {
       
       color:#0A0A4F;
       }

       #n:hover {
     
       color:#F5CC53;
       }
       
       #userr{position:absolute;
right:40px;
top:89px;}
        </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
        <div class="container-fluid">
        <a class="navbar-brand" href="accueil.php" ><i class="fas fa-building" id="n"></i><b><i id="n"><b> Gestion De Poste</b></i></b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
          
                    <li class="nav-item">

                        <a class="nav-link" href="findAllH.php"  id="n"><i class="fas fa-users" id="n"></i> <b >Liste des postiers </b></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addH.php"  id="n"><i class="fas fa-user-plus" id="n"></i><b> Ajout d'un nouvel postier</b></a>
                    </li>
                    <li class="nav-item">

                      

                </ul>
                <form class="d-flex"><form action="" method="get">
<div class="search" >  
<input type="number" name="matricule" placeholder="   Recherche un postier" id="input" autocomplete="off" >
<button type="submit" name="ok" id="button" class="btn btn-outline-secondary"><i class="fas fa-search" ></i></button></div>
</form></fieldset>
<?php
require_once "crudPostier.php";
$title="";
$crud=new crudPostier();

/*if(isset($_GET['etat']))
{ $etat=$_GET['etat'];
    switch($_GET['etat'])
    {
        case 1:echo"<script>alert('Cette Matricule introuvable !!');</script>";
                break;
        

                
       
    }
}*/
if(isset($_GET['ok'])){
    $matricule=htmlspecialchars($_GET['matricule']);
    header("location:findH.php?matricule=".$matricule);}
        
   // else {  echo"<script>alert('Cette matricule INTROUVABLE !!!');</script>" ;
       
                
//}?>
                <!--<button class="btn btn-outline-dark" type="submit"  ><a class="nav-link" href="searchP.php"><i class="fas fa-search"></i> Recherche</a></button>-->
                &nbsp &nbsp  <button class="btn btn-outline-secondary" type="submit" id="n" ><a class="nav-link" href="logout.php" onclick="return confirm('Voulez-Vous déconnecter!!!')" id="n"><b>Deconnexion  <i class="fas fa-power-off" id="n" ></i></b>
</a></button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <H1> <?= $title ?> </H1>

        <?= $container ?>

    </div>
</body>

</html>