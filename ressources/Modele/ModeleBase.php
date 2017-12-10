<?php

class MonException extends Exception
{
    private $chaine;

    public function __construct($chaine)
    {
        $this->chaine = $chaine;
    }

    public function afficher()
    {
        return $this->chaine;
    }
}

class ConnexionException extends MonException
{
}

class TableAccesException extends MonException
{
}

class ModeleBase
{
    private $connexion;

    public function __construct()
    {
        try {
            $chaine = "mysql:host=" . HOST . ";dbname=" . BD;
            $this->connexion = new PDO($chaine, LOGIN, PASSWORD);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $exception = new ConnexionException("Problème de connexion à la base");
            throw $exception;
        }
    }

    public function deconnexion()
    {
        $this->connexion = null;
    }

    //retourne tous les pseudos préents dans la table joueurs
    public function getPseudos()
    {
        try {
            $statement = $this->connexion->query("SELECT pseudo from joueurs;");

            while ($ligne = $statement->fetch()) {
                $result[] = $ligne['pseudo'];
            }
            return ($result);
        } catch (PDOException $e) {
            throw new TableAccesException("Problème avec la table joueurs");
        }
    }

    //retourne le mot de passe lié à un pseudo, si le pseudo n'existe pas il est renvoyé null
    public function getPassword($pseudo)
    {
        try {
            $statement = $this->connexion->prepare("SELECT motDePasse from joueurs where pseudo = ?");
            $statement->bindParam(1, $pseudo);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result['motDePasse'] != null) {
                return $result['motDePasse'];
            } else {
                return null;
            }
        } catch (PDOException $e) {
            $this->deconnexion();
            throw new TableAccesException("Problème avec la table joueurs");
        }
    }

    //vérifie qu'un pseudo existe renvoie true si il existe false sinon
    public function exists($pseudo)
    {
        try {
            $statement = $this->connexion->prepare("select pseudo from joueurs where pseudo=?;");
            $statement->bindParam(1, $pseudo);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);

            if ($result['pseudo'] != null) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $this->deconnexion();
            throw new TableAccesException("Problème avec la table joueur");
        }
    }

    //ajoute une partie dans la table parties où $pseudo est le pseudo du joueur et $fin le résultat de la partie (1 si gagné 0 si perdu)
    public function ajoutPartie($pseudo, $fin) {
        try {
            $statement = $this->connexion->prepare("insert into parties ('pseudo', 'partieGagnee') values (?, ?)");
            $statement->bindParam(1, $pseudo);
            $statement->bindParam(2, $fin);
            $statement->execute();

        } catch (PDOException $e) {
            $this->deconnexion();
            throw new TableAccesException("Problème avec la table partie");
        }
    }

    //revoie un tableau ordonné des joueurs avec leurs nombre de parties gagnées
    public function getMeilleursJoueur() {
      try {
        $statement = $this->connexion->query("select pseudo from partie ordered by select count(*) from (select pseudo=? from partie where partieGagnee=true);");
        while ($ligne = $statement->fetch()) {
            $result[] = $ligne['pseudo'];

        }
        //Toux DOUx : associer les stats à chaques joueurs
        return ($result);
      } catch (PDOException $e) {
          $this->deconnexion();
          throw new TableAccesException("Problème avec la table joueur");
      }
    }


}

?>
