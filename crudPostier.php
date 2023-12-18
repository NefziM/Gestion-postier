<?php
require_once "connexion.php";
require_once "postier.php";
/**
 * Classe PHP qui gère les opérations CRUD (Create, Read, Update, Delete) sur des objets de type postier.
 */
class crudPostier {
  /** @var PDO La connexion à la base de données. */
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
   * Recherche un postier par son matricule.
   * param int $matricule Le matricule du postier à rechercher.
   * return array|false Les données du postier sous forme d'un tableau associatif, ou false si le postier n'est pas trouvé.
   */
  function findP($matricule){
    $sql="select *
    from postier
    where  matricule =$matricule";
    $res= $this->cnx->query($sql);
    return ($res->fetch(PDO::FETCH_NUM));
  }
   /**
   * Retourne tous les postiers de la base de données.
   * return array Tous les postiers sous forme d'un tableau de tableaux associatifs.
   */
  function findAllP(){
    $sql="select *
         from postier ";
           
    $res= $this->cnx->query($sql);
    return ($res->fetchAll(PDO::FETCH_NUM));
  }
  /**
   * Supprime un postier de la base de données.
   * param int $matricule Le matricule du postier à supprimer.
   * return int Le nombre de lignes affectées par la requête de suppression.
   */
  function deleteP($matricule){
    $sql="delete from postier where matricule=$matricule";
    $res=$this->cnx->exec($sql);
    return ($res);
  }
   /**
   * Ajoute un nouveau postier à la base de données.
   * param postier $obj Le postier à ajouter.
   * return int Le nombre de lignes affectées par la requête d'ajout.
   */
  function addP(postier $obj){
    $m=$obj->getMatricule();
    $c=$obj->getCin();
    $n=$obj->getNom();
    $p=$obj->getPrenom();
    $dn=$obj->getDate_naissance();
    $g=$obj->getGrade();
    $ad=$obj->getAdresse();
    $sa=$obj->getSalaire();
    $dd=$obj->getDate_debut();
    $d=$obj->getDirection();

     $sql="insert into postier values ($m,'$c','$n','$p','$dn','$g','$ad',$sa,'$dd','$d')";
     try{
      $res=$this->cnx->exec($sql);
      return ($res);
    }catch (PDOException $e){
      $res="problème de mise à jour".$e->getMessage();
      return ($res." else echo <script>alerte ('Cette matricule est déja')</script>");
    }
  } 
  
   /**
     * Met à jour des infos d'un postier dans la base de données
     * param postier $obj l'objet "postier" à mettre à jour
     * return mixed le nombre de lignes affectées par la requête, ou un message d'erreur en cas d'échec
     */
  function updateP(postier $obj){
    $m=$obj->getMatricule();
     $c=$obj->getCin();
     $n=$obj->getNom();
     $p=$obj->getPrenom();
     $dn=$obj->getDate_naissance();
     $g=$obj->getGrade();
     $ad=$obj->getAdresse();
     $sa=$obj->getSalaire();
     $dd=$obj->getDate_debut();
     $d=$obj->getDirection();
    $sql="update postier set 
              cin='$c',
              nom='$n',
              prenom='$p',
              date_naissance='$dn',
              grade='$g',
              adresse='$ad',
              salaire=$sa,
              date_debut='$dd',
              direction='$d' where matricule =$m";
    try{
      $res=$this->cnx->exec($sql);
      return ($res);
    }catch (PDOException $e){
      $res="problème de mise à jour".$e->getMessage();
      return ($res);
    }
  }
}