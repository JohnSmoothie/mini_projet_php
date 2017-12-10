<?php

class VueAuthentification
{
    public function afficherVue()
    {
        ?>

        <html>
        <head>
            <meta charset="utf-8"/>
        </head>
        <body>
        <table>
            <form method="post" action="index.php">
                <tr>
                    <td>Login</td>
                    <td><input type="text" name="login" required="required"/></td>
                </tr>
                <tr>
                    <td>Mot de passe</td>
                    <td><input type="password" name="password" required="required"/></td>
                </tr>
                <tr>
                    <td><input type="submit" name="soumettre" value="envoyer"/></td>
                </tr>
            </form>
        </table>

        </body>
        </html>

        <?php
    }

}

?>
