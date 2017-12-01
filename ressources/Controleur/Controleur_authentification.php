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

          $toto = crypt('toto');
          $titi = crypt('titi');

          if (crypt($password, $toto) == $toto) {
              echo "Vous êtes identifié !";
          } else {
              echo "Mot de passe incorrect !";
          }
        }
        else {
          $this->vue_authentification->afficherVue();
        }
      }
  }
  ?>
