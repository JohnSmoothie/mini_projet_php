<?php

require_once PATH_VUE . "VueJeu.php";
require_once PATH_MODELE . "ModelePartie.php";

class ControleurPartie
{
    private $vue_jeu;
    private $partie;

    public function __construct()
    {
        $this->vue_jeu = new VueJeu();
        $this->partie = new Partie();
    }

    public function afficherVueJeu()
    {
      if($_SESSION['nbClic'] == 2) {
        $this->partie->jouerCoup($_SESSION['depart_x'], $_SESSION['depart_y'], $_SESSION['arrivee_x'], $_SESSION['arrivee_y']);
      }
      $this->vue_jeu->afficherVue($this->partie);
    }
}

?>
