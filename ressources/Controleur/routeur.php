<?php
require_once PATH_VUE . "VueErreurMouvement.php";

class Routeur
{
    private $controleur_authentification;
    private $controleur_partie;
    private $vueSelectionBlancPremier;

    public function __construct()
    {
        $this->controleur_authentification = new ControleurAuthentification();
        $this->controleur_partie = new ControleurPartie();
        $this->vue_SelectionBlancPremier = new VueSelectionBlancPremier();
    }

    public function routerRequete()
    {
        if (isset($_SESSION['login']) && isset($_SESSION['password'])) {
          if(isset($_GET['reinitPartie'])) {
            if($_GET['reinitPartie'] == 1) {
              $this->controleur_partie = new ControleurPartie();
            }
          }
          if(isset($_GET['depart_x']) && isset($_GET['depart_y'])) {
            $_SESSION['depart_x'] = $_GET['depart_x'];
            $_SESSION['depart_y'] = $_GET['depart_y'];
            $_SESSION['nbClic'] = 1;
          } else if(isset($_GET['arrivee_x']) && isset($_GET['arrivee_y'])) {
            $_SESSION['arrivee_x'] = $_GET['arrivee_x'];
            $_SESSION['arrivee_y'] = $_GET['arrivee_y'];
            if(  $_SESSION['nbClic'] = 1) {
              $_SESSION['nbClic'] = 2;
            } else {
              //on ne peu pas selectionner une case blanche en premier
              $this->vue_SelectionBlancPremier->afficherVue();
            }
          }
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
