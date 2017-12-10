<?php

class Partie
{
    private $plateau;
    private $victoire;
    private $nbPion;

    public function __construct()
    {
        $this->plateau = array();
        $this->plateau[0] = array(-1, -1, 1, 1, 1, -1, -1);
        $this->plateau[1] = array(-1, -1, 1, 1, 1, -1, -1);
        $this->plateau[2] = array(1, 1, 1, 1, 1, 1, 1);
        $this->plateau[3] = array(1, 1, 1, 0, 1, 1, 1);
        $this->plateau[4] = array(1, 1, 1, 1, 1, 1, 1);
        $this->plateau[5] = array(-1, -1, 1, 1, 1, -1, -1);
        $this->plateau[6] = array(-1, -1, 1, 1, 1, -1, -1);
        $this->victoire = false;
        $this->nbPion = 32;
    }

    // Retourne la position du plateau aux coordonnées $x et $y
    public function getPion($x, $y)
    {
        return @$this->plateau[$x][$y];
    }

    // La position du plateau aux coordonnées $x et $y prend pour valeur $valeur
    public function setPion($x, $y, $valeur)
    {
        $this->plateau[$x][$y] = $valeur;
    }

    // Retourne le plateau
    public function getPlateau()
    {
        return $this->plateau;
    }

    // Retourne le nombre de pions
    public function getNbPion()
    {
        return $this->nbPion;
    }

    // Met à jour le nombre de pions
    public function setNbPion($nbPion)
    {
        $this->nbPion = $nbPion;
    }

    // Décremente le nombre de pions
    public function decrementerNbPion()
    {
        $this->nbPion--;
    }
}

?>
