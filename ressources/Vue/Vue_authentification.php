<?php

class Vue_authentification
{

    public function afficherVue()
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        <form method="post" action="../ressources/index.php">
            Login
            <input type="text" name="login"/><br/><br/>
            Mot de passe
            <input type="password" name="password"/><br/><br/>
            <input type="submit" name="soumettre" value="envoyer"/>
        </form>
        </body>
        </html>

        <?php
    }

}

?>
