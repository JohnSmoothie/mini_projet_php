<?php

  require_once 'Controleur_authentification.php';

  class Routeur {

    private $controleur_authentification;

    public function __construct() {
      $this->controleur_authentification = new Controleur_authentification();
    }

    public function routerRequete() {
      if (isset($_POST['login']) && isset($_POST['password'])) {
        $this->controleur_authentification->verifieConnexion($_POST['login'], $_POST['password']);
      }
      else {
        $this->controleur_authentification->accueil();
      }
    }
  }
?>
