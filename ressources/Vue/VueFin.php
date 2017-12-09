<?php

class VueFin
{
    public function afficherVue($fin)
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        <h1>Jeux de Solitaire</h1>
        <h3>Par Evann BACALA et Victor BOIX</h3>
        <br>
        <?php
          if($fin == -1) {
            echo "<h2>Vous avez Perdu</h2>";
          } else if($fin == 1) {
            echo "<h2>Vous avez Gagné</h2>";
          }
         ?>

         <!--Toux Doux : afficher les trois meilleurs joueurs avec leurs stat-->

         <br>
         <a href="index.php?reinitPartie=1">Nouvel partie</a>

        </body>
        </html>
        <?php
    }

}

?>
