<?php
//appelée pour démarrer une session PHP.
session_start();
//appelée pour supprimer toutes les variables de session.
session_unset();
//appelée pour détruire la session courante.
session_destroy();
//rediriger l'utilisateur vers la page de connexion login.php et ajouter le paramètre d'état "4"
header("location:login.php?etat=4");
//terminer l'exécution du script.
exit;
?>