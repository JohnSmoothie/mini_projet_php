<?php

  require_once PATH_VUE."/Vue_authentification.php";
  require_once PATH_MODELE.'/Modele_modele.php';

  class Controleur_authentification {

    private $vue_authentification;
    private $modele;

      public function __construct() {
        $this->vue_authentification = new Vue_authentification();
        $this->modele = new Modele();
      }

      public function accueil() {
        $this->vue_authentification->afficherVue();
      }

      public function verifieConnexion($pseudo, $password) {
        if($this->modele->exists($pseudo)) {
          $input = $password;
          require_once PATH_MODELE . '/Modele_crypt.php';
        }
        else {
          $this->vue_authentification->afficherVue();
        }
      }
  }
  ?>
