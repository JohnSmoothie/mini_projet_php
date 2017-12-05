<?php

require_once 'ControleurAuthentification.php';
require_once 'ControleurPartie.php';

class Routeur
{
    private $controleur_authentification;
    private $controleur_partie;

    public function __construct()
    {
        $this->controleur_authentification = new ControleurAuthentification();
        $this->controleur_partie = new ControleurPartie();
    }

    public function routerRequete()
    {
        if (isset($_POST['login']) && isset($_POST['password'])) {
            if ($this->controleur_authentification->verifieConnexion($_POST['login'], $_POST['password'])) {
                $_SESSION['login'] = $_POST['login'];
                $_SESSION['password'] = $_POST['password'];
                $this->controleur_partie->jeu();
            } else {
                $this->controleur_authentification->afficherVueAuthentification();
            }
        } else {
            $this->controleur_authentification->afficherVueAuthentification();
        }
    }
}

?>
