<?php

class VueFin
{
    public function afficherVue($fin, $tableau)
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
        if ($fin == -1) {
            echo "<h2>Vous avez Perdu</h2>";
        } else if ($fin == 1) {
            echo "<h2>Vous avez Gagné</h2>";
        }
        ?>

        <br>
        <p>Les meilleurs joueurs : </p>
        <?php
        $cmp = 0;
          foreach ($tableau as $row) {
              $cmp++;
              if ($cmp <= 3) echo $cmp . ' - ' . $row->pseudo . ' a gagné ' . $row->nbVictoires;
          }
        ?>

        <br>
        <a href="<?php echo 'Modele/ModeleReinitialisation.php' ?>">Nouvelle partie</a>
        </body>
        </html>
        <?php
    }

}

?>
