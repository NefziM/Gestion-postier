<?php
require_once "connexion.php";
require_once "postier.php";
require_once "heure_nuit.php";
class crudHeure {
  /**La connexion à la base de données.*/
  protected $cnx;
 /**
   * Constructeur de la classe.
   * Initialise la connexion à la base de données.
   */
   function __construct() {
    $pdo=new connexion();
    $this->cnx=$pdo->getConnexion();
  }  
  /**
   * Récupère les informations d'une heure de nuit en fonction du matricule.
   *
   * param int $matricule Le matricule du postier.
   * return array|false Les informations de l'heure de nuit, ou false si aucune heure de nuit n'a été trouvée.
   */
  function findH($matricule){
    $sql="select *
    from heure_nuit
    where  matricule =$matricule";
    $res= $this->cnx->query($sql);
    return ($res->fetch(PDO::FETCH_NUM));
  }
  /**
   * Récupère toutes les heures de nuit avec les informations des postiers correspondants.
   *
   *return array Les heures de nuit avec les informations des postiers.
   */
  function findAllH(){
    $sql="select postier.*,heure_nuit.mois,heure_nuit.annee,heure_nuit.heure,heure_nuit.gestionnaire,heure_nuit.brut,heure_nuit.reference
         from postier,heure_nuit
         where postier.matricule=heure_nuit.matricule 
        group by reference  ";
           
    $res= $this->cnx->query($sql);
    return ($res->fetchAll(PDO::FETCH_NUM));
  }
  /**
   * Supprime une heure de nuit en fonction du matricule.
   *
   * param int $matricule Le matricule du postier.
   * return int Le nombre de lignes affectées.
   */
   function deleteH($matricule){
    $sql="delete  
         from heure_nuit
       where matricule=$matricule ";
    $res=$this->cnx->exec($sql);
    return ($res);
  }
  /**
   * Ajoute une nouvelle heure de nuit.
   *
   * param heure_nuit $obj L'objet heure_nuit à ajouter.
   * return int Le nombre de lignes affectées.
   */
  function addH(heure_nuit $obj){
     $m=$obj->getMatricule();
     $mo=$obj->getMois();
     $an=$obj->getAnnee();
     $h=$obj->getHeure();
     $gest=$obj->getGestionnaire();
     $b=$obj->getBrut();
     $r=$obj->getReference();

     $sql="insert into heure_nuit  (matricule,mois,annee,heure,gestionnaire,brut) values ($m,'$mo',$an,$h,'$gest',$b)";
     $res=$this->cnx->exec($sql);
     return ($res); 
  }
  /** Modifie les informations d'une heure de nuit.
   * param heure_nuit $obj L'objet heure_nuit contenant les nouvelles informations.
   * return int|false Le nombre de lignes affectées, ou false si la mise à jour a échoué.
   */
   function updateH(heure_nuit $obj){
    $m=$obj->getMatricule();
    $mo=$obj->getMois();
    $an=$obj->getAnnee();
    $h=$obj->getHeure();
    $gest=$obj->getGestionnaire();
    $b=$obj->getBrut();
    //$v=$obj->getValide();
    //$dv=$obj->getDate_validation();
    $r=$obj->getReference();

    $sql="update heure_nuit  set 
             mois='$mo',
             annee=$an,
             heure=$h,
             gestionnaire='$gest',
             brut=$b,
             reference=$r where matricule =$m";
    try{
      $res=$this->cnx->exec($sql);
      return ($res);
    }catch (PDOException $e){
      $res="problème de mise à jour".$e->getMessage();
      return ($res);
    }
  }
}