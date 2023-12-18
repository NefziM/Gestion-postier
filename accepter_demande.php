<?php
// Fichier qui accepte une demande de contact pour un utilisateur donné.


 require_once "connexion.php";
 require_once "crudAb.php";
 
 // Instanciation de la classe crudAb pour interagir avec la base de données
 $crud = new crudAb();
 
 // Récupération du matricule depuis l'URL
 $matricule = $_GET['id'];
 
 
  // Met à jour l'état de la demande pour le matricule fourni.
  // $matricule Le matricule de postier pour lequel accepter la demande.
  //return true si la mise à jour a été effectuée avec succès, false sinon.
  
 $res = $crud->accepter_demande($matricule);
 
 // Vérification que la mise à jour a été effectuée avec succès
 if ($res) {
     // Redirection vers une page de confirmation de l'opération réussie
     header("Location:findAllPA.php");
 } 
 