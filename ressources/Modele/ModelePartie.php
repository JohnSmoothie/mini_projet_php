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

    public function getPion($x, $y)
    {
        return @$this->plateau[$x][$y];
    }

    public function setPion($x, $y, $valeur) {
        $this->plateau[$x][$y] = $valeur;
    }

    public function getPlateau() {
        return $this->plateau;
    }

    public function getNbPion()
    {
        return $this->nbPion;
    }

    public function setNbPion($nbPion)
    {
        $this->nbPion = $nbPion;
    }

    public function decrementerNbPion() {
        $this->nbPion--;
    }

/*
    public function caseJouable($x, $y)
    {
        return ($this->getValeur($x, $y) == 0);
    }

    public function pionPresent($x, $y) {
        return ($this->getValeur($x, $y) == 1);
    }

    public function mouvementValide($depart_x, $depart_y, $arrivee_x, $arrivee_y)
    {
        if (!$this->pionPresent($depart_x, $depart_y)) return false;
        if ($this->pionPresent($arrivee_x, $arrivee_y)) return false;
        if (!(($arrivee_x - $depart_x == 2 || $arrivee_x - $depart_x == -2) && $arrivee_y - $depart_y == 0) || (($arrivee_y - $depart_y == 2 || $arrivee_y - $depart_y == -2) && $arrivee_x - $depart_x == 0)) {
            if ($this->getValeur(($arrivee_x + $depart_x) / 2, ($arrivee_y + $depart_y) / 2) == 0) return false;
        }
        return true;
    }

    public function jouerCoup($depart_x, $depart_y, $arrivee_x, $arrivee_y)
    {
        if ($this->mouvementValide($depart_x, $depart_y, $arrivee_x, $arrivee_y)) {
            $this->plateau[$arrivee_x][$arrivee_y] = $this->plateau[$depart_x][$depart_y];
            $this->supprimerPion(($arrivee_x + $depart_x) / 2, ($arrivee_y + $depart_y) / 2);
            $this->supprimerPion($depart_x, $depart_y);
            return true;
        } else {
            return false;
        }
    }

    public function supprimerPion($x, $y)
    {
        $this->plateau[$x][$y] = 0;
        $this->nbPion--;
    }

    public function verifFin()
    { //retourne 0 si la partie n'est pas finie, -1 si elle est perdu, 1 si elle est gagnée
        if ($this->verifVictoire()) {
            return 1;
        } else if ($this->verifDefaite()) {
            return -1;
        } else {
            return 0;
        }
    }


    public function verifVictoire()
    {
        if ($this->nbPion == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function verifDefaite()
    {
        return false;

    }
*/
}

?>
