<?php

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
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
            $this->controleur_partie->afficherVueJeu();
        } else {
            if (isset($_POST['login']) && isset($_POST['password'])) {
                if ($this->controleur_authentification->verifieConnexion($_POST['login'], $_POST['password'])) {
                    $_SESSION['login'] = $_POST['login'];
                    $_SESSION['password'] = $_POST['password'];
                    $this->controleur_partie->afficherVueJeu();
                } else {
                    require_once PATH_VUE . 'VueErreurAuthentification.php';
                    new VueErreurAuthentification();
                }
            } else {
                $this->controleur_authentification->afficherVueAuthentification();
            }
        }
    }
}

?>
