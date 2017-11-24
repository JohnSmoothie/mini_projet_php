<<?php
  class Authentification {

    function afficherPage() {
      ?>

      <html>
        <head>
          <meta charset="utf-8" />
        </head>
        <body>
            <form method="post" action="index.php">
              Login
              <input type="text" name="login"/><br /><br />
              Mot de passe
              <input type="password" name="pwd"/><br /><br />
              <input type="submit" name="soumettre" value="envoyer"/>
          </form>
        </body>
      </html>

      <?php
    }

  }
  ?>
