<?php

  require_once PATH_VUE."/Vue_authentification.php";
  require_once PATH_MODELE.'/Modele_modele.php';

  class Controleur_authentification {

    private $vue_authentification;
    private $modele;

      function __construct() {
        $this->vue_authentification = new Vue_authentification();
        $this->modele = new Modele();
      }

      function accueil() {
        $this->vue_authentification->afficherVue();
      }

      function verifieConnexion($pseudo, $password) {
        if($this->modele->exists($pseudo)) {
          echo 'OK';
        }
        else {
          $this->vue_authentification->afficherVue();
        }
      }
  }
  ?>
