<?php

class VueJeu
{
    public function afficherVue(Partie $partie)
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        <h1>Jeux de Solitaire</h1>
        <h3>Par Evann BACALA et Victor BOIX</h3>
        <a href="<?php echo 'Modele/deconnexion.php' ?>">Déconnexion</a>
        <br/>
        <table>
            <?php
            for ($x = 0; $x <= 6; $x++) {
                echo '<tr>';
                for ($y = 0; $y <= 6; $y++) {
                    if (is_int($partie->getVal($x, $y))) {
                        echo '<td width="50" height="50" bgcolor="black"></td>';
                    } elseif (is_null($partie->getVal($x, $y))) {
                        echo '<td>';
                        echo '<a href = "index.php?arrivee_x=' . $x . '&arrivee_y=' . $y . '" ><img src="img/white.jpeg" width="50" height="50" /></a >';
                        echo '</td>';
                    } else {
                        echo '<td > ';
                        echo '<a href = "index.php?depart_x=' . $x . '&depart_y=' . $y . '" ><img src = "img/cookie.jpeg" width = "50" height = "50" /></a > ';
                        echo '</td > ';
                    }
                }
                echo '</tr > ';
            }
            ?>
        </table>
        <br>
        <p>Cliquez sur le pion que vous voulez déplacer puis sur la case de destination</p>
        <br><br>
        <!--a tester car pas sur de ce que ca fait-->
        <a href="index.php?reinitPartie=1">Réinitialiser la partie</a>
        </body>
        </html>
        <?php
    }

}

?>
