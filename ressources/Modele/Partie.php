<?php
  class Partie {
    private $plateau;
    private $victoire;

    public function __construct() {
      $this->plateau = [
        0 => [ 0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
        1 => [ 0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
        2 => [ 0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1],
        3 => [ 0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1],
        4 => [ 0 => 1, 1 => 1, 2 => 1, 3 => 1, 4 => 1, 5 => 1, 6 => 1],
        5 => [ 0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
        6 => [ 0 => -1, 1 => -1, 2 => 1, 3 => 1, 4 => 1, 5 => -1, 6 => -1],
      ];
    }

    public function caseJouable($x, $y) {
      $res =  true;
      if($x == 0 || $x == 1 || $x == 5 || $x == 6) {
        if($y == 0 || $y == 1 || $y == 5 || $y == 6) {
          $res = false
        }
      }
      return $res;
    }

    public function caseVide($x, $y) {
      $res = false;
      if($plateau[$x][$y] == 0) {
        $res = true;
      }
    }

    public function afficherPlateau() {
      echo "<table>";
      for($x = 6; $x >=0; $x--) {
        echo "<tr>";
        for($y = 6; $y>=0; $y--) {
          if(caseJouable($x, $y)) {
            if(caseVide($x, $y)) {
              echo ''
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