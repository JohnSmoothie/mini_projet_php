<?php

class VueMouvementInvalide
{
    public function afficherVue()
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        Votre mouvement est invalide, veuillez réessayer !
        <br/>
        <a href="index.php">Revenir en arrière</a>
        </body>
        </html>


        <?php
    }
}

class VueSelectionBlancPremier
{
    public function afficherVue()
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        Vous ne pouvez pas selectionner une case blanche en premier !
        <br/>
        <a href="index.php">Revenir en arrière</a>
        </body>
        </html>


        <?php
    }
}

?>
