<?php
//Importe le fichier crudPostier.php qui contient la classe crudPostier.
require_once "crudPostier.php";
//Instancie un objet de la classe crudPostier.
$crud = new crudPostier();
//Récupère le paramètre matricule envoyé via la méthode GET.
$matricule= $_GET['matricule'];
//Appelle la méthode deleteP() de l'objet crudPostier pour supprimer le postier correspondant au matricule.
$crud->deleteP($matricule);
//Redirige l'utilisateur vers la page findAllP.php avec le paramètre GET etat=1
header("location:findAllP.php?etat=1");

