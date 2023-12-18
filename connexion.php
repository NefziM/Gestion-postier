<?php
/**
 * Classe connexion
 * Cette classe contient une méthode pour établir une connexion à une base de données MySQL
 */
class connexion {
      /**
     * Méthode getConnexion
     *
     * Cette méthode permet d'établir une connexion à une base de données MySQL en utilisant les paramètres de connexion prédéfinis
     *
     * @return PDO L'objet PDO représentant la connexion à la base de données
     * @throws Exception Si la connexion à MySQL est impossible, une exception est levée
     */
    function getConnexion(){
        try{
            $dsn="mysql:host=localhost;dbname=gestionPoste"; // définit le DSN pour la connexion à la base de données
            $user="root"; // définit le nom d'utilisateur pour la connexion à la base de données
            $pw=""; // définit le mot de passe pour la connexion à la base de données
            $cnx= new PDO($dsn,$user,$pw); // établit la connexion à la base de données avec les paramètres définis
            return $cnx; // retourne l'objet PDO représentant la connexion à la base de données
       }catch (Exception $e){
            echo "Connexion à MySQL impossible :",$e->getMessage();// affiche un message d'erreur en cas d'échec de la connexion
          die();// arrête l'exécution du script
        }
    }
}

?>