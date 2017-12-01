<?php
  class Jeux {

    function afficherPage() {
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

              <!--  <td><img src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fpolyjoule.org%2Fadministration%2Fressources%2Fdata%2FParticipants%2F1423167573.jpg&f=1" alt="blanc" height="50" width="50"></td>
                //<td><img src="https://images.duckduckgo.com/iu/?u=http%3A%2F%2Fpolyjoule.org%2Fadministration%2Fressources%2Fdata%2FParticipants%2F1423167573.jpg&f=1" alt="blanc" height="50" width="50"></td>
              -->

          </table>



            <form method="post" action="index.php">
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
