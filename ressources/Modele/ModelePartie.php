<?php

class ModelePartie
{
    private $plateau;
    private $victoire;

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
            return $res = false;
        }
    }

    public function caseVide($x, $y)
    {
        $res = false;
        if ($this->plateau[$x][$y] == 0) {
            return $res = true;
        }
    }

    public function afficherPlateau()
    {
        echo "<table>";
        for ($x = 6; $x >= 0; $x--) {
            echo "<tr>";
            for ($y = 6; $y >= 0; $y--) {
                if (caseJouable($x, $y)) {
                    if (caseVide($x, $y)) {
                        echo '<td style="background-color:white;" width = "50" height ="50"></td>';
                    } else {
                        echo '<td><img src="../img/cookie.jpeg" width = "50" height ="50"></td>';
                    }
                } else {
                    echo '<td style="background-color:black;" width = "50" height ="50"></td>';
                }
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}

?>
