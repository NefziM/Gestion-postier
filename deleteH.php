<?php
// Inclure le fichier qui contient la classe crudHeure
require_once "crudHeure.php";
// Instancier un nouvel objet crudHeure pour manipuler la table de temps de travail
$crud=new crudHeure();
// Récupérer le matricule de l'enregistrement à supprimer depuis les paramètres de la requête GET
$matricule=$_GET['matricule'];
// Appeler la méthode deleteH de l'objet $crud pour supprimer l'enregistrement correspondant au matricule donné
$crud->deleteH($matricule);
// Rediriger l'utilisateur vers la page qui affiche tous les enregistrements de temps de travail après la suppression
header("location:findAllH.php");

