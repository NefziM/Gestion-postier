<?php
/**
 * Cette classe permet de gérer les opérations CRUD sur la table "absence" de la base de données "gestionPoste".
 */
require_once "connexion.php";
require_once "postierA.php";
class crudAb{
    /**
     * Instance de connexion PDO à la base de données "gestionPoste".
     */ 
  protected $cnx;
  /**
     * Initialise une nouvelle instance de la classe "crudAb" et établit une connexion à la base de données "gestionPoste".
     */
    function __construct(){
        $pdo=new connexion();
        $this->cnx=$pdo->getConnexion();
    }
       /**
     * Récupère les informations d'une demande d'absence à partir de son matricule.
     * param int $matricule Le matricule du postier dont on veut récupérer les informations.
     * return array|false Les informations de la demande d'absence sous forme de tableau associatif, ou false si la demande n'existe pas.
     */
    function findPA($matricule){
        $sql= "select matricule,date_absence,type_absence,dure_absence, etat_absence from absence  where matricule=$matricule ";
        $res= $this->cnx->query($sql);
        return ($res->fetch(PDO::FETCH_NUM));
      }
       
       /**
     * Accepte une demande d'absence à partir de son identifiant.
     * param int $id L'identifiant de la demande d'absence à accepter.
     * return string|false Un message de confirmation si la mise à jour a réussi, ou false si la demande n'existe pas.
     */
    function accepter_demande($id) {
        $sql = "UPDATE absence SET etat_absence ='Acceptée' WHERE id= $id";
        try {
            $res = $this->cnx->exec($sql);
            return "La demande a été acceptée avec succès. ".$res;
        } catch (PDOException $e) {
            $res="Erreur lors de la mise à jour de la demande : " . $e->getMessage();
            return ($res);
        }
    }
        /**
     * Rejette une demande d'absence à partir de son identifiant.
     * param int $id L'identifiant de la demande d'absence à rejeter.
     * return string|false Un message de confirmation si la mise à jour a réussi, ou false si la demande n'existe pas.
     */
    function rejeter_demande($id) {
      $sql = "UPDATE absence SET etat_absence ='Rejetée' WHERE id = $id";
      try {
          $res = $this->cnx->exec($sql);
          return "La demande a été rejetée avec succès. ".$res;
      } catch (PDOException $e) {
          $res="Erreur lors de la mise à jour de la demande : " . $e->getMessage();
          return ($res);
      }
  }
      /**
     * Récupère toutes les demandes d'absence en attente.
     * return array Les demandes d'absence en attente sous forme d'un tableau de tableaux associatifs.
     */
     function findAllPA(){
        $sql="SELECT * FROM absence WHERE etat_absence='En attente'";
               
        $res= $this->cnx->query($sql);
        return ($res->fetchAll(PDO::FETCH_NUM));
      }
     /**

     *Supprime une absence d'un postier dans la base de données.
     *param int $matricule Le matricule du postier dont on veut supprimer l'absence.
     *return mixed Le nombre de lignes affectées ou un message d'erreur si la suppression a échoué.
     */ 
    function deletePA($matricule){
        $sql="delete from absence where matricule=$matricule ";
        try{
          $res=$this->cnx->exec($sql);
          return ($res);
        }catch (PDOException $e){
          $res="problème de mise à jour".$e->getMessage();
          return ($res);
        } 
      }/**

*Ajoute une nouvelle absence d'un postier dans la base de données.
*param postierA $obj L'objet postierA contenant les informations de l'absence à ajouter.
*return mixed Le nombre de lignes affectées ou un message d'erreur si l'ajout a échoué.
*/
      function addPA(postierA $obj){
        $m=$obj->getMatricule();
        $da=$obj->getDate_absence();
        $ta=$obj->getType_absence();
        $duree=$obj->getDuree_absence();
        $ea=$obj->getEtat_absence();
        $id=$obj->getId();
         $sql="INSERT INTO absence (matricule,date_absence,type_absence,dure_absence,etat_absence) values ($m,'$da','$ta',$duree,'$ea')";
         try{
          $res=$this->cnx->exec($sql);
          return ($res);
        }catch (PDOException $e){
          $res="problème de mise à jour".$e->getMessage();
          return ($res);
        } 
      }
    /**

*Met à jour une absence d'un postier dans la base de données.
*Param postierA $obj L'objet postierA contenant les nouvelles informations de l'absence à mettre à jour.
*return mixed Le nombre de lignes affectées ou un message d'erreur si la mise à jour a échoué.
*/  function updatePA(postierA $obj){
        $m=$obj->getMatricule();
        $da=$obj->getDate_absence();
        $ta=$obj->getType_absence();
        $duree=$obj->getDuree_absence();
        $ea=$obj->getEtat_absence();
        $id=$obj->getId();
        $sql="update absence set
                date_absence='$da',
                 type_absence='$ta',
                  dure_absence=$duree,
                  etat_absence='$ea',
                  where matricule =$m and id=$id";
        try{
          $res=$this->cnx->exec($sql);
          return ($res);
        }catch (PDOException $e){
          $res="problème de mise à jour".$e->getMessage();
          return ($res);
        }
      }
     

    
    }
