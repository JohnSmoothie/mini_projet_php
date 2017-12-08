<?php

require_once PATH_VUE . "VueJeu.php";

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
        $this->vue_jeu->afficherVue($this->partie);
    }
}

?>
