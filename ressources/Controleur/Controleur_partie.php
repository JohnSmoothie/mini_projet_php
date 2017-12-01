<?php

  require_once PATH_VUE."/Vue_jeu.php";
  require_once PATH_MODELE.'/Partie.php';

  class Controleur_partie {
    private $vue_jeu;
    private $partie;

    public function __construct() {
      $this->vue_jeu = new Jeux();
      $this->partie = new Partie();
    }

    public function jeu() {
      $vue_jeu->afficherPage($this->$partie);
    }
  }

?>
