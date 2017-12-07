<?php

require_once PATH_VUE . "/VueJeu.php";
require_once PATH_MODELE . '/ModelePartie.php';

class ControleurPartie
{
    private $vue_jeu;
    private $partie;

    public function __construct()
    {
        $this->vue_jeu = new VueJeu();
        $this->partie = new ModelePartie();
    }

    public function jeu()
    {
        $this->vue_jeu->afficherPage($this->partie);
    }
}

?>
