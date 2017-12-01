<?php

require_once PATH_MODELE.'/Partie.php';

  class Jeux {

    function afficherPage($plateau) {
      ?>

      <html>
        <head>
          <meta charset="utf-8" />
        </head>
        <body>
          <h1>Jeux de Solitaire</h1>
          <h3>Par Evann BACALA et Victor BOIX</h3>
          <br>
          <table border="1">
            <caption> Grille du Jeux</caption>

            <?php

              for($i = 0;$i<7; $i++) {
                echo "<tr>";
                for($j = 0;$j<7; $j++) {
                  echo "<td>";
                }
              }


            ?>

          </table>



            <form method="post" action="../index.php">
              <p>Quel Pion voulez vous déplacer ?</p><br>
              x :
              <input type="number" name="x1" min="0" max="6"/>
              y :
              <input type="text" name="y1"/><br /><br />
              <p>Où voulez vous déplacer votre pion : </p><br>
              x :
              <input type="text" name="x2"/>
              y :
              <input type="text" name="y2"/><br><br>
              <input type="submit" name="soumettre" value="envoyer"/>
          </form>
        </body>
      </html>

      <?php
    }

  }
  ?>
