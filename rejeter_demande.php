<?php
// Fichier qui accepte une demande de contact pour un utilisateur donné.
require_once "connexion.php";
require_once "crudAb.php";
// Instanciation de la classe crudAb pour interagir avec la base de données
$crud = new crudAb();
$matricule = $_GET['id']; // Récupération du matricule depuis l'URL

// Appel de la fonction accepter_demande pour mettre à jour l'état de la demande
$res = $crud->rejeter_demande($matricule);

// Vérification que la mise à jour a été effectuée avec succès
if ($res) {
    // Redirection vers une page de confirmation de l'opération réussie
    header("Location:findAllPA.php");
} else {
    // Affichage d'un message d'erreur si la mise à jour a échoué
    echo "Erreur : " . $res;
}
