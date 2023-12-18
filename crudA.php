<?php
/**
 * Cette classe permet de gérer les opérations CRUD sur la table "admin" de la base de données "gestionPoste".
 */
require_once "admin.php";
require_once "connexion.php";
class crudA{
       /**
     * Instance de connexion PDO à la base de données "gestionPoste".
     */
    protected $cnx;
     /**
     * Initialise une nouvelle instance de la classe "crudA" et établit une connexion à la base de données "gestionPoste".
     */
    function __construct(){
        $pdo=new connexion();
        $this->cnx=$pdo->getConnexion();
    }
     /**
     * Récupère les informations d'un administrateur en fonction de son login.
     * param string $log Login de l'administrateur à récupérer.
     * return array|null Tableau contenant les informations de l'administrateur s'il existe, null sinon.
     */
    function findA($log){
        $sql="select * from admin where log=$log";
        $res=$this->cnx->query($sql);
        return ($res->fetch(PDO::FETCH_NUM));

    }
    /**
     * Ajoute un nouvel administrateur à la base de données "gestionPoste".
     * param admin $obj Objet de type "admin" contenant les informations du nouvel administrateur à ajouter.
     * return int|false Le nombre de lignes affectées par l'opération d'insertion ou false en cas d'échec.
     */
    function add_admin(admin $obj ){
        $log=$obj->getLog();
        $pw=$obj->getPw();
         // Vérification de l'existence du matricule en exécutant une requête
        // SQL qui compte le nombre de fois où le matricule apparaît dans la table "user" et stockage du résultat dans la variable "$count".
        $sql = "SELECT COUNT(*) FROM admin WHERE log = $log";
        $count = $this->cnx->query($sql)->fetchColumn();
        if ($count > 0) {
            // Matricule existe déjà, afficher une alerte et arrêter l'exécution de la fonction
            echo "<script>alert('Le matricule existe déjà');</script>";
            return false;
        }
          // Construction de la requête SQL pour insérer les données dans la table admin
        $sql = "insert into admin VALUES ($log, '$pw') ";
        // Exécution de la requête SQL et retour du résulta
        $res=$this->cnx->exec($sql);
      return($res);
      }
      /**
     * Modifie les informations d'un administrateur dans la base de données "gestionPoste".
     *  admin $obj Objet de type "admin" contenant les nouvelles informations de l'administrateur à modifier.
     * return int|string Le nombre de lignes affectées par l'opération de mise à jour ou un message d'erreur en cas d'échec.
     */
      function updateA(admin $obj){
        $log=$obj->getLog();
        $pw=$obj->getPw();
        $sql="update admin set 
        log=$log ,
         pw='$pw' where log=$log ";
         try{
            $res=$this->cnx->exec($sql);
            return($res);
         }catch(PDOException $e){
            $res="problème de mise à jour ".$e->getMessage();
            return $res;
         }
      }
}