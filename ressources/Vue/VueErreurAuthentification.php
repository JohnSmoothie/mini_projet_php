<?php

class VueErreurAuthentification
{
    public function __construct()
    {
        $this->afficherVue();
    }

    public function afficherVue()
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        Erreur d'authentification !
        <br/>
        <a href="index.php">Retour à l'accueil</a>
        </body>
        </html>


        <?php
    }
}

?>