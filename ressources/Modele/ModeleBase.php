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


}

?>
