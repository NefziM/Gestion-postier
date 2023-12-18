<?php
/**
 * Cette classe permet de gérer les opérations CRUD sur la table "formations" de la base de données "gestionPoste".
 */
require_once "connexion.php";
require_once "formations.php";
class crudFormations{
     /**
     * Instance de connexion PDO à la base de données "gestionPoste".
     */
     protected $cnx;
   
    /**
     * Initialise une nouvelle instance de la classe "crudFormations" et établit une connexion à la base de données "gestionPoste".
     */
      function __construct(){
        $pdo=new connexion();
        $this->cnx=$pdo->getConnexion();
    }
    /**

*Cette fonction permet de récupérer les informations d'une formation en fonction de son identifiant.
*param int $id L'identifiant de la formation.
*return array|false Les informations de la formation sous forme de tableau indexé ou false si la formation n'existe pas.
*/
function findF($id){
        $sql= "select * from formations  where id=$id";
        $res= $this->cnx->query($sql);
        return ($res->fetch(PDO::FETCH_NUM));
      }
     
   /**

*Cette fonction permet de récupérer toutes les formations.
*return array Les informations de toutes les formations sous forme de tableau associatif.
*/
      function findAllFs(){
        $sql="SELECT * FROM formations ";
        $res= $this->cnx->query($sql);
        return ($res->fetchAll(PDO::FETCH_NUM));
      }
    /**

*Cette fonction permet de supprimer une formation en fonction de son identifiant.
*param int $id L'identifiant de la formation à supprimer.
*return int|string Le nombre de lignes affectées ou un message d'erreur si la suppression a échoué.
*/  function deleteF($id){
        $sql="delete from formations where id=$id ";
        try{
          $res=$this->cnx->exec($sql);
          return ($res);
        }catch (PDOException $e){
          $res="problème de mise à jour".$e->getMessage();
          return ($res);
        } 
      }
     /**Cette fonction permet d'ajouter une nouvelle formation.
@param formations $obj L'objet formation à ajouter.
@return int|string Le nombre de lignes affectées ou un message d'erreur si l'ajout a échoué.
*/ function addF(formations $obj){
        $id=$obj->getId();
        $nf=$obj->getNom_formation();
        $dd=$obj->getDate_debut();
        $df=$obj->getDate_fin();
        $desc=$obj->getDescription();
        $ph=$obj->getPhoto();
         $sql="INSERT INTO formations (nom_formation,date_debut,date_fin,description,photo) values('$nf','$dd','$df','$desc','$ph')";
         try{
          $res=$this->cnx->exec($sql);
          return ($res);
        }catch (PDOException $e){
          $res="problème de mise à jour".$e->getMessage();
          return ($res);
        } 
      }
  /**Cette fonction permet de mettre à jour une formation existante.
@param formations $obj L'objet formation à mettre à jour.
@return int|string Le nombre de lignes affectées ou un message d'erreur si la mise à jour a échoué.
*/    function updateF(formations $obj){
        $id=$obj->getId();
        $nf=$obj->getNom_formation();
        $dd=$obj->getDate_debut();
        $df=$obj->getDate_fin();
        $desc=$obj->getDescription();
        $ph=$obj->getPhoto();
        $sql="update formations set
              nom_formation='$nf',
              date_debut='$dd',
                  date_fin=$df,
                  description='$desc',
                  photo='$ph',
                  where  id=$id";
        try{
          $res=$this->cnx->exec($sql);
          return ($res);
        }catch (PDOException $e){
          $res="problème de mise à jour".$e->getMessage();
          return ($res);
        }
      }
     

    
    }
