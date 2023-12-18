<?php
//Importe le fichier crudAb.php qui contient la classe crudAb.
require_once "crudAb.php";
//Instancie un objet de la classe crudAb;
$crud = new crudAb();
//Récupère le paramètre matricule envoyé via la méthode GET.
$matricule= $_GET['matricule'];
//Appelle la méthode deletePA() de l'objet crudAb pour supprimer le postier correspondant au matricule.
$crud->deletePA($matricule);
//Redirige l'utilisateur vers la page findAllPA.php avec le paramètre GET etat=1
header("location:findAllPA.php?etat=1");