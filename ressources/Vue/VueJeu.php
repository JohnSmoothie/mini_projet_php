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
        <a href="<?php echo 'Modele/ModeleDeconnexion.php' ?>">Déconnexion</a>
        <br/>
        <table>
            <?php
            for ($x = 0; $x <= 6; $x++) {
                echo '<tr>';
                for ($y = 0; $y <= 6; $y++) {
                    if ($partie->getPion($x, $y) == -1) {
                        echo '<td width="50" height="50" bgcolor="black"></td>';
                    } elseif ($partie->getPion($x, $y) == 0) {
                        echo '<td >';
                        echo '<form action="index.php" method="post">';
                        echo '<input type="hidden" name="arrivee_x" value="' . $x . '"/>';
                        echo '<input type="hidden" name="arrivee_y" value="' . $y . '"/>';
                        echo '<input type = "image" src = "img/white.jpeg" name = "ok" width = "50" height = "50" />';
                        echo '</form > ';
                        echo '</td > ';
                    } else {
                        echo '<td >';
                        echo '<form action="index.php" method="post">';
                        echo '<input type="hidden" name="depart_x" value="' . $x . '"/>';
                        echo '<input type="hidden" name="depart_y" value="' . $y . '"/>';
                        echo '<input type = "image" src = "img/cookie.jpeg" name = "ok" width = "50" height = "50" />';
                        echo '</form > ';
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
        <a href="<?php echo 'Modele/ModeleReinitialisation.php' ?>">Nouvelle partie</a>
        </body>
        </html>
        <?php
    }

}

?>
