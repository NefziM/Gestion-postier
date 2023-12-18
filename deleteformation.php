<?php
/**Le script supprime une formation en utilisant l'ID passé dans l'URL
*Le script utilise une instance de la classe crudFormations pour exécuter la suppression.
*Le script redirige l'utilisateur vers la page findAllFs.php avec le paramètre d'état égal à 1.
*param $id : l'ID de la formation à supprimer, passé dans l'URL
*return void
**/
require_once "crudFormations.php";
$crud = new crudFormations();
$id= $_GET['id'];
$crud->deleteF($id);
header("location:findAllFs.php?etat=1");