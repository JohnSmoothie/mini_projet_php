<?php

require_once PATH_MODELE . '/ModelePartie.php';

class VueJeu
{

    public function afficherPage(ModelePartie $partie)
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
        $partie->afficherPlateau();
        ?>

<?php /*
        <form method="post" action="../index.php">
            <p>Quel Pion voulez vous déplacer ?</p><br>
            x :
            <input type="number" name="x1" min="0" max="6"/>
            y :
            <input type="text" name="y1"/><br/><br/>
            <p>Où voulez vous déplacer votre pion : </p><br>
            x :
            <input type="text" name="x2"/>
            y :
            <input type="text" name="y2"/><br><br>
            <input type="submit" name="soumettre" value="envoyer"/>
        </form>
        <br/>
        <br/>
        <br/>
 */ ?>
        <a href="<?php session_abort(); ?>">Déconnexion</a>
        </body>
        </html>
        <?php
    }

}

?>
