<?php

class VueFin
{
    //tab1 correspond au tableau des meilleurs joueurs
    public function afficherVue($fin, $tab1)
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
        <p>Les meilleurs joueurs</p>
        <?php
        $cmp = 0
          foreach ($tab1 as $row) {
            $cmp++;
            if($cmp<=3) {
              echo $cmp." - ".$row->pseudo." a gagné ".$row->//Toux DOUX." fois";
            }
          }
        ?>

        <br>
        <?php
        echo '<a href=';
        $_SESSION['reinitialiser'] = 1;
        echo 'index.php >Nouvelle Partie</a>';
        ?>
        </body>
        </html>
        <?php
    }

}

?>
