<?php

  require_once 'Controleur_authentification.php';
  require_once 'Controleur_partie.php';

  class Routeur {

    private $Controleur_authentification;
    private $Controleur_partie;

    public function __construct() {
      $this->controleur_authentification = new Controleur_authentification();
      $this->controleur_partie = new Controleur_partie();
    }

    public function routerRequete() {
      if (isset($_COOKIE['login']) && isset($_COOKIE['password'])) {
        $this->controleur_authentification->verifieConnexion($_POST['login'], $_POST['password']);
      }
      else {
        $this->controleur_authentification->accueil();
      }
    }
  }
?>
