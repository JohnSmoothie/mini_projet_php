<?php

class Pion
{
    private $x;
    private $y;

    public function __construct($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function getX()
    {
        return $this->x;
    }

    public function setX($x)
    {
        $this->x = $x;
    }

    public function getY()
    {
        return $this->y;
    }

    public function setY($y)
    {
        $this->y = $y;
    }
}

class Partie
{
    private $plateau;
    private $victoire;

    public function __construct()
    {
        $this->plateau = array(
            0 => array(0 => -1, 1 => -1, 2 => new Pion(0, 2), 3 => new Pion(0, 3), 4 => new Pion(0, 5), 5 => -1, 6 => -1),
            1 => array(0 => -1, 1 => -1, 2 => new Pion(1, 2), 3 => new Pion(1, 3), 4 => new Pion(1, 5), 5 => -1, 6 => -1),
            2 => array(0 => new Pion(2, 0), 1 => new Pion(2, 1), 2 => new Pion(2, 2), 3 => new Pion(2, 3), 4 => new Pion(2, 4), 5 => new Pion(2, 5), 6 => new Pion(2, 6)),
            3 => array(0 => new Pion(3, 0), 1 => new Pion(3, 1), 2 => new Pion(3, 2), 3 => null, 4 => new Pion(3,4), 5 => new Pion(3, 5), 6 => new Pion(3, 6)),
            4 => array(0 => new Pion(4, 0), 1 => new Pion(4, 1), 2 => new Pion(4, 2), 3 => new Pion(4, 3), 4 => new Pion(4, 4), 5 => new Pion(4, 5), 6 => new Pion(4, 6)),
            5 => array(0 => -1, 1 => -1, 2 => new Pion(5, 2), 3 => new Pion(5, 3), 4 => new Pion(5, 5), 5 => -1, 6 => -1),
            6 => array(0 => -1, 1 => -1, 2 => new Pion(6, 2), 3 => new Pion(6, 3), 4 => new Pion(6, 5), 5 => -1, 6 => -1),
        );
        $this->victoire = false;
    }

    public function getVal($x, $y)
    {
        return $this->plateau[$x][$y];
    }

    public function caseJouable($x, $y)
    {
        return ($this->getVal($x, $y) != -1);
    }

    public function mouvementValide($depart_x, $depart_y, $arrivee_x, $arrivee_y)
    {
        if ($this->caseJouable($depart_x, $depart_y) == false) return false;
        if ($this->caseJouable($arrivee_x, $arrivee_y) == false) return false;
        if ($this->getVal($depart_x, $depart_y) == null) return false;
        if ($this->getVal($arrivee_x, $arrivee_y) != null) return false;
        return true;
    }

    public function jouerCoup($depart_x, $depart_y, $arrivee_x, $arrivee_y)
    {
        if ($this->mouvementValide($depart_x, $depart_y, $arrivee_x, $arrivee_y)) {
            $this->plateau[$arrivee_x][$arrivee_y] = $this->plateau[$depart_x][$depart_y];
            $this->plateau[$depart_x][$depart_y] = null;
        }
    }

    public function getPlateau() {
        return $this->plateau;
    }
}

/*
    public function __construct()
    {
        $this->plateau = [
            0 => [0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
            1 => [0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
            2 => [0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1],
            3 => [0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1],
            4 => [0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1],
            5 => [0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
            6 => [0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
        ];
        $_SESSION["plateau"] = $this->plateau;
    }


    public function caseJouable($x, $y)
    {
        $res = true;
        if ($this->plateau[$x][$y] == -1) {
            $res = false;
        }
        return $res;
    }

    public function caseVide($x, $y)
    {
        $res = false;
        if ($this->plateau[$x][$y] == 0) {
            $res = true;
        }
        return $res;
    }

    public function afficherPlateau()
    {
        echo "<table>";
        for ($x = 6; $x >= 0; $x--) {
            echo "<tr>";
            for ($y = 6; $y >= 0; $y--) {
                if ($this->caseJouable($x, $y)) {
                    if ($this->caseVide($x, $y)) {
                        echo '<td style="background-color:white;" width = "50" height ="50"></td>';
                    } else {
                        echo '<td><img src="../ressources/img/cookie.jpeg" width = "50" height ="50"></td>';
                    }
                } else {
                    echo '<td style="background-color:black;" width = "50" height ="50"></td>';
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function supprimerPion($x, $y) {
      $this->plateau[$x][$y] = O;
    }

    public function deplacementValide($xd, $yd, $xa, $yd) {
      $res = false;
      if((($xa-$xd == 2 || $xa-$xd == -2) && $ya-$yd == 0) || (($ya-$yd == 2 || $ya-$yd == -2) && $xa-$xd == 0)) {
        if($this->plateau[$xd][$yd] == 1 && $this->plateau[$xa][$ya] == 0) {
          //ajouter la condition qu'il y est un pion entre l'arrivé et le départ
        }
      }
    }

    public function deplacerPion($xd, $yd, $xa, $yd) {
      if(deplacementValide()) {
        supprimerPion($xd, $ya);
        
      }
    }
}
*/


?>
