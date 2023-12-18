<?php
// inclusion des fichiers nécessaires
require_once "inscriptions.php";
require_once "connexion.php";
/**
 * Classe CRUD pour la table "inscription" de la base de données
 */
class crudInscription{
    protected $cnx;
   /**
     * Constructeur de la classe
     * Initialise une connexion à la base de données via l'objet "connexion"
     */
     function __construct(){
        $pdo=new connexion();
        $this->cnx=$pdo->getConnexion();
    }
       /**
     * Récupère les informations d'une inscription à partir de son adresse mail
     * param string $email l'adresse mail de l'inscription recherchée
     * return mixed les informations de l'inscription sous forme de tableau associatif, ou false si l'inscription n'existe pas
     */
    function findI($email){
        $sql="select * from inscription where adresse_mail=$email";
        $res=$this->cnx->query($sql);
        return ($res);
    }
     /**
     * Récupère toutes les inscriptions avec les informations des postiers associés
     * return array toutes les inscriptions avec les informations des postiers associés sous forme de tableau numérique
     */
    function findAllI(){
        $sql="select postier.matricule,postier.cin,postier.nom,postier.prenom,postier.adresse,inscription.adresse_mail,inscription.nom_formation
             from postier,inscription
             where postier.matricule=inscription.matricule
             group by inscription.nom_formation 
              ";
               
        $res= $this->cnx->query($sql);
        return ($res->fetchAll(PDO::FETCH_NUM));
      }
     
   /**
     * Ajoute une inscription à la base de données
     * param inscriptions $obj l'objet "inscriptions" à ajouter
     * return int le nombre de lignes affectées par la requête
     */
     function addInscription(inscriptions $obj){
        $m=$obj->getMatricule();
        $em=$obj->getMail();
        $f=$obj->getFormation();
        $sql="insert into inscription (matricule,adresse_mail,nom_formation) values($m,'$em','$f')";
        $res=$this->cnx->exec($sql);
        return $res;
    }
   /**
     * Supprime une inscription de la base de données à partir de son matricule
     * param int $matricule le matricule de l'inscription à supprimer
     * return int le nombre de lignes affectées par la requête
     */
     function deleteF($matricule){
        $sql="delete from inscription where matricule=$matricule";
        $res=$this->cnx->exec($sql);
        return ($res);
      }
       /**
     * Met à jour une inscription dans la base de données
     * param inscriptions $obj l'objet "inscriptions" à mettre à jour
     * return mixed le nombre de lignes affectées par la requête, ou un message d'erreur en cas d'échec
     */
    function updateInscription(inscriptions $obj){
        $m=$obj->getMatricule();
        $em=$obj->getMail();
        $f=$obj->getFormation();
        $sql="update inscription set
        nom_formation='$f' where matricule=$m and mail='$em' ";
        try{
            $res=$this->cnx->exec($sql);
            return($res);
         }catch(PDOException $e){
            $res="problème de mise à jour ".$e->getMessage();
            return $res;
         }
    }
}