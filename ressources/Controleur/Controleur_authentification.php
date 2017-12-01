<?php

  require_once PATH_VUE."/Vue_authentification.php";
  require_once PATH_MODELE.'/Modele_modele.php';

  class Controleur_authentification {

    private $vue_authentification;
    private $modele_authentification;

      function __construct() {
        $this->vue_authentification = new Vue_authentification();
      }

      function accueil() {
        $this->vue_authentification->afficherVue();
      }

      function verifieConnexion($pseudo, $password) {
        if($pseudo == 'test' && $password == 'test') {
          echo 'OK';
        }
        else {
          $this->vue_authentification->afficherVue();
        }
      }
  }
  ?>