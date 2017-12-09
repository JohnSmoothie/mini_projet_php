<?php

require_once PATH_VUE . "VueJeu.php";
require_once PATH_VUE . "VueErreurMouvement.php";
require_once PATH_VUE . "VueFin.php";
require_once PATH_MODELE . "ModelePartie.php";

class ControleurPartie
{
    private $vue_jeu;
    private $vue_mouvementInvalide;
    private $vue_fin;
    private $partie;

    public function __construct()
    {
        $this->vue_jeu = new VueJeu();
        $this->vue_mouvementInvalide = new VueMouvementInvalide();
        $this->vue_fin = new VueFin();
        $this->partie = new Partie();
    }

    public function afficherVueJeu()
    {
      if($_SESSION['nbClic'] == 2) {
        if(!$this->partie->jouerCoup($_SESSION['depart_x'], $_SESSION['depart_y'], $_SESSION['arrivee_x'], $_SESSION['arrivee_y'])) {
          $_SESSION['nbClic'] = 0;
          $this->vue_mouvementInvalide->afficherVue();
        } else {
          $_SESSION['nbClic'] = 0;
          $_SESSION['depart_x'] = null;
          $_SESSION['depart_y'] = null;
          $_SESSION['arrivee_x'] = null;
          $_SESSION['arrivee_y'] = null;
          if($this->partie->verifFin() == 1 || $this->partie->verifFin() == -1) {
            $this->vue_fin->afficherVue($this->partie->verifFin());
          }
        }
      }
      $this->vue_jeu->afficherVue($this->partie);
    }
}

?>
