<?php

  class MonException extends Exception {
    private $chaine;
      public function __construct($chaine) {
        $this->chaine=$chaine;
      }

      public function afficher() {
        return $this->chaine;
      }
    }

    class ConnexionException extends MonException {
    }

    class TableAccesException extends MonException {
    }

    class Modele {
      private $connexion;

      public function __construct() {
        try{
          $chaine="mysql:host=".HOST.";dbname=".BD;
          $this->connexion = new PDO($chaine,LOGIN,PASSWORD);
          $this->connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
          $exception=new ConnexionException("Problème de connexion à la base");
          throw $exception;
        }
      }

      public function deconnexion() {
        $this->connexion=null;
      }

      public function getPseudos(){
        try {
          $statement=$this->connexion->query("SELECT pseudo from joueur;");

          while($ligne=$statement->fetch()) {
            $result[]=$ligne['pseudo'];
          }
          return($result);
        }
        catch(PDOException $e) {
          throw new TableAccesException("Problème avec la table joueur");
        }
      }

      public function getPassword($pseudo){
        try {
          $statement=$this->connexion->query("SELECT motDePasse from joueur where pseudo = ?;");
          $statement->bindParam(1, $pseudo);

          $result=$statement->fetch(PDO::FETCH_ASSOC);

          if ($result['motDePasse']!=NUll) {
            return $result['motDePasse'];
          }
          else {
            return NULL;
           }
       }
       catch(PDOException $e) {
         $this->deconnexion();
         throw new TableAccesException("Problème avec la table joueur");
       }
      }

      public function exists($pseudo) {
        try {
	         $statement = $this->connexion->prepare("select pseudo from joueurs where pseudo=?;");
	         $statement->bindParam(1, $pseudo);
	         $statement->execute();
	         $result=$statement->fetch(PDO::FETCH_ASSOC);

	         if ($result['pseudo']!=NUll) {
             return true;
           }
	         else {
             return false;
	          }
        }
        catch(PDOException $e) {
          $this->deconnexion();
          throw new TableAccesException("Problème avec la table joueur");
        }
      }
 }

?>
