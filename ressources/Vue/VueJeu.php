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
                if ($partie->getPion($x, $y) == -1) {
                    echo '<td width="50" height="50" bgcolor="black"></td>';
                } elseif ($partie->getPion($x, $y) == 0) {
                    echo '<td>';
                    echo '<a href=';
                    $_SESSION['arrivee_x'] = $x;
                    $_SESSION['arrivee_y'] = $y;
                    echo 'index.php ><img src="img/white.jpeg" width="50" height="50"/></a>';
                    echo '</td > ';
                } else {
                    echo '<td > ';
                    echo '<form action="index.php" method="post">';
                    echo '<input type="hidden" name="depart_x" value/><input type="hidden" name="toto1" />
                    echo '<input type="image" src="img/cookie.jpeg" name="ok" width="50" height="50"/>';
                    echo '</form>';
                    /*echo '<a href=';
                    $_SESSION['depart_x'] = $x;
                    $_SESSION['depart_y'] = $y;
                    echo 'index.php ><img src="img/cookie.jpeg" width="50" height="50"/></a>';
                    */

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
        <?php
        echo '<a href=';
        $_SESSION['reinitialiser'] = 1;
        echo 'index.php >Réinitialiser la partie</a>';

        echo $_SESSION['depart_x'];
        echo $_SESSION['depart_y'];
        echo $_SESSION['arrivee_x'];
        echo $_SESSION['arrivee_y'];

        ?>
        </body>
        </html>
        <?php
    }

}

?>
